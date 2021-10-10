<?php

use Illuminate\Database\Seeder;

class AdminActionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_actions')->delete();
        
        \DB::table('admin_actions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => 'Login',
                'remark' => 'Logged In User',
            ),
            1 => 
            array (
                'id' => 2,
                'description' => 'Logout',
                'remark' => 'Logged Out User',
            ),
            2 => 
            array (
                'id' => 3,
                'description' => 'Add Admin Modules',
                'remark' => '',
            ),
            3 => 
            array (
                'id' => 4,
                'description' => 'Edit Admin Modules',
                'remark' => '',
            ),
            4 => 
            array (
                'id' => 5,
                'description' => 'Delete Admin Modules',
                'remark' => '',
            ),
            5 => 
            array (
                'id' => 6,
                'description' => 'Add Admin Module Page',
                'remark' => 'Add Module Page',
            ),
            6 => 
            array (
                'id' => 7,
                'description' => 'Edit Admin Module Page',
                'remark' => 'Edit Module Page',
            ),
            7 => 
            array (
                'id' => 8,
                'description' => 'Delete Admin Module Page',
                'remark' => 'Delete Module Page',
            ),
            8 => 
            array (
                'id' => 9,
                'description' => 'Add Admin Action',
                'remark' => 'Add Admin Module',
            ),
            9 => 
            array (
                'id' => 10,
                'description' => 'Edit Admin Action',
                'remark' => 'Edit Admin Module',
            ),
            10 => 
            array (
                'id' => 11,
                'description' => 'Delete Admin Action',
                'remark' => 'Delete Admin Module',
            ),
            11 => 
            array (
                'id' => 12,
                'description' => 'Update Rights',
                'remark' => '',
            ),
            12 => 
            array (
                'id' => 13,
                'description' => 'Add User Type',
                'remark' => '',
            ),
            13 => 
            array (
                'id' => 14,
                'description' => 'Edit User Type',
                'remark' => '',
            ),
            14 => 
            array (
                'id' => 15,
                'description' => 'Delete User Type',
                'remark' => '',
            ),
            15 => 
            array (
                'id' => 16,
                'description' => 'Add Users',
                'remark' => 'Add Admin Users',
            ),
            16 => 
            array (
                'id' => 17,
                'description' => 'Edit Users',
                'remark' => 'Edit Admin Users',
            ),
            17 => 
            array (
                'id' => 18,
                'description' => 'Delete User',
                'remark' => 'Delete Admin Users',
            ),
        ));
        
        
    }
}