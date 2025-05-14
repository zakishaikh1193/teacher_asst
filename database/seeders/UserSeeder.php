<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            // [
            //     'name' => 'super admin',
            //     'email' => 'info@bylinelearning.com',
            //     'password' => Hash::make('admin@Byline25'),
            // ],  
            [
                'name' => 'admin',
                'email' => 'adarsh.byline@gmail.com',
                'password' => Hash::make('admin'),
            ],
        );
    }
}
