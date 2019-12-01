<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline;}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
}

ul.pagination li span {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
}

/*ul.pagination li a.active {
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
}*/
ul.pagination li.active span{
    background-color: #4CAF50;
    color: white;
    border-radius: 5px;
}

ul.pagination li a:hover:not(.active) {background-color: #ddd;}

</style>
<body>

	
	<table id="customers">
	  <thead>
	    <tr>
	      <th>Name</th>
	      <th>Color</th>
	      <th>Description</th>
	      <th>Image</th>
	      <th>Category</th>
	      <th>businesses_is_closed</th>
	      <th>businesses_url</th>
	      <th>businesses_review_count</th>
	      <th>businesses_rating</th>
	      <th>businesses_transactions</th>
	      <th>businesses_coordinates_lat</th>
	      <th>businesses_coordinates_long</th>
	      <th>businesses_loc_address1</th>
	      <th>businesses_loc_address2</th>
	      <th>businesses_loc_address3</th>
	      <th>businesses_loc_city</th>
	      <th>businesses_loc_zip_code</th>
	      <th>businesses_loc_country</th>
	      <th>businesses_loc_state</th>
	      <th>businesses_display_address</th>
	      <th>businesses_phone</th>
	      <th>businesses_display_phone</th>
	      <th>businesses_distance</th>
	     


	    </tr>
	  </thead>
	  <tbody>
	   
	    @foreach($tbusiness as $data)
	    <tr>
	    	<td>{{$data->businesses_string}}</td>
	    	<td>{{$data->businesses_alias}}</td>
	    	<td>{{$data->businesses_name}}</td>
	    	<td><img src="{{ $data->businesses_image_url }}" width="200"/></td>
	    	<td>{{ App\model\tcategory::get_categories_by_id($data->businesses_id) }}</td>
	    	<td>{{ $data->businesses_is_closed===0? 'Closed' : 'Open' }}</td>
	    	<td><a href="{{$data->businesses_url}}">Here!!</a></td>
	    	<td>{{ $data->businesses_review_count}}</td>
	    	<td>{{$data->businesses_rating}}</td>
	    	<td>{{$data->businesses_transactions}}</td>
	    	<td>{{$data->businesses_coordinates_lat}}</td>
	    	<td>{{$data->businesses_coordinates_long}}</td>
	    	<td>{{$data->businesses_loc_address1}}</td>
	    	<td>{{$data->businesses_loc_address2}}</td>
	    	<td>{{$data->businesses_loc_address3}}</td>
	    	<td>{{$data->businesses_loc_city}}</td>
	    	<td>{{$data->businesses_loc_zip_code}}</td>
	    	<td>{{$data->businesses_loc_country}}</td>
	    	<td>{{$data->businesses_loc_state}}</td>
	    	<td>{{$data->businesses_display_address}}</td>
	    	<td>{{$data->businesses_phone}}</td>
	    	<td>{{$data->businesses_display_phone}}</td>
	    	<td>{{$data->businesses_distance}}</td>


	    </tr>
	    @endforeach
	  </tbody>
	</table>
	<br>
	<div>
		{{ $tbusiness->links() }}
	</div>
	
	
</body>
</html>