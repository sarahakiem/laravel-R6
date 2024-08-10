<?php

namespace Database\Factories;

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
    private function generateRandomImage($path){
        $files = scandir($path);
        $files = array_diff($files, array('.', '..'));

        return fake()->randomElement($files);
    }
    public function definition(): array
    {
        return [
        'image'=>$this->generateRandomImage(public_path('assets/images/product')),
        'title'=>fake()->sentence(2),
        'price'=>fake()->randomFloat(2,10,1000),
        'short_description'=>fake()->text(100),
        'published'=>fake()->numberBetween(0, 1)
        ];
    }
}
