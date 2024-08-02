<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CategorySeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Chimwemwe Luwanda',
            'username' => 'admin',
            'phone_number' => '0991057321',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

       $this->call([
          RoleSeeder::class ,
          CategorySeeder::class,
       ]);
    }
}
