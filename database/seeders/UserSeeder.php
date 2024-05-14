<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => "Nguyenxuantai",
        //     'email' => "admin@admin.com",
        //     'password' => Hash::make('22122002'),
        // ]);
       $user = User::create([
            'name' => "Nguyenxuantai",
            'email' => "admin@mail.com",
            'password' => Hash::make('22122002'),
        ]);
        $user->assignRole('super-admin');
    }
}