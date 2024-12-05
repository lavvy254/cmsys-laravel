<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Genders;
use App\Models\Role;
use App\Models\User;
use Database\Factories\RoleFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const SEED_DATA = true;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        // moved that user creation to this file
        // $this->call([UsersTableSeeder::class]);

        // if($this->) {
        // RoleFactory::new()->count(8)->create();
        // }

        User::create([
            'fname' => 'ADMIN',
            'lname' => 'ADMIN',
            'age' => '2000-01-01',
            'gender' => 'Male',
            'phone' => '0700000000',
            'email' => 'admin"account.com',
            'password' => bcrypt('Admin123.')
        ]);
        User::create([
            'fname' => 'harmony',
            'lname' => 'lumumba',
            'dob' => '2000-01-01',
            'phone' => '0702486902',
            'gender' => 'male',
            'roles' => 'admin',
            'email' => 'lumumbaharmony@gmail.com',
            'password' => bcrypt('secret'),

        ]);
    }
}
