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
            // 'id' => 1,
            'fname' => 'Lavvy',
            'lname' => 'Wangeci',
            'roles' => '1 2 3',
            'age' => '2000-02-17',
            'gender_id' => 2,
            'phone' => '0758593172',
            'email' => 'admin@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            // 'created_at' => now(),
            // 'updated_at' => now()
        ]);
    }
}
