<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;
class ProductCommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'userId' => User::all()->random()->id,
            'productId' => Product::all()->random()->id,
            'comment' => $this->faker->text,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,

        ];
    }
}
