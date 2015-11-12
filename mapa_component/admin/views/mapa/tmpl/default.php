<?php 
// No direct access
defined('_JEXEC') or die; ?>

<style>
#entrada-alerta {
    margin-bottom: 10px;
}

#entradas {
    margin-bottom: 10px;
}

#alerta-form p {
    text-align: center;
}

#borrar-form p {
    text-align: center;
}

#alerta-form .error {
    color: red;
}

#entradas {
    width: 100%;
}

#entradas td {
    border: 1px solid #000;
    padding: 5px;
}

#entrada-alerta {
    width: 100%;
}

</style>

<div class="container">
    <div class="span6">
        
        <form id="alerta-form" action="<?php echo JRoute::_('index.php?option=com_mapa&task=saveData'); ?>" method="post">
            <table id="entrada-alerta">
                <tr>
                    <td><label for="area">Área:</label></td>
                    <td>
                        <select id="area" name="area">
                            <?php foreach ($this->areas as $area) { ?>
                                <option value="<?php echo $area->id; ?>"><?php echo $area->area ?></option>
                            <?php } ?>                    
                        </selec>
                    </td>
                </tr>
                <tr>
                    <td><label for="titulo">Título:</label></td>
                    <td><input id="titulo" type="text" name="titulo" /></td>
                </tr>
                <tr>
                    <td><label for="latitud">Latitud:</label></td>
                    <td><input id="latitud" type="text" name="latitud" /></td>
                </tr>
                <tr>
                    <td><label for="longitud">Longitud:</label></td>
                    <td><input id="longitud" type="text" name="longitud" /></td>
                </tr>
                <tr>
                    <td><label for="descripcion">Descripción:</label></td>
                    <td>
                        <textarea id="descripcion" cols="5" rows="10" name="descripcion" form="alerta-form"></textarea>
                    </td>
                </tr>
            </table>
            <p><input type="submit" value="Guardar" /></p>
        </form>
        
        <script src="/administrator/components/com_mapa/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="/administrator/components/com_mapa/js/additional-methods.min.js" type="text/javascript"></script>
    
        <script>
            
            (function($) {
		        $("#alerta-form").validate({
                
                    rules : {
                        area : "required",
                        titulo : "required",
                        latitud : {
                            required : true,
                            number : true,
                            min : -20,
                            max : 0
                            
                        },
                        
                        longitud : {
                            required : true,
                            number : true,
                            min : -85,
                            max : -65
                        },
                        
                        descripcion : "required"
                    },
                    
                    messages : {
                        area : "Por favor elige un área.",
                        titulo : "Por favor ingresa un título.",
                        latitud : "Por favor ingresa una latitud válida.",
                        longitud : "Por favor ingresa una longitud válida",
                        descripcion : "Por favor ingresa un descripción."
                    }
                    
                });
	        })(jQuery);
        
        </script>
    
    </div>
    <div class="span6">
        <form id="borrar-form" action="<?php echo JRoute::_('index.php?option=com_mapa&task=deleteData'); ?>" method="post">
            <table id="entradas">
                <tr>
                    <th></th>
                    <th>Área</th>
                    <th>Título</th>
                    <th>Fecha</th>
                </tr>
                
                <?php 
                if ($this->alertas) {
                    foreach ($this->alertas as $alerta) { ?>
                        <tr>
                            <td><input type="checkbox" name="check_list[]" value="<?php echo $alerta->id; ?>"/></td>
                            <td><?php echo $alerta->area_name; ?></td>
                            <td><?php echo $alerta->titulo; ?></td>
                            <td><?php echo $alerta->fecha; ?></td>
                        </tr>
                <?php }
                }?>
            </table>
            <p><input type="submit" value="Borrar" /></p>
            
            <script>
            
            </script>
        </form>
    </div>
<div>
