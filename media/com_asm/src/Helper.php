<?php
/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Sau\Joomla\ASM;

use Exception;

class Helper {
	public static function renderException ( Exception $e ) {
		echo '<pre>';
		echo '<strong>Message:</strong> ', $e->getMessage(), PHP_EOL;
		echo '<strong>Line:</strong> ', $e->getLine(), PHP_EOL;
		echo '<strong>File:</strong> ', $e->getFile(), PHP_EOL;
		echo '<strong>Trace:</strong> ', PHP_EOL;
		print_r($e->getTrace());
		echo '</pre>';
	}
}