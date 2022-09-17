<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Utils\StringUtils;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence();
        $slug = StringUtils::slugify($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->realText(),
            'user_id' => User::factory(),
            // laravel knows to fetch id, so above is the same as
            // 'user_id' => User::factory()->create()->id,
        ];
    }
}
