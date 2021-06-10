<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->sentence($nbWords = 4, $variableNbWords = false),      // üks ainuke sõna -  'product_name' => $this->faker->sentence->word,
            'product_desc' => $this->faker->sentence($nbWords = 4, $variableNbWords = false),
            'product_price' => $this->faker->numberBetween(1,10),
            'factory_img' => 'https://picsum.photos/seed/'. $this->faker->uuid .'/500/400/',
            'product_brand' => $this->faker->company              
        ];
    }
}
