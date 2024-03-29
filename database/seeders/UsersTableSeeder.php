<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'id' => 1,
            'fname' => 'Test',
            'lname' => 'testing',
            'roles' => 'admin',
            'DOB' => '2000-02-17',
            'gender' => 'male',
            'phone' => '0700000000',
            'email' => 'test@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Password@123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
