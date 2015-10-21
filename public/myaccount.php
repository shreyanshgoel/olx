<?php 

 include 'includes/header.php';

if(isset($set_user))
{
	$my = new myaccount ;
	
	if(isset($_POST['update']))
	{
	   $my->update($_POST['fname'], $_POST['address'], $_POST['place']);	
	}
	
	if(isset($_POST['add_product']))
	{
	   $my->add($_POST['name'], $_POST['price'], $_POST['c']);	
	}
	
	if(isset($_POST['del_product']))
	{
	   $my->delete($_POST['product']);	
	}
	
?>

Personal Details <br /><br />
<form action="myaccount.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" name="fname" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1">
  </div>
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map" style="width:800px;"></div><br>
    <input type="text" name="place" id="place">
  
    <script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.


function initialize() {
  var mapOptions = {
    center: {lat: -33.8688, lng: 151.2195},
    zoom: 13,
    scrollwheel: false
  };
  var map = new google.maps.Map(document.getElementById('map'),
    mapOptions);

  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));

  // Create the autocomplete helper, and associate it with
  // an HTML text input box.
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });

  // Get the full place details when the user selects a place from the
  // list of suggestions.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    var place = autocomplete.getPlace();
	
    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

document.getElementById('place').value = place.place_id;

    // Set the position of the marker using the place ID and location.
    marker.setPlace(/** @type {!google.maps.Place} */ ({
      placeId: place.place_id,
      location: place.geometry.location
    }));
	
    marker.setVisible(true);

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
        'Place ID: ' + place.place_id + '<br>' +
        place.formatted_address + '</div>');
        infowindow.open(map, marker);
  });
}

// Run the initialize function when the window has finished loading.
google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAPw_YyVsi1ERYh4O5XcWLT6OAh1_1oFp4&libraries=places&callback=initialize"
         async defer></script>
  
  <button type="submit" name="update" class="btn btn-default">Submit</button>
</form>





Add a Product <br /><br />
<form action="myaccount.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Name of the product</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="text" name="price" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group">
        <label for="exampleInputPassword1">Category</label>
    <select name="c">
    <option value="1">electronics</option>
    <option value="2">vehicles</option>
    <option value="3">books</option>
    <option value="4">fashion</option>
    <option value="5">sports</option>
    </select>
    
  </div>
  <div class="form-group">
    
    <label for="exampleInputFile">File input</label>
    <input type="file" name="file" id="exampleInputFile">
    
  </div>
  <button type="submit" name="add_product" class="btn btn-default">Submit</button>
</form>

Delete Product

<br /><br />
<form action="myaccount.php" method="post">
  
  <select name="product">
  
   <?php  
    
	 $my->all_products();
   
   for($i = 0; $i < $my->query_num_rows; $i++){ 
   
    $item = $my->query_run->fetch();?>
   
     <option value="<?php echo $item['product_id'];?>"><?php echo $item['name'];?></option>
     
   <?php } ?>
  </select>
  
  <br /><br />
  <button type="submit" name="del_product" class="btn btn-default">Submit</button>
</form>

<?php  }else{?>



NOT FOUND


<?php } ?>