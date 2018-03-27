<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 21.03.18
 * Time: 11:08
 *
 * @package     Joomla.Administrator
 * @subpackage  com_asm
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;
use Sau\Joomla\ASM\Exceptions\ExceptionHelper;

try {
	include_once JPATH_SITE . '/media/com_asm/vendor/autoload.php';
	$input = Factory::getApplication()->input;

	$controller = BaseController::getInstance( 'ASM' );
	$controller->execute( $input->getCmd( 'task', 'display' ) );
	$controller->redirect();
} catch ( Exception $e ) {
	ExceptionHelper::renderException( $e );
}