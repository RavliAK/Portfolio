<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,5)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'price' =>mt_rand(20000,500000),
            'year' =>mt_rand(1989,2023),
            // 'body'=>'<p>' . implode('<p><p>',$this->faker->paragraphs(mt_rand(5,10))),'</p>',
            'body'=>collect($this->faker->paragraphs(mt_rand(5,10)))
            ->map(fn($p)=>"<p>$p</p>")
            ->implode(''),
            'user_id'=>1,
            'author_id'=>mt_rand(1,2),
            'category_id'=>mt_rand(1,3)
        ];
    }
}
