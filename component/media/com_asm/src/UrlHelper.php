<?php
/**
 * @package     Sau\Joomla\ASM
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Sau\Joomla\ASM;


abstract class UrlHelper {
	/**
	 * Build query
	 *
	 * @param array $params
	 *
	 * @return string
	 * @since 1.0
	 */
	public static function buildLink ( array $params ): string {
		return 'index.php?' . http_build_query($params);
	}

	/**
	 * Вывод строки запроса
	 *
	 * @param array $params Массив параметров для запроса
	 *
	 * @since 1.0
	 */
	public static function _buildLink ( array $params ) {
		echo self::buildLink($params);
	}
}