<?php

use Illuminate\Database\Seeder;

class AdminGroupTitlesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_group_titles')->delete();
        
        \DB::table('admin_group_titles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group_title' => 'TOOLS',
                'order_index' => 0,
            ),
            
        ));
        
        
    }
}