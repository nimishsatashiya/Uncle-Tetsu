<?php

use Illuminate\Database\Seeder;

class MlsMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mls_master')->delete();
        
        \DB::table('mls_master')->insert(array (
            0 => 
            array (
                'id' => 1,
                'url' => 'http://alt-calrets.mlslistings.com:6103',
                'username' => 'jmechura',
                'password' => 'j450au18',
                'status' => 1,
                'created_at' => '2019-04-05 18:28:18',
                'updated_at' => '2019-04-05 18:28:18',
            ),
            1 => 
            array (
                'id' => 2,
                'url' => 'http://matrixrets.ntreis.net/rets/login.ashx',
                'username' => '0602814_IDX',
                'password' => 'gZ3SU-3wS',
                'status' => 1,
                'created_at' => '2019-04-20 06:32:37',
                'updated_at' => '2019-04-20 06:32:37',
            ),
        ));
        
        
    }
}