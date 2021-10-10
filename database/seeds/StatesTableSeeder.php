<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('states')->delete();
        
        \DB::table('states')->insert(array (
            0 => 
            array (
                'id' => 1,
                'state_name' => 'Arkansas',
                'state_code' => 'AR',
                'created_at' => '2019-05-15 15:54:51',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'state_name' => 'District of Columbia',
                'state_code' => 'DC',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => 3,
                'state_name' => 'Delaware',
                'state_code' => 'DE',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => 4,
                'state_name' => 'Florida',
                'state_code' => 'FL',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => 5,
                'state_name' => 'Georgia',
                'state_code' => 'GA',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => 6,
                'state_name' => 'Kansas',
                'state_code' => 'KS',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            6 => 
            array (
                'id' => 7,
                'state_name' => 'Louisiana',
                'state_code' => 'LA',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            7 => 
            array (
                'id' => 8,
                'state_name' => 'Maryland',
                'state_code' => 'MD',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            8 => 
            array (
                'id' => 9,
                'state_name' => 'Missouri',
                'state_code' => 'MO',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            9 => 
            array (
                'id' => 10,
                'state_name' => 'Mississippi',
                'state_code' => 'MS',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            10 => 
            array (
                'id' => 11,
                'state_name' => 'North Carolina',
                'state_code' => 'NC',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            11 => 
            array (
                'id' => 12,
                'state_name' => 'Oklahoma',
                'state_code' => 'OK',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            12 => 
            array (
                'id' => 13,
                'state_name' => 'South Carolina',
                'state_code' => 'SC',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            13 => 
            array (
                'id' => 14,
                'state_name' => 'Tennessee',
                'state_code' => 'TN',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            14 => 
            array (
                'id' => 15,
                'state_name' => 'Texas',
                'state_code' => 'TX',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            15 => 
            array (
                'id' => 16,
                'state_name' => 'West Virginia',
                'state_code' => 'WV',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            16 => 
            array (
                'id' => 17,
                'state_name' => 'Alabama',
                'state_code' => 'AL',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            17 => 
            array (
                'id' => 18,
                'state_name' => 'Connecticut',
                'state_code' => 'CT',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            18 => 
            array (
                'id' => 19,
                'state_name' => 'Iowa',
                'state_code' => 'IA',
                'created_at' => '2019-05-15 15:54:52',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            19 => 
            array (
                'id' => 20,
                'state_name' => 'Illinois',
                'state_code' => 'IL',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            20 => 
            array (
                'id' => 21,
                'state_name' => 'Indiana',
                'state_code' => 'IN',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            21 => 
            array (
                'id' => 22,
                'state_name' => 'Maine',
                'state_code' => 'ME',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            22 => 
            array (
                'id' => 23,
                'state_name' => 'Michigan',
                'state_code' => 'MI',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            23 => 
            array (
                'id' => 24,
                'state_name' => 'Minnesota',
                'state_code' => 'MN',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            24 => 
            array (
                'id' => 25,
                'state_name' => 'Nebraska',
                'state_code' => 'NE',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            25 => 
            array (
                'id' => 26,
                'state_name' => 'New Hampshire',
                'state_code' => 'NH',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            26 => 
            array (
                'id' => 27,
                'state_name' => 'New Jersey',
                'state_code' => 'NJ',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            27 => 
            array (
                'id' => 28,
                'state_name' => 'New York',
                'state_code' => 'NY',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            28 => 
            array (
                'id' => 29,
                'state_name' => 'Ohio',
                'state_code' => 'OH',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            29 => 
            array (
                'id' => 30,
                'state_name' => 'Rhode Island',
                'state_code' => 'RI',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            30 => 
            array (
                'id' => 31,
                'state_name' => 'Vermont',
                'state_code' => 'VT',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            31 => 
            array (
                'id' => 32,
                'state_name' => 'Wisconsin',
                'state_code' => 'WI',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            32 => 
            array (
                'id' => 33,
                'state_name' => 'California',
                'state_code' => 'CA',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            33 => 
            array (
                'id' => 34,
                'state_name' => 'Colorado',
                'state_code' => 'CO',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            34 => 
            array (
                'id' => 35,
                'state_name' => 'New Mexico',
                'state_code' => 'NM',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            35 => 
            array (
                'id' => 36,
                'state_name' => 'Nevada',
                'state_code' => 'NV',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            36 => 
            array (
                'id' => 37,
                'state_name' => 'Utah',
                'state_code' => 'UT',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            37 => 
            array (
                'id' => 38,
                'state_name' => 'Arizona',
                'state_code' => 'AZ',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            38 => 
            array (
                'id' => 39,
                'state_name' => 'Idaho',
                'state_code' => 'ID',
                'created_at' => '2019-05-15 15:54:53',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            39 => 
            array (
                'id' => 40,
                'state_name' => 'Montana',
                'state_code' => 'MT',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            40 => 
            array (
                'id' => 41,
                'state_name' => 'North Dakota',
                'state_code' => 'ND',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            41 => 
            array (
                'id' => 42,
                'state_name' => 'Oregon',
                'state_code' => 'OR',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            42 => 
            array (
                'id' => 43,
                'state_name' => 'South Dakota',
                'state_code' => 'SD',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            43 => 
            array (
                'id' => 44,
                'state_name' => 'Washington',
                'state_code' => 'WA',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            44 => 
            array (
                'id' => 45,
                'state_name' => 'Wyoming',
                'state_code' => 'WY',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            45 => 
            array (
                'id' => 46,
                'state_name' => 'Hawaii',
                'state_code' => 'HI',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            46 => 
            array (
                'id' => 47,
                'state_name' => 'Alaska',
                'state_code' => 'AK',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            47 => 
            array (
                'id' => 48,
                'state_name' => 'Kentucky',
                'state_code' => 'KY',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            48 => 
            array (
                'id' => 49,
                'state_name' => 'Massachusetts',
                'state_code' => 'MA',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            49 => 
            array (
                'id' => 50,
                'state_name' => 'Pennsylvania',
                'state_code' => 'PA',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            50 => 
            array (
                'id' => 51,
                'state_name' => 'Virginia',
                'state_code' => 'VA',
                'created_at' => '2019-05-15 15:54:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            51 => 
            array (
                'id' => 52,
                'state_name' => NULL,
                'state_code' => 'Texas',
                'created_at' => '2019-05-15 13:25:26',
                'updated_at' => '2019-05-15 13:25:26',
            ),
            52 => 
            array (
                'id' => 53,
                'state_name' => NULL,
                'state_code' => 'Oklahoma',
                'created_at' => '2019-05-15 13:47:26',
                'updated_at' => '2019-05-15 13:47:26',
            ),
        ));
        
        
    }
}