<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::create([
            'name' => 'T-Shirt',
            'slug' => 't-shirt',
            'category_id' => 1,
            'price' => 500.00,
            'description' => 'A comfortable cotton T-Shirt.',
        ]);

        // Create Attributes
        $size = Attribute::create([
            'name' => 'Size',
            'slug' => 'size',
        ]);
        $color = Attribute::create([
            'name' => 'Color',
            'slug' => 'color',
        ]);

        // Create Attribute Values
        $sizeS = AttributeValue::create(['attribute_id' => $size->id, 'value' => 'S']);
        $sizeM = AttributeValue::create(['attribute_id' => $size->id, 'value' => 'M']);
        $sizeL = AttributeValue::create(['attribute_id' => $size->id, 'value' => 'L']);
        $colorRed = AttributeValue::create(['attribute_id' => $color->id, 'value' => 'Red']);
        $colorBlue = AttributeValue::create(['attribute_id' => $color->id, 'value' => 'Blue']);

        // Create Variants
        $variant1 = Variant::create(['product_id' => $product->id, 'sku' => 'TSHIRT-S-RED', 'price' => 500.00, 'quantity' => 10]);
        $variant1->attributeValues()->attach([$sizeS->id, $colorRed->id]);

        $variant2 = Variant::create(['product_id' => $product->id, 'sku' => 'TSHIRT-M-BLUE', 'price' => 500.00, 'quantity' => 15]);
        $variant2->attributeValues()->attach([$sizeM->id, $colorBlue->id]);
    }
}
