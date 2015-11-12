<?php

defined('_JEXEC') or die('Restricted access');
 

class MapaViewMapa extends JViewLegacy
{
	
	function display($tpl = null)
	{
		$this->areas = $this->get("Areas");
		$this->alertas = $this->get("Alertas");
		parent::display($tpl);
	}
}
