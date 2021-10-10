<?php

use Illuminate\Database\Seeder;

class MlsClassTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mls_class')->delete();
        
        \DB::table('mls_class')->insert(array (
            0 => 
            array (
                'id' => 1,
                'mls_id' => 1,
                'class_name' => 'RLL',
                'status' => 1,
                'last_import_date' => '2019-06-03 13:57:13',
                'created_at' => '2019-06-03 19:27:13',
                'updated_at' => '2019-06-03 13:57:13',
            ),
            1 => 
            array (
                'id' => 2,
                'mls_id' => 1,
                'class_name' => 'RMH',
                'status' => 1,
                'last_import_date' => '2019-06-03 13:57:14',
                'created_at' => '2019-06-03 19:27:14',
                'updated_at' => '2019-06-03 13:57:14',
            ),
            2 => 
            array (
                'id' => 3,
                'mls_id' => 1,
                'class_name' => 'RIN',
                'status' => 1,
                'last_import_date' => '2019-06-03 13:57:15',
                'created_at' => '2019-06-03 19:27:15',
                'updated_at' => '2019-06-03 13:57:15',
            ),
            3 => 
            array (
                'id' => 4,
                'mls_id' => 1,
                'class_name' => 'CIN',
                'status' => 1,
                'last_import_date' => '2019-06-03 13:57:15',
                'created_at' => '2019-06-03 19:27:15',
                'updated_at' => '2019-06-03 13:57:15',
            ),
            4 => 
            array (
                'id' => 5,
                'mls_id' => 1,
                'class_name' => 'CLL',
                'status' => 1,
                'last_import_date' => '2019-06-03 13:57:16',
                'created_at' => '2019-06-03 19:27:16',
                'updated_at' => '2019-06-03 13:57:16',
            ),
            5 => 
            array (
                'id' => 6,
                'mls_id' => 1,
                'class_name' => 'CLR',
                'status' => 1,
                'last_import_date' => '2019-06-03 13:57:16',
                'created_at' => '2019-06-03 19:27:16',
                'updated_at' => '2019-06-03 13:57:16',
            ),
            6 => 
            array (
                'id' => 7,
                'mls_id' => 1,
                'class_name' => 'CMF',
                'status' => 1,
                'last_import_date' => '2019-06-03 13:57:17',
                'created_at' => '2019-06-03 19:27:17',
                'updated_at' => '2019-06-03 13:57:17',
            ),
            7 => 
            array (
                'id' => 8,
                'mls_id' => 1,
                'class_name' => 'CBO',
                'status' => 1,
                'last_import_date' => NULL,
                'created_at' => '2019-06-01 02:45:05',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'mls_id' => 1,
                'class_name' => 'RLR',
                'status' => 1,
                'last_import_date' => NULL,
                'created_at' => '2019-06-01 02:45:05',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            10 => 
            array (
                'id' => 11,
                'mls_id' => 1,
                'class_name' => 'RES',
                'status' => 1,
                'last_import_date' => NULL,
                'created_at' => '2019-06-01 02:45:04',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            11 => 
            array (
                'id' => 12,
                'mls_id' => 2,
                'class_name' => 'Listing',
                'status' => 1,
                'last_import_date' => NULL,
                'created_at' => '2019-06-03 18:44:48',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}