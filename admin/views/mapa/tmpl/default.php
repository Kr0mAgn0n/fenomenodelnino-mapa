<?php 
// No direct access
defined('_JEXEC') or die; ?>

<div class="row-fluid">
    <div class="span6">
        
        <form id="alerta-form" action="<?php echo JRoute::_('index.php?option=com_mapa&task=saveData'); ?>" method="post">
            <table>
                <tr>
                    <td>Área:</td>
                    <td>
                        <select name="area">
                            <?php foreach ($this->areas as $area) { ?>
                                <option value="<?php echo $area->id; ?>"><?php echo $area->area ?></option>
                            <?php } ?>                    
                        </selec>
                    </td>
                </tr>
                <tr>
                    <td>Título:</td>
                    <td><input type="text" name="titulo" /></td>
                </tr>
                <tr>
                    <td>Latitud:</td>
                    <td><input type="text" name="latitud" /></td>
                </tr>
                <tr>
                    <td>Longitud:</td>
                    <td><input type="text" name="longitud" /></td>
                </tr>
                <tr>
                    <td>Descripción:</td>
                    <td>
                        <textarea cols="5" rows="10" name="descripcion" form="alerta-form"></textarea>
                    </td>
                </tr>
            </table>
            <input type="submit" />
        </form>
    
    </div>
    <div class="span6">
    
        <table>
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
                        <td><input type=checkbox name="<?php echo $alerta->area; ?>"/></td>
                        <td><?php echo $alerta->area; ?></td>
                        <td><?php echo $alerta->titulo; ?></td>
                        <td><?php echo $alerta->fecha; ?></td>
                    </tr>
            <?php }
            }?>
        </table>
    </div>
<div>
