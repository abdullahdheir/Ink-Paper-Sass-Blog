<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=> "Abdullah Dheir",
            'email'=> 'info@abdullahdheir.dev',
            'password' => Hash::make('Abdalla100@@'),
        ]);

        User::factory(10)->create();

        Article::factory(20)->create();
    }
}
