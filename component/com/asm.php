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

try {
	include_once JPATH_SITE . '/media/com_asm/vendor/autoload.php';

} catch ( Exception $e ) {
	\Sau\Joomla\ASM\Helper::renderException($e);
}