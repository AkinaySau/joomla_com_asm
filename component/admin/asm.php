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
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\BaseController;
use Sau\Joomla\ASM\Helper;

defined('_JEXEC') or die('Restricted access');

include_once JPATH_SITE . '/media/com_asm/vendor/autoload.php';

try {
	if ( !Factory::getUser()
		->authorise('core.manage', 'com_com') ) {
		throw new InvalidArgumentException(Text::_('JERROR_ALERTNOAUTHOR'), 404);
	}

	$input = Factory::getApplication()->input;

	/**
	 * @var $controller BaseController;
	 */
	$controller = BaseController::getInstance('ASM');

	$controller->execute($input->getCmd('task', 'display'));

	$controller->redirect();
} catch ( Exception $e ) {
	Helper::renderException($e);
}