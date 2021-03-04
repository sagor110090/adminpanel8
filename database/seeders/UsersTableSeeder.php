<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Mehedi Hasan Sagor',
                'email' => 'developer@sagor.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zk6.13vjzD8o2tEWrP0RVePwcZnZZ91tRhhO2nEL6jBIA4EONMj6.',
                'remember_token' => NULL,
                'created_at' => '2021-03-04 19:13:08',
                'updated_at' => '2021-03-04 19:13:08',
            ),
        ));
        
        
    }
}