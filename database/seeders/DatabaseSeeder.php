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
<<<<<<< HEAD
        $this->call([UsersTableSeeder::class]);
=======
        // moved that user creation to this file
        // $this->call([UsersTableSeeder::class]);
>>>>>>> 578509e5437d5dd2a4c7a68cce580c09d0e3202b

        // if($this->) {
        // RoleFactory::new()->count(8)->create();
        // }

        Role::create(['rolename' => 'MEMBER']);
        Role::create(['rolename' => 'ADMIN']);
        Role::create(['rolename' => 'TRESURER']);
        Role::create(['rolename' => 'USHER']);
        Role::create(['rolename' => 'GROUP LEADER']);

        Genders::create(['gender' => 'MALE']);
        Genders::create(['gender' => 'FEMALE']);

        User::create([
            'fname' => 'ADMIN',
            'lname' => 'ADMIN', 
            'age' => '2000-01-01',
             'gender_id' => 1,
              'phone' => '0700000000',
<<<<<<< HEAD
               'email' => 'admin"account.com', 
=======
               'email' => 'admin@account.com', 
>>>>>>> 578509e5437d5dd2a4c7a68cce580c09d0e3202b
               'password' => bcrypt('Admin123.')
        ]);
        User::create([
            'fname' => 'Lavvy',
            'lname' => 'Wangeci',
            'age' => '2000-01-01',
            'phone' => '0758593172',
            'gender_id' => 2,
            'roles' => '1 2',
            'email' => 'wangeci@black.com',
<<<<<<< HEAD
            'password' => bcrypt('Lavvy123.'),
=======
            'password' => bcrypt('secret'),
>>>>>>> 578509e5437d5dd2a4c7a68cce580c09d0e3202b
        ]);
    }
}
