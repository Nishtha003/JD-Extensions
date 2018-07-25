<?php

/**
 * Hello World! Module Entry Point
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @license    GNU/GPL, see LICENSE.php
 * @link       http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
// No direct access
defined('_JEXEC') or die;
// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$layout = $params->get('layout', 'default');
$document = JFactory::getDocument();
if ($params->get('load_bootstrap', 0)) {
   $document->addStyleSheet("https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css");
}
$document->addStyleSheet(JURI::root() . 'modules/mod_jdbeforeafter/assets/css/jdbeforeafter.css');
$document->addScript(JURI::root() . 'modules/mod_jdbeforeafter/assets/twentytwenty/js/jquery.event.move.js');
$document->addScript(JURI::root() . 'modules/mod_jdbeforeafter/assets/twentytwenty/js/jquery.twentytwenty.js');
$document->addStyleSheet(JURI::root() . 'modules/mod_jdbeforeafter/assets/twentytwenty/css/twentytwenty.css');
require JModuleHelper::getLayoutPath('mod_jdbeforeafter', $layout);
