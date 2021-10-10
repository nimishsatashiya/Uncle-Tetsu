<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class importSphinxData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:sphinxdata';
    protected $totalAdded = 0;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
   	  $sql = 
   	  "
		SELECT listings.id, listings.address, listings.description, listings.number_of_bedrooms, listings.bath, listings.price,
			listings.dom, listings.number_of_garages, listings.county, listings.city_id, listings.state_id, listings.agent_name, listings.mls_type,
			listings.`year_built`, listings.created_at, listings.updated_at,
			buildings.`building_name`,buildings.`building_size`, buildings.`building_type`,buildings.`stories`,
			cities.`city_name`, states.`state_name`, listings.`mls_id`, latlong.`latitude`, latlong.`longitude`,listings.`status_id`
		FROM `listings`
		INNER JOIN `cities` ON cities.`id` = listings.`city_id`
		INNER JOIN `states` ON states.`id` = listings.`state_id`
		LEFT JOIN buildings ON buildings.`id` = listings.`building_id`
		LEFT JOIN `latlong` ON latlong.id = listings.`latlong_id`
		WHERE listings.`status_id` = 1001 limit 100000;   	  
   	  ";	

   	  $rows = \DB::select($sql);
   	  $db = \DB::connection('sphinx');
	  $i = 0;	   	  
	  $added = 0;
   	  foreach($rows as $row)
   	  {
   	  	  $dataToInsert = [
	         "id" => $row->id,
	         "address" => $row->address,
	         "description" => $row->description,
	         "number_of_bedrooms" => $row->number_of_bedrooms,
	         "bath" => $row->bath,
	         "price" => $row->price,
	         "dom" => $row->dom,
	         "number_of_garages" => $row->number_of_garages,
	         "county" => $row->county,
	         "city_id" => $row->city_id,
	         "state_id" => $row->state_id,
	         "agent_name" => $row->agent_name,
	         "mls_type" => $row->mls_type,
	         "year_built" => $row->year_built,
	         "created_at" => $row->created_at,
	         "updated_at" => $row->updated_at,
	         "building_name" => $row->building_name,
	         "building_size" => $row->building_size,
	         "building_type" => $row->building_type,
	         "stories" => $row->stories,
	         "city_name" => $row->city_name,
	         "state_name" => $row->state_name,
	         "mls_id" => $row->mls_id,
	         "status_id" => $row->status_id,
	         "lat" => $row->latitude,
	         "lng" => $row->longitude,
	      ];

	      foreach($dataToInsert as $key => $val){
	      	if(is_null($dataToInsert[$key]) || empty($dataToInsert[$key])){
	      		$dataToInsert[$key] = "";
	      		//unset($dataToInsert[$key]);
	      	}

	      	$dataToInsert[$key] = trim($dataToInsert[$key])."";
	      }

	      try
	      {
	      	$db->table('listing')->insert($dataToInsert);	
	      	$added++;
	      	echo "\n$added";
	      }catch(\Exception $e)
	      {
	      	continue;
	      }
	      $i++;
	      echo "\n$i";
   	  }

        exit("\nCompleted\n");
    }
}
