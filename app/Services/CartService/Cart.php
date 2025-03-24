<?php

namespace App\Services\CartService;

use App\Models\Variant;
use Illuminate\Support\Facades\Session;

class Cart
{
    public function addToCart($product_id, $variant_id, $quantity)
    {
        // Pehle se stored cart le lo
        $cart = session()->get('cart', []);
        if (!isset($cart['items'])) {
            $cart['items'] = [];
        }
        // dd($cart);
        $variant = Variant::find($variant_id);
        $variantAttributeIds = $variant->attributeValues->pluck('id')->toArray();
        $attributeValueIds = request()->attribute_values;
        // dd(count($attributeValueIds), count($variantAttributeIds));
        if (count($variantAttributeIds) != count($attributeValueIds)) {
            return ['success' => false, 'message' => 'Please Select Combination.'];
        }
        if (!$variant) {
            return ['success' => false, 'message' => 'Invalid variant selected'];
        }

        if ($variant->quantity < $quantity) {
            return ['success' => false, 'message' => 'Selected quantity is not available'];
        }

        $cartKey = $product_id . '-' . $variant_id;
        $sub_total = (floatval($variant->price) + floatval($variant->product->price)) * $quantity;
        if (array_key_exists($cartKey,  $cart['items'])) {
            // Agar item pehle se cart me hai, to quantity update karo
            $cart['items'][$cartKey]['item_quantity'] += $quantity;
            $cart['items'][$cartKey]['item_quantity'] = $quantity;
            $cart['items'][$cartKey]['item_sub_total'] = $sub_total;
            $cart['items'][$cartKey]['item_total'] = $sub_total;
        } else {
            //Naya item cart me add karo bina purane items remove kiye
            $cart['items'][$cartKey] = [
                'image' => $variant->product->getFirstMediaUrl('featured_image'),
                'product_id' => $product_id,
                'variant_id' => $variant_id,
                'name' => $variant->product->name,
                'variant_name' => $variant->attributeValues->pluck('value')->join(', '),
                'variant_price' => $variant->price,
                'product_price' => floatval($variant->product->price),
                'price' => (floatval($variant->price) + floatval($variant->product->price)),
                'item_quantity' => $quantity,
                'item_sub_total' => $sub_total,
                'item_total' => $sub_total,
            ];
        }
        $this->recalculateCartConditions($cart);
        return ['success' => true, 'message' => 'Item added to cart!', 'cart' => session()->get('cart')];
    }



    public function getCart()
    {
        return session()->get('cart');
    }

    public function removeFromCart($cartKey)
    {
        $cart = Session::get('cart', []);
        if (isset($cart['items'][$cartKey])) {
            unset($cart['items'][$cartKey]);
            $this->recalculateCartConditions($cart);
        }

        return ['success' => true, 'message' => 'Item removed from cart!', 'cart' => $cart];
    }

    // public function updateCart($product_id, $variant_id, $quantity)
    // {
    //     $cart = Session::get('cart', []);
    //     $cartKey = $product_id . '-' . $variant_id;

    //     if (isset($cart[$cartKey])) {
    //         $cart[$cartKey]['quantity'] = $quantity;
    //         Session::put('cart', $cart);
    //     }

    //     return ['success' => true, 'message' => 'Cart updated!', 'cart' => $cart];
    // }

    private function recalculateCartConditions($cart)
    {
        // dd($cart);
        $sub_total = array_sum(array_column($cart['items'], 'item_total'));
        $cart['total_items'] = count($cart['items']);
        $cart['sub_total'] = $sub_total;
        // $cart['tax'] = $sub_total * $taxRate;
        // $cart['total'] = $sub_total + $cart['tax'];
        $cart['total'] = $sub_total;
        session()->put('cart', $cart);
    }
}
