<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Moustapha Sissokho',
            'username' => 'sisko',
            'email' => 'siskomouhamed@gmail.com',
            'password' => 'password'
        ]);

        Category::factory()
            ->count(5)
            ->has(
                Post::factory()
                    ->count(5)
                    ->state(function () use ($user) {
                        return ['user_id' => $user->id];
                    })
                    ->has(
                        Comment::factory()
                            ->count(3)
                            ->state(function (array $attributes, Post $post) use ($user) {
                                return [
                                    'user_id' => $user->id,
                                    'post_id' => $post->id
                                ];
                            })
                    )
            )
            ->create();
    }
}
