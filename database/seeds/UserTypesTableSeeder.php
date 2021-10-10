<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_types')->delete();
        
        \DB::table('user_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Super Admin',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Agent Boss',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Agent',
            ),
        ));
    }
}
