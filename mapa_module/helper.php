<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class ModMapaHelper
{
	function getAreas () {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select("area");
        $query->from("areas");
        $db->setQuery((string) $query);
        $areas = $db->loadObjectList();
 
		return $areas;
    }
	
	function getAlertas() {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select("area_id,titulo,latitud,longitud,descripcion");
        $query->from("mapa");
        $db->setQuery((string) $query,0 ,14);
        $alertas = $db->loadObjectList();
        
        $aux = array();
        
        if ($alertas) {
            foreach ($alertas as $alerta) {
                $area_id = $alerta->area_id;
                $titulo = $alerta->titulo;
                $latitud = $alerta->latitud;
                $longitud = $alerta->longitud;
                $descripcion = $alerta->descripcion;
                $area_name = ModMapaHelper::AreaById($area_id);
                
                $aux[] = (object) array('area_name' => $area_name, 'titulo' => $titulo, 'latitud' => $latitud, 'longitud' => $longitud,'descripcion' => $descripcion);
            }
        } 
        
        return $aux;
    }
    
    function AreaById ($area_id) {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select("area");
        $query->from("areas");
        $query->where("id = $area_id");
        $db->setQuery($query);
        $area = $db->loadObjectList();
        
        $aux = array();
        
        if ($area) {
            foreach ($area as $a) {
                $name = $a->area;
                
                $aux[] = $name;
            }
        }
        
        return $aux[0];
    } 
}
