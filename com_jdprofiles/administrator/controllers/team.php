<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Jdprofiles
 * @author     Team Joomdev <info@joomdev.com>
 * @copyright  Copyright (C) 2018 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Team controller class.
 *
 * @since  1.6
 */
class JdprofilesControllerTeam extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'teams';
		parent::__construct();
	}
}
