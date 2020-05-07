<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtifactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artifacts')->insert([
            [
                'title' => htmlentities("Greed's Embrace <br /> Golden Plate"),
                'description' => htmlentities("Some would question if the risk was worth it. <br /> The rest were already dead."),
                'attributes' => json_encode([
                    [
                        'name' => "Armour",
                        'value' => 670,
                    ],
                    [
                        'name' => "Movement Speed",
                        'value' => '-5%',
                    ],
                ]),
                "modifiers" => json_encode([
                    "-10% to Fire Resistance",
                    "+25% to Cold Resistance",
                    "-20% to Lightning Resistance"
                ]),
                'image' => 'armour.png',
                'price' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => htmlentities("Hello Kitty <br /> Backpack"),
                'description' => htmlentities("Mew."),
                'attributes' => json_encode([
                    [
                        'name' => "Armour",
                        'value' => 890,
                    ],
                    [
                        'name' => "Movement Speed",
                        'value' => '+5%',
                    ],
                ]),
                "modifiers" => json_encode([
                    "+25% to Fire Resistance",
                    "+25% to Cold Resistance",
                    "+25% to Lightning Resistance"
                ]),
                'image' => 'kitty.png',
                'price' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => htmlentities("Little Prince's <br /> Rose"),
                'description' => htmlentities("It is the time you have wasted for your rose that makes your rose so important."),
                'attributes' => json_encode([
                    [
                        'name' => "Amour",
                        'value' => 50,
                    ],
                ]),
                "modifiers" => json_encode([
                    "-10% to Cold Resistance",
                    "-5% to Happiness"
                ]),
                'image' => 'rose.png',
                'price' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => htmlentities("The <br /> Ring"),
                'description' => htmlentities("One to rule them all."),
                'attributes' => json_encode([
                    [
                        'name' => "Armour",
                        'value' => 1,
                    ],
                    [
                        'name' => "Movement Speed",
                        'value' => "+5%",
                    ],
                ]),
                "modifiers" => json_encode([
                    "-100% to Visibility",
                    "-75% to Sanity"
                ]),
                'image' => 'ring.png',
                'price' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
