<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Merchant',
            'email' => 'merchant@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'Merchant'
        ]);

        User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('12345678'),
            'level' => 'customer'
        ]);
    }
}
