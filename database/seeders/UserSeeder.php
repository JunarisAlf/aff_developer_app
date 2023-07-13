<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        User::create([
            'email'         => 'admin@gmail.com',
            'wa_number'     => '6282284393018',
            'full_name'     => 'Akun Admin',
            'password'      => '123123',
            'role'          => 'admin',
            'profile_image' => 'default_profile_img.png'

        ]);
        User::create([
            'email'         => 'marketing@gmail.com',
            'wa_number'     => '6282284393019',
            'full_name'     => 'Akun Marketing',
            'password'      => '123123',
            'role'          => 'marketing',
            'confirmed'     => true,
            'profile_image' => 'default_profile_img.png'
        ]);
        User::create([
            'email'         => 'marketing2@gmail.com',
            'wa_number'     => '6282284393020',
            'full_name'     => 'Akun Marketing 2',
            'password'      => '123123',
            'role'          => 'marketing',
            'confirmed'     => false,
            'profile_image' => 'default_profile_img.png'
        ]);

        User::factory()->count(100)->create();
    }
}
