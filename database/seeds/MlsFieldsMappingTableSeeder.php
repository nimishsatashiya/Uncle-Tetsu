<?php

use Illuminate\Database\Seeder;

class MlsFieldsMappingTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mls_fields_mapping')->delete();
        
        \DB::table('mls_fields_mapping')->insert(array (
            0 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            1 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            2 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            3 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            4 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'bath',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            5 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'building_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            6 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            7 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            8 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            9 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            10 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            11 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'floor_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            12 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            13 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            14 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            15 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            16 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            17 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            18 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            19 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'number_of_bedrooms',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            20 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'number_of_garages',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            21 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            22 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            23 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            24 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            25 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            26 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            27 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 1,
                'db_field' => 'year_built',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            28 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            29 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            30 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            31 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            32 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'bath',
                'api_field' => 'Baths_Min',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            33 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'building_id',
                'api_field' => '{"stories" : "Stories","building_type" : "BuildingType","building_size" : "StructureSqFt","year_built" : "YearBuilt"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            34 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            35 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            36 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            37 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            38 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            39 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'floor_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            40 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            41 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            42 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            43 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            44 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            45 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            46 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            47 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'number_of_bedrooms',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            48 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'number_of_garages',
                'api_field' => 'GarageSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            49 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            50 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            51 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            52 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            53 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            54 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            55 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 2,
                'db_field' => 'year_built',
                'api_field' => 'YearBuilt',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            56 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            57 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            58 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            59 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            60 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'bath',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            61 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'building_id',
                'api_field' => '{"stories" : "Stories","building_type" : "BuildingType","building_size" : "StructureSqFt","year_built" : "YearBuilt"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            62 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            63 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            64 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            65 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            66 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            67 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'floor_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            68 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            69 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            70 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            71 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            72 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            73 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            74 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            75 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'number_of_bedrooms',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            76 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'number_of_garages',
                'api_field' => 'GarageSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            77 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            78 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            79 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            80 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            81 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            82 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            83 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 3,
                'db_field' => 'year_built',
                'api_field' => 'YearBuilt',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            84 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            85 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            86 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            87 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            88 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'bath',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            89 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'building_id',
                'api_field' => '{"building_name" : "BuildingName","stories" : "Stories","building_type" : "BuildingType","building_size" : "StructureSqFt","year_built" : "YearBuilt"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            90 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            91 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            92 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            93 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            94 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            95 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'floor_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            96 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            97 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            98 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            99 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            100 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            101 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            102 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            103 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'number_of_bedrooms',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            104 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'number_of_garages',
                'api_field' => 'GarageSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            105 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            106 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            107 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            108 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            109 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            110 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            111 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 4,
                'db_field' => 'year_built',
                'api_field' => 'YearBuilt',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            112 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            113 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            114 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            115 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            116 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'bath',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            117 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'building_id',
                'api_field' => '{"building_size" : "MinimumBuildingSqFt"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            118 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            119 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            120 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            121 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            122 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            123 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'floor_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            124 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            125 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            126 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            127 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            128 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            129 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            130 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            131 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'number_of_bedrooms',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            132 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'number_of_garages',
                'api_field' => '',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            133 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            134 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            135 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            136 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            137 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            138 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            139 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 5,
                'db_field' => 'year_built',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            140 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            141 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            142 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            143 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            144 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'bath',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            145 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'building_id',
                'api_field' => '{"building_name" : "BuildingName", "building_type" : "BuildingType"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            146 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            147 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            148 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            149 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            150 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            151 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'floor_space',
                'api_field' => 'Spaces_Max, Spaces_Min',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            152 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            153 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            154 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            155 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            156 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            157 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            158 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            159 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'number_of_bedrooms',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            160 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'number_of_garages',
                'api_field' => 'GarageSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            161 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            162 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            163 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            164 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            165 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            166 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            167 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 6,
                'db_field' => 'year_built',
                'api_field' => 'YearBuilt',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            168 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            169 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            170 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            171 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            172 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'bath',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            173 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'building_id',
                'api_field' => '{"building_name" : "BuildingName", "building_type" : "BuildingType"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            174 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            175 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            176 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            177 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            178 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            179 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'floor_space',
                'api_field' => 'Spaces_Max, Spaces_Min',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            180 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            181 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            182 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            183 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            184 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            185 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            186 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            187 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'number_of_bedrooms',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            188 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'number_of_garages',
                'api_field' => 'GarageSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            189 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            190 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            191 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            192 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            193 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            194 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            195 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 7,
                'db_field' => 'year_built',
                'api_field' => 'YearBuilt',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            196 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            197 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            198 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            199 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            200 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'bath',
                'api_field' => 'BathsThreeQuarter',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            201 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'building_id',
                'api_field' => '{"stories" : "Stories","building_size" : "StructureSqFt","year_built" : "YearBuilt"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            202 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            203 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            204 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            205 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            206 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            207 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'floor_space',
                'api_field' => 'Spaces_Max, Spaces_Min',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            208 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            209 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            210 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            211 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            212 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            213 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            214 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            215 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'number_of_bedrooms',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            216 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'number_of_garages',
                'api_field' => 'GarageSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            217 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            218 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            219 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            220 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            221 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            222 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            223 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 8,
                'db_field' => 'year_built',
                'api_field' => 'YearBuilt',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            224 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            225 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            226 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            227 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            228 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'bath',
                'api_field' => 'Baths_Min',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            229 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'building_id',
                'api_field' => '{"building_name" : "BuildingName","stories" : "Stories","building_type" : "BuildingType","building_size" : "StructureSqFt","year_built" : "YearBuilt"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            230 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            231 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            232 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            233 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            234 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            235 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'floor_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            236 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            237 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            238 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            239 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            240 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            241 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            242 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            243 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'number_of_bedrooms',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            244 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'number_of_garages',
                'api_field' => 'GarageSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            245 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            246 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            247 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            248 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            249 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            250 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            251 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 10,
                'db_field' => 'year_built',
                'api_field' => 'YearBuilt',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            252 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'address ',
                'api_field' => 'AreaID, FilteredAddress|CrossStreet,CityName,StateOrProvinceName,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            253 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'agent_email',
                'api_field' => 'coListingAgentEmailAddress',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            254 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'agent_name',
                'api_field' => 'coListingAgentFirstName,coListingAgentLastName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            255 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            256 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'bath',
                'api_field' => 'Baths_Min',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            257 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'building_id',
                'api_field' => '{"building_name" : "BuildingName","stories" : "Stories","building_type" : "BuildingType","building_size" : "StructureSqFt","year_built" : "YearBuilt"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            258 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'city_id',
                'api_field' => 'CityName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            259 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'county',
                'api_field' => 'CountyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            260 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'default',
                'api_field' => 'ListingStatus,PhotoCount,PropertyID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            261 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'description',
                'api_field' => 'AdditionalListingInfo_IDX',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            262 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'dom',
                'api_field' => 'DaysOnMarket',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            263 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'floor_space',
                'api_field' => 'Spaces_Max, Spaces_Min',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            264 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            265 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'mls_no',
                'api_field' => 'ListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            266 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'mls_original_no',
                'api_field' => 'OrigListingID',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            267 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'mls_type',
                'api_field' => 'Class',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            268 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'modified_time',
                'api_field' => 'ModificationTimestamp',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            269 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            270 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            271 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'number_of_bedrooms',
                'api_field' => 'BedsTotal',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            272 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'number_of_garages',
                'api_field' => 'GarageSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            273 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'ParkingSpaces',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            274 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'pets_allowed',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            275 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            276 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            277 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvinceName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            278 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            279 => 
            array (
                'mls_id' => 1,
                'mls_class_id' => 11,
                'db_field' => 'year_built',
                'api_field' => 'YearBuilt',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            280 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'address ',
                'api_field' => 'StreetNumber,StreetDirPrefix,StreetName,StreetSuffix,UnitNumber,City,StateOrProvince,PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            281 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'agent_email',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            282 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'agent_name',
                'api_field' => 'SellingAgentFullName',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            283 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'balconies_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            284 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'bath',
                'api_field' => 'BathsTotal',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            285 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'building_id',
                'api_field' => '{"stories" : "NumberOfStoriesInBuilding","building_size" : "SQFTBuilding","year_built" : "YearBuilt"}',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            286 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'city_id',
                'api_field' => 'City',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            287 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'county',
                'api_field' => 'CountyOrParish ',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            288 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'default',
                'api_field' => 'PhotoCount,Matrix_Unique_ID,Status',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            289 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'description',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            290 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'dom',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            291 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'floor_space',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            292 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'latlong_id',
                'api_field' => 'Latitude,Longitude',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            293 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'mls_no',
                'api_field' => 'MLSNumber',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            294 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'mls_original_no',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            295 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'mls_type',
                'api_field' => 'PropertyType',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            296 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'modified_time',
                'api_field' => 'MatrixModifiedDT',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            297 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'neighborhood_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            298 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'number_of_balconies',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            299 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'number_of_bedrooms',
                'api_field' => 'BedsTotal',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            300 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'number_of_garages',
                'api_field' => 'GarageLength,GarageWidth  ',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            301 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'number_of_parking_spaces',
                'api_field' => 'NumberOfParkingSpaces ',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            302 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'pets_allowed',
                'api_field' => 'NumberOfPetsAllowed',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            303 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'pincode',
                'api_field' => 'PostalCode',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            304 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'price',
                'api_field' => 'ListPrice',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            305 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'state_id',
                'api_field' => 'StateOrProvince',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            306 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'status_id',
                'api_field' => NULL,
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
            307 => 
            array (
                'mls_id' => 2,
                'mls_class_id' => 12,
                'db_field' => 'year_built',
                'api_field' => 'YearBuilt',
                'created_at' => '2019-06-03 18:48:54',
                'updated_at' => '2019-06-03 18:48:54',
            ),
        ));
        
        
    }
}