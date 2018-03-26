<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 26.03.18
 * Time: 19:12
 */

namespace Sau\Joomla\ASM\Helpers;


abstract class Attribute {
	public static function inString( $attr = [] ) {
		foreach ( $attr as $key => &$val ) {
			if ( !is_int( $key ) ) {
				$key = Str::clear( $key );
				$val = Str::clear( $val );
				$val = $key . '="' . $val . '"';
			}
		}
		$str = implode( ' ', $attr );

		return $str;
	}
}