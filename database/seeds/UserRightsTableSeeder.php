<?php

use Illuminate\Database\Seeder;

class UserRightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admin_user_rights')->delete();
        
        \DB::table('admin_user_rights')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_type_id' => 1,
                'page_id' => 9,
                'created_at'=>NULL,
                'updated_at'=>NULL,
            ),
        ));
    }
}
