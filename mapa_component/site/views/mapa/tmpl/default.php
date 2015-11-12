<?php 
// No direct access
defined('_JEXEC') or die; ?>

<style>
#map {
    width: 100%;
    height: 450px;
}

/*#home {background-color:#ddd; position:relative; height:160px; width:100%; margin-bottom:10px; text-align: left;}
.feature { height:160px; position:absolute; right: 0px; left: 0px; overflow:hidden; }
.feature img { border:none; }
#tabs { margin-left:0;margin-bottom:0;text-align: left;}
#tabs li {background-color:transparent;display:inline;float:none;list-style:none;margin: 0px; }
#tabs li a {background-color:#edd; color:#333; display:inline; height:auto;padding:5px 20px;text-decoration:none;width:auto;}
#tabs li a.active { background-color:#ddd;color:#000; }*/

</style>

<div class="row-fluid">
    <div class="span6">

        <div id="map"></div>

    </div>
    <div class="span6">
        
        <ul id="tabs" class="nav nav-tabs" data-behavior="BS.Tabs"> 
            <?php foreach ($this->areas as $area) { ?>
                <li><a href="#<?php echo $area->area; ?>"><?php echo $area->area; ?></a></li> 
            <?php } ?>
        </ul> 
        <div id="content"> 
            <?php foreach ($this->areas as $area) { ?>
                <div id="<?php echo $area->area; ?>">
                    <?php echo $area->area; ?>
                </div>
            <?php } ?>
            
        </div>


    </div>
</div>


<script type="text/javascript">

var map;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -10, lng: -76},
        zoom: 5
        });

    var myLatLng = {lat: -10, lng: -76};

    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Hello World!'
    });

    var contentString = "<h3>Este es el título de la alerta</h3>"+
        "<p>Esta es la descripción de la alerta.</p>"

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    marker.addListener('click', function() {
        infowindow.open(map, marker);
    });

}

window.addEvent('domready', function(){
    //var tabs = new MGFX.Tabs('#tabs li a', '#home .feature');
});



</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGptWzvTyBnAeCuOVDkBPTZO1lpSsme1I&callback=initMap">
</script>

<!-- <script src="/modules/mod_mapa/js/rotater.js"></script> -->
<!-- <script src="/modules/mod_mapa/js/tabs.js"></script> -->

