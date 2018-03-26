<?php
/**
 * @package     ${NAMESPACE}
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Sau\Joomla\ASM\Exceptions;

use Exception;

abstract class ExceptionHelper {
	public static function renderException ( Exception $e, $trace = false ) {
		echo '<pre>';
		echo '<strong>Message:</strong> ', $e->getMessage(), PHP_EOL;
		echo '<strong>Line:</strong> ', $e->getLine(), PHP_EOL;
		echo '<strong>File:</strong> ', $e->getFile(), PHP_EOL;
		if ( $trace ) {
			echo '<strong>Trace:</strong> ', PHP_EOL;
			print_r($e->getTrace());
		}
		echo '</pre>';
	}
}