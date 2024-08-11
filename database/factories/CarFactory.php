<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
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
        'carTable'=>fake()->randomElement(['BMW','MERCIDES'.'RENO','TOYOTA']),
        'description'=>fake()->text(),
        'price'=>fake()->randomFloat(2),
        'published'=>fake()->numberBetween(0,1),
        //'image'=>basename(fake()->image(public_path('assets/images/cars'))),
        'image' => $this->generateRandomImage(public_path('assets/images/cars')),
        'cat_id'=>fake()->numberBetween(1,2),
        ];
    }
}
