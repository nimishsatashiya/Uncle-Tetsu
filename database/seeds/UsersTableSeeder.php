<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
                'user_type_id' => 1,
                'name' => 'Admin User',
                'firstname' => 'Admin',
                'lastname' => 'User',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$AV0wvAVJqVWogTFYUaXXq.4BwxivV2wyggTU21ctkj/U4BwaIBGQu',
                'address' => 'Address-1',
                'phone' => '1234567890',
                'image' => NULL,
                'status' => 1,
                'slug' => 'admin',
                'last_login_at' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_type_id' => 2,
                'name' => 'Agent Boss',
                'firstname' => 'Agent',
                'lastname' => 'Boss',
                'email' => 'agent.boss@gmail.com',
                'password' => '$2y$10$AV0wvAVJqVWogTFYUaXXq.4BwxivV2wyggTU21ctkj/U4BwaIBGQu',
                'address' => 'Address-1',
                'phone' => '1234567890',
                'image' => NULL,
                'status' => 1,
                'slug' => 'agent-boss',
                'last_login_at' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_type_id' => 3,
                'name' => 'Agent User',
                'firstname' => 'Agent',
                'lastname' => 'User',
                'email' => 'agent@gmail.com',
                'password' => '$2y$10$AV0wvAVJqVWogTFYUaXXq.4BwxivV2wyggTU21ctkj/U4BwaIBGQu',
                'address' => 'Address-1',
                'phone' => '1234567890',
                'image' => NULL,
                'status' => 1,
                'slug' => 'agent',
                'last_login_at' => NULL,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
