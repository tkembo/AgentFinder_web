<!DOCTYPE html>
<html>
<head>
<title>Agent Finder</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&amp;sensor=false"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<style type="text/css">
h1.heading{padding:0px;margin: 0px 0px 10px 0px;text-align:center;font: 18px Georgia, "Times New Roman", Times, serif;}

/* width and height of google map */
#google_map {width: 90%; height: 500px;margin-top:0px;margin-left:auto;margin-right:auto;}

/* Marker Edit form */
.marker-edit label{display:block;margin-bottom: 5px;}
.marker-edit label span {width: 100px;float: left;}
.marker-edit label input, .marker-edit label select{height: 24px;}
.marker-edit label textarea{height: 60px;}
.marker-edit label input, .marker-edit label select, .marker-edit label textarea {width: 60%;margin:0px;padding-left: 5px;border: 1px solid #DDD;border-radius: 3px;}

/* Marker Info Window */
h1.marker-heading{color: #585858;margin: 0px;padding: 0px;font: 18px "Trebuchet MS", Arial;border-bottom: 1px dotted #D8D8D8;}
div.marker-info-win {max-width: 300px;margin-right: -20px;}
div.marker-info-win p{padding: 0px;margin: 10px 0px 10px 0;}
div.marker-inner-win{padding: 5px;}
button.save-marker, button.remove-marker{border: none;background: rgba(0, 0, 0, 0);color: #00F;padding: 0px;text-decoration: underline;margin-right: 10px;cursor: pointer;
}
</style>
</head>
<body>             
<h1 class="heading">Save Agent's location</h1>
<div align="center">Right Click to Drop a New Marker</div>
<div id="google_map"></div>
<script type="text/javascript">
 $(document).ready(function() {
 var map = new google.maps.Map(document.getElementById('google_map'), {
 zoom: 10,
 maxZoom: 18,
 center: new google.maps.LatLng(-17.82922, 31.053961),
 scaleControl: true, // enable scale control
 mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
 });
 var infowindow = new google.maps.InfoWindow();
 var marker, i=0;
 $.get("map_process.php", function (data) {
 $(data).find("marker").each(function () {
 var name = $(this).attr('name');
 var address 	= $(this).attr('address');
 var type 		= $(this).attr('type');
 var lat 	= $(this).attr('lat');
 var log = $(this).attr('lng');
 //create_marker(point, name, address, false, false, false, "http://agentfinder.co/icons/pin_blue.png");
 marker = new google.maps.Marker({
 position: new google.maps.LatLng(lat, log),
 map: map
 });
 google.maps.event.addListener(marker, 'click', (function(marker, i) {
 return function() {
 infowindow.setContent(address);
 infowindow.open(map, marker);
 }
 })(marker, i));
 });
 });
 });
 </script>
</body>
</html>