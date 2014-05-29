<?php 
//tq  ?flat=-17.826334&flng=31.053135&tlat=-17.831523&tlng=31.052363



if (has_fields()){
	$flat = (float)$_GET['flat'];
	$flng = (float)$_GET['flng'];
	$tlat = (float)$_GET['tlat'];
	$tlng = (float)$_GET['tlng'];
	
	/////die ($tlat." - ".$tlng." - ".$flat." _ ".$flng);
	}
else{
	echo "<h1>There is an error. Please contact support</h1>";
	}
function has_fields(){
	if ( isset($_GET['flat']) AND  isset($_GET['flng']) AND isset($_GET['tlat']) AND isset($_GET['tlng']) ){
		return true;
		}
	return false;
	}
?>

<html> 
<head> 
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" /> 
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/> 
<title>Directions to the nearest TeleCash Agent</title> 
<style>

.notifs {
	color: #FF0000;
	padding: 8px 35px 8px 14px;
	margin-bottom: 20px;
	text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
	background-color: #fcf8e3;
	border: 1px solid #fbeed5;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	background-color: #FF9999;
	border-color: #FF3333;
		}	
.notifsholder {
	display: block;
	margin: 0px auto;
	width: 95%;
	padding:0;
	padding: 10px 0 10px 0px; font-family: Helvetica, Arial, sans serif
	}
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> 
<script type="text/javascript"> 
  var map;
  function initialize() {
    var latitude = <?php echo $flat; ?>; 
    var longitude = <?php echo $flng; ?>;
	var toLat = <?php echo $tlat; ?>; 
	var toLong = <?php echo $tlng; ?>;
        
    var fromLatlng = new google.maps.LatLng(latitude,longitude);
	var toLatlng = new google.maps.LatLng(toLat, toLong);
	var mapOptions = {
          center: toLatlng,
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    var ignoreMarker = false;
	<?php 
	if (!isset($_GET['ao'])){
	echo "calculateRoute(fromLatlng, toLatlng);";
	echo "ignoreMarker = true;";
	}
	
	?>
	if (ignoreMarker == false){
		var marker = new google.maps.Marker({
		  position: toLatlng,
		  map: map,
		  
		});
	}
  }
  
  function centerAt(latitude, longitude){
    myLatlng = new google.maps.LatLng(latitude,longitude);
    map.panTo(myLatlng);
    
  } 
  
  
  function calculateRoute(from, to) {
        //Maie dankie Mregi
        var myOptions = {  
		  center: to,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        
        var mapObject = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status)
          {
            if (status == google.maps.DirectionsStatus.OK)
            {
              new google.maps.DirectionsRenderer({
                map: mapObject,
                directions: response
              });
            }
            else
				{
				mapObject.setZoom(16);
				var marker = new google.maps.Marker({
					  position: to,
					  map: mapObject,
					  
					});
					
				<?php
				$aourl = "directions.php?ao&flat=".urlencode($flat)."&flng=".urlencode($flng)."&tlat=".urlencode($tlat)."&tlng=".urlencode($tlng);
				?>
				var el = document.getElementById("finderinfo");
				
				el.innerHTML = "<div class='notifsholder'><div class='notifs'>Maps couldn't find a clear route between the TeleCash Agent and yourself. Showing the Agent only</div></div>";
				}
				
          }
        );
      }
  
</script> 
</head> 
<body style="margin:0px; padding:0px;" onLoad="initialize()">
<div id='finderinfo'></div>
<div id="map_canvas" style="width:100%; height:100%">
	<div class='notifs'>Please wait while map loads. You'll need to have an internet connection for it to load successfully</div>
</div> 

</body> 
</html> 