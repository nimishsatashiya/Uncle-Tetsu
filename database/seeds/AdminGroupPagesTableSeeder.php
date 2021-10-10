<?php

use Illuminate\Database\Seeder;

class AdminGroupPagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_group_pages')->delete();
        
        \DB::table('admin_group_pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'admin_group_id' => 2,
                'name' => 'List Admin Module',
                'menu_title' => 'List Admin Module',
                'menu_order' => 0,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => 'admin/modules',
                'show_in_menu' => 'Y',
            ),
            1 => 
            array (
                'id' => 2,
                'admin_group_id' => 2,
                'name' => 'Add Admin Modules',
                'menu_title' => 'Add Admin Modules',
                'menu_order' => 1,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            2 => 
            array (
                'id' => 3,
                'admin_group_id' => 2,
                'name' => 'Edit Admin  Modules',
                'menu_title' => 'Edit Admin  Modules',
                'menu_order' => 2,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            3 => 
            array (
                'id' => 4,
                'admin_group_id' => 2,
                'name' => 'Delete Admin Modules',
                'menu_title' => 'Delete Admin Modules',
                'menu_order' => 3,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            4 => 
            array (
                'id' => 5,
                'admin_group_id' => 2,
                'name' => 'List  Admin Module Pages',
                'menu_title' => 'List  Admin Module Pages',
                'menu_order' => 4,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => 'admin/module-pages',
                'show_in_menu' => 'Y',
            ),
            5 => 
            array (
                'id' => 6,
                'admin_group_id' => 2,
                'name' => 'Add Admin Modules Pages',
                'menu_title' => 'Add Admin Modules Pages',
                'menu_order' => 5,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            6 => 
            array (
                'id' => 7,
                'admin_group_id' => 2,
                'name' => 'Edit Admin Modules Pages',
                'menu_title' => 'Edit Admin Modules Pages',
                'menu_order' => 6,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            7 => 
            array (
                'id' => 8,
                'admin_group_id' => 2,
                'name' => 'Delete Admin Modules Pages',
                'menu_title' => 'Delete Admin Modules Pages',
                'menu_order' => 7,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            8 => 
            array (
                'id' => 9,
                'admin_group_id' => 2,
                'name' => 'Assign Rights',
                'menu_title' => 'Assign Rights',
                'menu_order' => 8,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => 'admin/user-type-rights',
                'show_in_menu' => 'Y',
            ),
            9 => 
            array (
                'id' => 10,
                'admin_group_id' => 2,
                'name' => 'List Admin Actions',
                'menu_title' => 'List Admin Actions',
                'menu_order' => 9,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => 'admin/actions',
                'show_in_menu' => 'Y',
            ),
            10 => 
            array (
                'id' => 11,
                'admin_group_id' => 2,
                'name' => 'Add Admin Action',
                'menu_title' => 'Add Admin Action',
                'menu_order' => 10,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            11 => 
            array (
                'id' => 12,
                'admin_group_id' => 2,
                'name' => 'Edit Admin Action',
                'menu_title' => 'Edit Admin Action',
                'menu_order' => 11,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            12 => 
            array (
                'id' => 13,
                'admin_group_id' => 2,
                'name' => 'Delete Admin Action',
                'menu_title' => 'Delete Admin Action',
                'menu_order' => 12,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            13 => 
            array (
                'id' => 14,
                'admin_group_id' => 1,
                'name' => 'List User Types',
                'menu_title' => 'List User Types',
                'menu_order' => 1,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => 'admin/user-types',
                'show_in_menu' => 'Y',
            ),
            14 => 
            array (
                'id' => 15,
                'admin_group_id' => 1,
                'name' => 'Add User Type',
                'menu_title' => 'Add User Type',
                'menu_order' => 2,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            15 => 
            array (
                'id' => 16,
                'admin_group_id' => 1,
                'name' => 'Edit User Type',
                'menu_title' => 'Edit User Type',
                'menu_order' => 3,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            16 => 
            array (
                'id' => 17,
                'admin_group_id' => 1,
                'name' => 'Delete User Type',
                'menu_title' => 'Delete User Type',
                'menu_order' => 4,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            17 => 
            array (
                'id' => 18,
                'admin_group_id' => 1,
                'name' => 'List Users',
                'menu_title' => 'List Users',
                'menu_order' => 5,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => 'admin/users',
                'show_in_menu' => 'Y',
            ),
            18 => 
            array (
                'id' => 19,
                'admin_group_id' => 1,
                'name' => 'Add Users',
                'menu_title' => 'Add Users',
                'menu_order' => 6,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            19 => 
            array (
                'id' => 20,
                'admin_group_id' => 1,
                'name' => 'Edit Users',
                'menu_title' => 'Edit Users',
                'menu_order' => 7,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            20 => 
            array (
                'id' => 21,
                'admin_group_id' => 1,
                'name' => 'Delete  Users',
                'menu_title' => 'Delete  Users',
                'menu_order' => 8,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => '',
                'show_in_menu' => 'N',
            ),
            21 => 
            array (
                'id' => 22,
                'admin_group_id' => 1,
                'name' => 'User Logs',
                'menu_title' => 'User Logs',
                'menu_order' => 8,
                'description' => '',
                'is_sub_menu' => 'Y',
                'url' => 'admin/user-logs',
                'show_in_menu' => 'Y',
            ),
        ));
        
        
    }
}