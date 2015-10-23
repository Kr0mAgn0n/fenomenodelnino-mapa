<?php

defined('_JEXEC') or die('Restricted access');

class MapaController extends JControllerLegacy
{

   function saveData () {
        
        
        //JSession::checkToken('request') or jexit( JText::_( 'JINVALID_TOKEN' ) );
        
        $app = JFactory::getApplication();
        $jinput = $app->input;
        
        $area = $jinput->get('area', '', 'STRING');
        $titulo = $jinput->get('titulo', '', 'STRING');
        $latitud = $jinput->get('latitud', '', 'FLOAT');
        $longitud = $jinput->get('longitud', '', 'FLOAT');
        $descripcion = $jinput->get('descripcion', '', 'STRING');
        
        if ($area && $titulo && $latitud && $longitud && $descripcion) {
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            $columns = array("area_id", "titulo", "latitud", "longitud", "descripcion", "fecha");
            
            $query->insert("mapa")
                ->columns($columns)
                ->values("1, '$titulo', $latitud, $longitud, '$descripcion', NOW()");
                
            $db->setQuery($query);
            $db->execute();
            
        }  
        
        $app->redirect(JURI::base().'index.php?option=com_mapa');
    }
}
