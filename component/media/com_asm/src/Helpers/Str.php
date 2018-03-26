<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 26.03.18
 * Time: 19:16
 */

namespace Sau\Joomla\ASM\Helpers;


abstract class Str {
	/**
	 * Clear string using regular string '%[^A-Za-zА-Яа-я0-9]%'
	 *
	 * @param string $str
	 *
	 * @return null|string|string[]
	 * @since 1.0
	 */
	public static function clear( string $str ) {
		$str = preg_replace( '%[^A-Za-zА-Яа-я0-9-_ ]%', '', $str );

		return $str;
	}
}