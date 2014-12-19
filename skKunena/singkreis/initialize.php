<?php
/**
* Kunena Component
* @package Kunena.Template.Blue_Eagle
*
* @copyright (C) 2008 - 2014 Kunena Team. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* @link http://www.kunena.org
**/
defined( '_JEXEC' ) or die();

$app = JFactory::getApplication();
$document = JFactory::getDocument();
$template = KunenaFactory::getTemplate();

// Template requires Mootools 1.2 framework
$template->loadMootools();

// We load mediaxboxadvanced library only if configuration setting allow it
if ( KunenaFactory::getConfig()->lightbox == 1 ) {
	$template->addStyleSheet ( 'css/mediaboxAdv.css');
	$template->addScript( 'js/mediaboxAdv.js' );
}

// New Kunena JS for default template
$template->addScript ( 'js/default.js' );






