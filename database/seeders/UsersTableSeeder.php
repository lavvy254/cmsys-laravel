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
<<<<<<< HEAD
=======
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
>>>>>>> 578509e5437d5dd2a4c7a68cce580c09d0e3202b
    }
}
