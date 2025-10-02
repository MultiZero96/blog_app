<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function ($user) {
            Post::factory()->count(5)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}