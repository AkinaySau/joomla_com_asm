<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 21.03.18
 * Time: 11:23
 *
 * @package     Joomla.Administrator
 * @subpackage  com_asm
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\AdminController;

defined('_JEXEC') or die('Restricted access');
try {
	$input =
	$controller = AdminController::getInstance('ASM');

	// Perform the Request task
	$controller->execute(Factory::getApplication()->input->get('task'));

	// Redirect if set by the controller
	$controller->redirect();
} catch ( Exception $e ) {

	echo '<pre>';
	echo '<strong>Message:</strong> ', $e->getMessage(), PHP_EOL;
	echo '<strong>Line:</strong> ', $e->getLine(), PHP_EOL;
	echo '<strong>File:</strong> ', $e->getFile(), PHP_EOL;
	echo '<strong>File:</strong> ', PHP_EOL, implode(PHP_EOL, $e->getTrace()), PHP_EOL;
	echo '</pre>';

}