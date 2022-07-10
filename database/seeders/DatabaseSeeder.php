<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Admin::factory()->create([
            'name' => 'Ngài Lộc',
            'email' => 'admin@gmail.com',
            'password' => '1234'
        ]);
    }
}
