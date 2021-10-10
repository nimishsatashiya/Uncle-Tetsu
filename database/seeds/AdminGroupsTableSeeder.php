<?php

use Illuminate\Database\Seeder;

class AdminGroupsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_groups')->delete();
        
        \DB::table('admin_groups')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'title' => 'Users',
                'order_index' => 0,
                'admin_group_titles_id' => 1,
                'module_class' => 'user',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'title' => 'Permissions',
                'order_index' => 1,
                'admin_group_titles_id' => 1,
                'module_class' => 'settings',
            ),
        ));
        
        
    }
}