<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->isbn13(),
            'image_url' => $this->faker->randomElement(['nophoto.jpg']),
            'name' => $this->faker->numerify('Product-####'),
            'category' => $this->faker->randomElement(['food', 'beverage', 'household', 'healthcare', 'personalcare']),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2),
            'stock' => $this->faker->randomNumber(3, true),
            'stock_alert_at' => $this->faker->randomNumber(2, true)
        ];
    }
}
