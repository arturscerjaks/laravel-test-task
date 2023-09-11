<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory(9)->create();
        Product::factory(100)->create()->each(function ($product) {
            Attribute::factory()->length()->for($product)->create();
            Attribute::factory()->width()->for($product)->create();
            Attribute::factory()->color()->for($product)->create();
            Attribute::factory()->weight()->for($product)->create();
        });
    }
}
