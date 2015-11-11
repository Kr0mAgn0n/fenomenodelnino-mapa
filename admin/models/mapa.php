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
class MapaModelMapa extends JModelItem
{
     function getAreas () {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select("id,area");
        $query->from("areas");
        $db->setQuery((string) $query);
        $areas = $db->loadObjectList();
 
		return $areas;
    }
    
    function getAlertas() {
        $db = JFactory::getDBO();
        $query = $db->getQuery(true);
        $query->select("id,area_id,titulo,fecha");
        $query->from("mapa");
        $db->setQuery((string) $query);
        $alertas = $db->loadObjectList();
        
        $aux = array();
        
        if ($alertas) {
            foreach ($alertas as $alerta) {
                $id = $alerta->id;
                $area_id = $alerta->area_id;
                $titulo = $alerta->titulo;
                $fecha = $alerta->fecha;
                $area_name = $this->AreaById($area_id);
                
                $aux[] = (object) array('id' => $id, 'area_name' => $area_name, 'titulo' => $titulo, 'fecha' => $fecha);
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
