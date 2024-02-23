<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'name' => "tayssir",
                'tel'=> "26668176",
                'city'=> "Tunis",
                'state'=> "Nabeul",
                'street'=> "Bhira",
                'zip_code'=> "8080",
                'photo' => "../dashasset/plugins/images/users/tayssir.png",
                'email' => "sahlitayssir34@gmail.com",
                'role' => "admin",
                'password' => Hash::make('12345tayssir')
            ]
            );
    }
}
