<?php 
// No direct access
defined('_JEXEC') or die; ?>

<link rel="stylesheet" type="text/css" href="/modules/mod_mapa/css/jquery-ui.theme.min.css">
<link rel="stylesheet" type="text/css" href="/modules/mod_mapa/css/jquery-ui.structure.min.css">

<style>
#map {
    width: 100%;
    height: 450px;
}
</style>

<div class="row-fluid">
    <div class="span6">

        <div id="map"></div>

    </div>
    <div class="span6">
    
       <div id="tabs"> 
            <ul> 
                <?php foreach ($areas as $area) { ?>
                    <li><a href="#<?php echo $area->area; ?>"><?php echo $area->area; ?></a></li> 
                <?php } ?>
            </ul> 
            
            <?php foreach ($areas as $area) { ?>
                <div id="<?php echo $area->area; ?>">
                    
                    <table>
                        <tr>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Título</th>
                        </tr>
                        
                        <?php foreach ($alertas as $alerta) { ?>
                            <?php if ($alerta->area_name == $area->area) { ?>
                                <tr>
                                    <td><?php echo $alerta->latitud; ?></td>
                                    <td><?php echo $alerta->longitud; ?></td>
                                    <td><?php echo $alerta->titulo; ?></td>
                                </tr>
                            <?php } ?>
                            
                        <?php } ?>
                    
                    </table>
                    
                </div>
            <?php } ?>
            
        </div>


    </div>
</div>

<script type="text/javascript" src="/modules/mod_mapa/js/jquery-ui.min.js"></script>

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
    var tab = jQuery("#tabs").tabs();
});



</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGptWzvTyBnAeCuOVDkBPTZO1lpSsme1I&callback=initMap">
</script>

<!-- <script src="/modules/mod_mapa/js/rotater.js"></script> -->
<!-- <script src="/modules/mod_mapa/js/tabs.js"></script> -->

