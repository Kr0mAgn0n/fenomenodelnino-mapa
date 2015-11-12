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

.alertas {
    width: 100%;
}

.alertas td {
    border: 1px solid #000;
}

#tabs {
    height: 240px;
}

#tabs .contenido {
    height: 170px;
    overflow-y: auto;
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
                <div id="<?php echo $area->area; ?>" class="contenido">
                    
                    <table class="alertas">
                        <tr>
                            <th>Título</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            
                        </tr>
                        
                        <?php foreach ($alertas as $alerta) { ?>
                            <?php if ($alerta->area_name == $area->area) { ?>
                                <tr>
                                    <td><?php echo $alerta->titulo; ?></td>
                                    <td><?php echo $alerta->latitud; ?></td>
                                    <td><?php echo $alerta->longitud; ?></td>                                    
                                </tr>
                            <?php } ?>
                            
                        <?php } ?>
                    
                    </table>
                    
                </div>
            <?php } ?>
            
        </div>
        
        <div id="leyenda">
        
        <h3>Leyenda</h3>
        
        <p><img src="/modules/mod_mapa/images/pin_azul.png" /> Alerta Oceanográfica</p>
        <p><img src="/modules/mod_mapa/images/pin_amarillo.png" /> Alerta Hidrológica</p>
        <p><img src="/modules/mod_mapa/images/pin_rojo.png" /> Alerta Sanitaria</p>
        
        </div>


    </div>
</div>

<script type="text/javascript" src="/modules/mod_mapa/js/jquery-ui.min.js"></script>

<script type="text/javascript">

var map;

var alertas = [];

<?php foreach ($alertas as $alerta) { ?>
    alertas.push({area: "<?php echo $alerta->area_name; ?>", titulo: "<?php echo $alerta->titulo; ?>", latitud: <?php echo $alerta->latitud; ?>, longitud: <?php echo $alerta->longitud; ?>, descripcion: "<?php echo $alerta->descripcion ?>"});
<?php } ?> 

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -10, lng: -76},
        zoom: 5
        });

    var markers = [];
    var infowindows = [];
    
    jQuery.each(alertas, function(index, alerta) {
        var myLatLng = {lat: alerta.latitud, lng: alerta.longitud}
        
        if (alerta.area == "Oceanografía")
            var image = "/modules/mod_mapa/images/pin_azul.png"
        
        if (alerta.area == "Hidrología")
            var image = "/modules/mod_mapa/images/pin_amarillo.png"
            
        if (alerta.area == "Sanitaria")
            var image = "/modules/mod_mapa/images/pin_rojo.png"
        
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: alerta.titulo,
            icon: image
        });
        markers.push(marker);
        
        var infowindow = new google.maps.InfoWindow({
            content: "<h3>" + alerta.titulo + "</h3>" + "<p>" + alerta.descripcion + "</p>"
        });
        infowindows.push(infowindow);
        
    });

    jQuery.each(markers, function(index, marker) {
        marker.addListener('click', function() {
            
            closeInfoWindows(infowindows);
            
            infowindows[index].open(map, marker);
        });    
    });

}

function closeInfoWindows (infowindows) {

    jQuery.each(infowindows, function(index, infowindow) {
        infowindow.close();
    });

}

window.addEvent('domready', function(){
    var tab = jQuery("#tabs").tabs();
});



</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGptWzvTyBnAeCuOVDkBPTZO1lpSsme1I&callback=initMap">
</script>
