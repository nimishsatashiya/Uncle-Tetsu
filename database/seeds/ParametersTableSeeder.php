<?php

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('parameters')->delete();
        
        \DB::table('parameters')->insert(array (
            0 => 
            array (
                'para_id' => 1,
                'para_parent_id' => 0,
                'para_value' => 'STATUS',
                'para_desc' => 'Status',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Status',
                'created_at' => '2016-12-27 05:34:16',
                'created_by' => 1,
                'updated_at' => '2016-12-27 05:34:16',
                'updated_by' => 1,
                'status' => 'A',
            ),
            1 => 
            array (
                'para_id' => 2,
                'para_parent_id' => 0,
                'para_value' => 'MAIL STATUS',
                'para_desc' => 'Mail Status',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Mail Status',
                'created_at' => '2016-12-27 09:33:13',
                'created_by' => 1,
                'updated_at' => '2016-12-27 09:33:13',
                'updated_by' => 1,
                'status' => 'A',
            ),
            2 => 
            array (
                'para_id' => 3,
                'para_parent_id' => 0,
                'para_value' => 'VIEW_FLAGS',
                'para_desc' => 'Dentists/offices view flags',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Dentists/offices view flags',
                'created_at' => '2017-01-05 11:55:23',
                'created_by' => 1,
                'updated_at' => '2017-01-05 11:55:23',
                'updated_by' => 1,
                'status' => 'A',
            ),
            3 => 
            array (
                'para_id' => 1001,
                'para_parent_id' => 1,
                'para_value' => 'Active',
                'para_desc' => 'Active Status',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Active Status',
                'created_at' => '2016-12-27 07:57:38',
                'created_by' => 1,
                'updated_at' => '2016-12-27 07:57:38',
                'updated_by' => 1,
                'status' => 'A',
            ),
            4 => 
            array (
                'para_id' => 1002,
                'para_parent_id' => 1,
                'para_value' => 'Inactive',
                'para_desc' => 'Inactive Status',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Inactive Status',
                'created_at' => '2016-12-27 07:59:36',
                'created_by' => 1,
                'updated_at' => '2016-12-27 07:59:36',
                'updated_by' => 1,
                'status' => 'A',
            ),
            5 => 
            array (
                'para_id' => 2001,
                'para_parent_id' => 2,
                'para_value' => 'Delivered',
                'para_desc' => 'Delivered',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Delivered',
                'created_at' => '2016-12-27 09:33:51',
                'created_by' => 1,
                'updated_at' => '2016-12-27 09:33:51',
                'updated_by' => 1,
                'status' => 'A',
            ),
            6 => 
            array (
                'para_id' => 2002,
                'para_parent_id' => 2,
                'para_value' => 'Pending Lookup',
                'para_desc' => 'Pending Lookup',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Pending Lookup',
                'created_at' => '2016-12-27 09:34:50',
                'created_by' => 1,
                'updated_at' => '2016-12-27 09:34:50',
                'updated_by' => 1,
                'status' => 'A',
            ),
            7 => 
            array (
                'para_id' => 2003,
                'para_parent_id' => 2,
                'para_value' => 'Pending Manual Verification',
                'para_desc' => 'Pending Manual Verification',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Pending Manual Verification',
                'created_at' => '2016-12-28 10:52:20',
                'created_by' => 1,
                'updated_at' => '2016-12-28 10:52:20',
                'updated_by' => 1,
                'status' => 'A',
            ),
            8 => 
            array (
                'para_id' => 2004,
                'para_parent_id' => 2,
                'para_value' => 'Need To Do Call',
                'para_desc' => 'Need To Do Call',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Need To Do Call',
                'created_at' => '2018-02-16 09:40:46',
                'created_by' => 3,
                'updated_at' => '2018-02-16 09:40:46',
                'updated_by' => 3,
                'status' => 'A',
            ),
            9 => 
            array (
                'para_id' => 3001,
                'para_parent_id' => 3,
                'para_value' => 'Top-Rated Near You Block',
                'para_desc' => 'Top-Rated Near You - Home',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Top-Rated Near You - Home',
                'created_at' => '2017-01-05 11:56:00',
                'created_by' => 1,
                'updated_at' => '2017-01-05 11:56:00',
                'updated_by' => 1,
                'status' => 'A',
            ),
            10 => 
            array (
                'para_id' => 3002,
                'para_parent_id' => 3,
                'para_value' => 'Detail Page',
                'para_desc' => 'Dentists/Offices details',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Dentists/Offices details',
                'created_at' => '2017-01-05 11:58:09',
                'created_by' => 1,
                'updated_at' => '2017-01-05 11:58:09',
                'updated_by' => 1,
                'status' => 'A',
            ),
            11 => 
            array (
                'para_id' => 3003,
                'para_parent_id' => 3,
                'para_value' => 'Nearby Block',
                'para_desc' => 'Details nearby',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Details nearby',
                'created_at' => '2017-01-05 12:17:40',
                'created_by' => 1,
                'updated_at' => '2017-01-05 12:17:40',
                'updated_by' => 1,
                'status' => 'A',
            ),
            12 => 
            array (
                'para_id' => 3004,
                'para_parent_id' => 3,
                'para_value' => 'Search Page',
                'para_desc' => 'Dentist/Office search',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Dentist/Office search',
                'created_at' => '2017-01-05 12:18:13',
                'created_by' => 1,
                'updated_at' => '2017-01-05 12:18:13',
                'updated_by' => 1,
                'status' => 'A',
            ),
            13 => 
            array (
                'para_id' => 3005,
                'para_parent_id' => 3,
                'para_value' => 'Best Page',
                'para_desc' => 'Best dentist/office',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Best dentist/office',
                'created_at' => '2017-01-05 12:19:43',
                'created_by' => 1,
                'updated_at' => '2017-01-05 12:19:43',
                'updated_by' => 1,
                'status' => 'A',
            ),
            14 => 
            array (
                'para_id' => 3006,
                'para_parent_id' => 3,
                'para_value' => 'Featured Dentist Section',
                'para_desc' => 'Dentists who views from featured advertisement section',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Dentists who views from featured advertisement section',
                'created_at' => '2017-04-22 16:07:31',
                'created_by' => 1,
                'updated_at' => '2017-04-22 16:07:31',
                'updated_by' => 1,
                'status' => 'A',
            ),
            15 => 
            array (
                'para_id' => 3007,
                'para_parent_id' => 3,
                'para_value' => 'Office Top-Rated Near You - Block',
                'para_desc' => 'Top-Rated Near You - Home',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Top-Rated Near You - Home',
                'created_at' => '2017-07-07 08:41:44',
                'created_by' => 1,
                'updated_at' => '2017-07-07 08:41:44',
                'updated_by' => 1,
                'status' => 'A',
            ),
            16 => 
            array (
                'para_id' => 3008,
                'para_parent_id' => 3,
                'para_value' => 'Office Detail - Nearby Block',
                'para_desc' => 'Office Detail - Nearby Block',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Office Detail - Nearby Block',
                'created_at' => '2017-07-07 08:42:11',
                'created_by' => 1,
                'updated_at' => '2017-07-07 08:42:11',
                'updated_by' => 1,
                'status' => 'A',
            ),
            17 => 
            array (
                'para_id' => 3009,
                'para_parent_id' => 3,
                'para_value' => 'Office Featured Office Section',
                'para_desc' => 'Office Featured Office Section',
                'para_sort_order' => 0,
                'para_tech_desc' => 'Office Featured Office Section',
                'created_at' => '2017-07-07 08:42:33',
                'created_by' => 1,
                'updated_at' => '2017-07-07 08:42:33',
                'updated_by' => 1,
                'status' => 'A',
            ),
        ));
        
        
    }
}