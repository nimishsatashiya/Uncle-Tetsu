
@foreach($viewData as $view)


    
    
        <tr>
        	<td>ID:</td>
        	<td>{{$view->id}}</td>
        </tr>
        <tr>
        	<td>Found From :</td>
        	<td>{{$view->mls_id}}</td>
        </tr>
        <tr>
        	<td>MLS No:</td>
        	<td>{{$view->mls_no}}</td>
        </tr>
        <tr>
        	<td>MLS Original No:</td>
        	<td>{{$view->mls_original_no}}</td>
        </tr>
        <tr>
        	<td>City:</td>
        	<td>{{$view->city_id}}</td>
        </tr>
        <tr>
        	<td>State :</td>
        	<td>{{$view->state_id}}</td>
        </tr>
        <tr>
        	<td>Pincode:</td>
        	<td>{{$view->pincode}}</td>
        </tr>
        <tr>
        	<td>Address :</td>
        	<td>{{$view->address}}</td>
        </tr>
        <tr>
        	<td>Price :</td>
        	<td>{{$view->price}}</td>
        </tr>
        <tr>
        	<td>Bath :</td>
        	<td>{{$view->bath}}</td>
        </tr>
        <tr>
        	<td>Built Year :</td>
        	<td>{{$view->year_built}}</td>
        </tr>
        <tr>
        	<td>DOM :</td>
        	<td>{{$view->dom}}</td>
        </tr>
        <tr>
        	<td>MLS Type :</td>
        	<td>{{$view->mls_type}}</td>
        </tr>
        <tr>
        	<td>Agent Email :</td>
        	<td>{{$view->agent_email}}</td>
        </tr>
        <tr>
        	<td>Agent Name :</td>
        	<td>{{$view->agent_name}}</td>
        </tr>
        <tr>
        	<td>Floor Space :</td>
        	<td>{{$view->floor_space}}</td>
        </tr>
        <tr>
        	<td>Balcony Space :</td>
        	<td>{{$view->balconies_space}}</td>
        </tr>
        <tr>
        	<td>Neighborhood :</td>
        	<td>{{$view->neighborhood_id}}</td>
        </tr>
        <tr>
        	<td>No of Balcony :</td>
        	<td>{{$view->number_of_balconies}}</td>
        </tr>
         <tr>
        	<td>No of Bedroom :</td>
        	<td>{{$view->number_of_bedrooms}}</td>
        </tr>
        <tr>
        	<td>No of Garadge :</td>
        	<td>{{$view->number_of_garages}}</td>
        </tr>
        <tr>
        	<td>No of Parking Space :</td>
        	<td>{{$view->number_of_parking_spaces}}</td>
        </tr>
        <tr>
        	<td>Pets Allowed :</td>
        	<td>{{$view->pets_allowed}}</td>
        </tr>
        <tr>
        	<td>Description :</td>
        	<td>{{$view->description}}</td>
        </tr>
        <tr>
        	<td>Status Id :</td>
        	<td>{{$view->status_id}}</td>
        </tr>
        <tr>
        	<td>Building Id :</td>
        	<td>{{$view->building_id}}</td>
        </tr>
        <tr>
        	<td>Property Images :</td>
        	<td> @foreach($Images as $value)
                <?php $img_url = AWS_BUCKET_URL.$view->id."/".$value->image_name; ?>
                <a href="{{$img_url}}" target="_blank">
                <img clas="thumbnail"src="{{$img_url}}" height="50px" width="50px" style="margin: 5px">       
                </a>
            @endforeach</td>
        </tr>
        



    
@endforeach