<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['category_id' => 1, 'item_code' => 'HAM101', 'item_name' => 'Ham Runner Pro', 'item_buy_price' => 320000, 'item_sell_price' => 510000],
            ['category_id' => 1, 'item_code' => 'HAM102', 'item_name' => 'HemTrack Zoom', 'item_buy_price' => 410000, 'item_sell_price' => 630000],
            ['category_id' => 2, 'item_code' => 'HEM201', 'item_name' => 'Hemo Glide Max', 'item_buy_price' => 290000, 'item_sell_price' => 470000],
            ['category_id' => 2, 'item_code' => 'HEM202', 'item_name' => 'Hamam Storm Fly', 'item_buy_price' => 450000, 'item_sell_price' => 720000],
            ['category_id' => 3, 'item_code' => 'HAMO301', 'item_name' => 'H-Walk Reactor', 'item_buy_price' => 380000, 'item_sell_price' => 600000],
            ['category_id' => 3, 'item_code' => 'HAMO302', 'item_name' => 'HemoFlex Trail', 'item_buy_price' => 520000, 'item_sell_price' => 810000],
            ['category_id' => 4, 'item_code' => 'HAMAM401', 'item_name' => 'Hamam Street Vibe', 'item_buy_price' => 310000, 'item_sell_price' => 490000],
            ['category_id' => 4, 'item_code' => 'HAMAM402', 'item_name' => 'Hemo Casual Dash', 'item_buy_price' => 360000, 'item_sell_price' => 580000],
            ['category_id' => 5, 'item_code' => 'H501', 'item_name' => 'HamLite Sandal X', 'item_buy_price' => 200000, 'item_sell_price' => 330000],
            ['category_id' => 5, 'item_code' => 'H502', 'item_name' => 'Hem Glide Flip', 'item_buy_price' => 220000, 'item_sell_price' => 360000],
        ];
        

        foreach ($data as $value) {
            Item::create($value);
        }
    }
}
