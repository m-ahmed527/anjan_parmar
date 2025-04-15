<?php

namespace App\Services\CartService;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Support\Facades\Session;

class Cart
{

    // public function addToCart($product_id, $variant_id, $quantity)
    // {
    //     // Pehle se stored cart le lo
    //     $cart = session()->get('cart', []);
    //     if (!isset($cart['items'])) {
    //         $cart['items'] = [];
    //     }
    //     // dd($cart);
    //     $variant = Variant::find($variant_id);
    //     $variantAttributeIds = $variant->attributeValues->pluck('id')->toArray();
    //     $attributeValueIds = request()->attribute_values;
    //     // dd(count($attributeValueIds), count($variantAttributeIds));
    //     if (count($variantAttributeIds) != count($attributeValueIds)) {
    //         return ['success' => false, 'message' => 'Please Select Combination.'];
    //     }
    //     if (!$variant) {
    //         return ['success' => false, 'message' => 'Invalid variant selected'];
    //     }

    //     if ($variant->quantity < $quantity) {
    //         return ['success' => false, 'message' => 'Selected quantity is not available'];
    //     }

    //     $cartKey = $product_id . '-' . $variant_id;
    //     $sub_total = (floatval($variant->price) + floatval($variant->product->price)) * $quantity;
    //     if (array_key_exists($cartKey,  $cart['items'])) {
    //         // Agar item pehle se cart me hai, to quantity update karo
    //         // $cart['items'][$cartKey]['item_quantity'] += $quantity;
    //         $cart['items'][$cartKey]['item_quantity'] = $quantity;
    //         $cart['items'][$cartKey]['item_sub_total'] = $sub_total;
    //         $cart['items'][$cartKey]['item_total'] = $sub_total;
    //     } else {
    //         //Naya item cart me add karo bina purane items remove kiye
    //         $cart['items'][$cartKey] = [
    //             'image' => $variant->product->getFirstMediaUrl('featured_image'),
    //             'product_id' => $product_id,
    //             'variant_id' => $variant_id,
    //             'name' => $variant->product->name,
    //             'variant_name' => $variant->attributeValues->pluck('value')->join(', '),
    //             'variant_price' => $variant->price,
    //             'product_price' => floatval($variant->product->price),
    //             'price' => (floatval($variant->price) + floatval($variant->product->price)),
    //             'item_quantity' => $quantity,
    //             'item_sub_total' => $sub_total,
    //             'item_total' => $sub_total,
    //         ];
    //     }
    //     $this->recalculateCartConditions($cart);
    //     return ['success' => true, 'message' => 'Item added to cart!', 'cart' => session()->get('cart')];
    // }

    public function addToCart($product_id, $variant_id = null, $quantity = 1, $attributeValueIds = [])
    {
        $cart = session()->get('cart', []);
        $cart['items'] = $cart['items'] ?? [];

        $product = $this->getProduct($product_id);
        if (!$product) return $this->fail('Invalid product selected');

        $variantData = $this->getValidatedVariant($variant_id, $attributeValueIds, $quantity);
        if (!$variantData['success']) return $variantData;

        $cartKey = $this->generateCartKey($product_id, $variant_id);
        $cart['items'][$cartKey] = $this->buildCartItem($product, $variantData['variant'], $quantity);

        $this->recalculateCartConditions($cart);

        return [
            'success' => true,
            'message' => 'Item added to cart!',
            'cart' => session()->get('cart')
        ];
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
        if ($cart['total_items'] == 0) {
            session()->forget('cart');
        }
        return ['success' => true, 'message' => 'Item removed from cart!', 'cart' => session()->get('cart')];
    }

    public function updateCart($cartKey, $quantity)
    {
        $cart = Session::get('cart', []);
        if (array_key_exists($cartKey,  $cart['items'])) {
            $cart['items'][$cartKey]['item_quantity'] = $quantity;
            $sub_total = $cart['items'][$cartKey]['price'] * $quantity;
            $cart['items'][$cartKey]['item_sub_total'] = $sub_total;
            $cart['items'][$cartKey]['item_total'] = $sub_total;
            $this->recalculateCartConditions($cart);
        }

        return ['success' => true, 'message' => 'Cart updated!', 'cart' => session()->get('cart'), 'item' => session()->get('cart')['items'][$cartKey]];
    }

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





    protected function getProduct($product_id)
    {
        return Product::find($product_id);
    }

    protected function getValidatedVariant($variant_id, $attributeValueIds, $quantity)
    {
        if (!$variant_id) {
            return ['success' => true, 'variant' => null]; // No variant required
        }

        $variant = Variant::find($variant_id);
        if (!$variant) {
            return $this->fail('Invalid variant selected');
        }

        $variantAttributeIds = $variant->attributeValues->pluck('id')->toArray();

        if (count($variantAttributeIds) !== count($attributeValueIds)) {
            return $this->fail('Please select a complete combination');
        }

        if ($variant->quantity < $quantity) {
            return $this->fail('Selected quantity is not available');
        }

        return ['success' => true, 'variant' => $variant];
    }

    protected function generateCartKey($product_id, $variant_id = null)
    {
        return $variant_id ? "{$product_id}-{$variant_id}" : (string) $product_id;
    }

    protected function buildCartItem($product, $variant = null, $quantity = 1)
    {
        $product_price = floatval($product->price);
        $variant_price = $variant ? floatval($variant->price) : 0;
        $total_price = $product_price + $variant_price;
        $sub_total = $total_price * $quantity;

        return [
            'image' => $product->getFirstMediaUrl('featured_image'),
            'product_id' => $product->id,
            'variant_id' => $variant ? $variant->id : null,
            'name' => $product->name,
            'variant_name' => $variant ? $variant->attributeValues->pluck('value')->join(', ') : null,
            'variant_price' => $variant_price,
            'product_price' => $product_price,
            'price' => $total_price,
            'item_quantity' => $quantity,
            'item_sub_total' => $sub_total,
            'item_total' => $sub_total,
        ];
    }

    protected function fail($message)
    {
        return ['success' => false, 'message' => $message];
    }
}
