<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>		
	</head>
	<body>
		<div class="container">
			<div class="clearfix">&nbsp;</div>
			<form>
			<div class="row">
				<div class="col-md-2">
					<label for="email">Search By MLS:</label>		
				</div>
				<div class="col-md-4">
					<input type="text" class="form-control" name="mls" value="{{ request()->get("mls") }}">
				</div>
				<div class="col-md-4">
					<button type="submit" class="pull-left btn btn-success">Search</button>					
				</div>
			</div>
			</form>
		   	<hr />
		   	@if(isset($model))
		   		<div class="row">
		   			<div class="col-md-12">
		   				<table class="table table-bordered">
		   					<tr>
		   						<td width="40%">
		   							<b>State: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $model->StateName }}
		   						</td>
		   					</tr>
		   					<tr>
		   						<td width="40%">
		   							<b>City: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $model->CityName }}
		   						</td>
		   					</tr>
		   					<tr>
		   						<td width="40%">
		   							<b>Street Address: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $model->StreetName }}
		   						</td>
		   					</tr>
		   					<tr>
		   						<td width="40%">
		   							<b>Status: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $model->MlsStatus }}
		   						</td>
		   					</tr>
		   					<tr>
		   						<td width="40%">
		   							<b>Price: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $model->Price }}
		   						</td>
		   					</tr>
		   					@if(isset($modelImage) && $modelImage)
			   					<tr>
			   						<td width="40%">
			   							<b>Image: </b>
			   						</td>
			   						<td width="60%" class="text-center">
			   							<img src='{{ $modelImage->image_url }}' style="max-width: 200px;" />
			   						</td>
			   					</tr>		   					
		   					@endif
		   				</table>
		   			</div>
		   		</div>
		   	@elseif(isset($record))	
		   		<div class="row">
		   			<div class="col-md-12">
		   				<table class="table table-bordered">
		   					<tr>
		   						<td width="40%">
		   							<b>State: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $record['StateOrProvinceName'] }}
		   						</td>
		   					</tr>
		   					<tr>
		   						<td width="40%">
		   							<b>City: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $record['CityName'] }}
		   						</td>
		   					</tr>
		   					<tr>
		   						<td width="40%">
		   							<b>Street Address: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $record['CrossStreet'] }}
		   						</td>
		   					</tr>
		   					<tr>
		   						<td width="40%">
		   							<b>Status: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $record['ListingStatus'] }}
		   						</td>
		   					</tr>
		   					<tr>
		   						<td width="40%">
		   							<b>Price: </b>
		   						</td>
		   						<td width="60%">
		   							{{ $record['ListPrice'] }}
		   						</td>
		   					</tr>
		   					@if(isset($image_url) && $image_url)
			   					<tr>
			   						<td width="40%">
			   							<b>Image: </b>
			   						</td>
			   						<td width="60%" class="text-center">
			   							<img src='{{ $image_url }}' style="max-width: 200px;" />
			   						</td>
			   					</tr>		   					
		   					@endif
		   				</table>
		   			</div>
		   		</div>
		   	@elseif(isset($noData))	
		   		<div class="row">
		   			<div class="col-md-12">
		   				<h4 class="text-center">No data found!</h4>
		   			</div>
		   		</div>
		   	@endif
		</div>			
	</body>
</html>