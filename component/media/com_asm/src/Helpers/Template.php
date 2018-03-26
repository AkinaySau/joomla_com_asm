<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 26.03.18
 * Time: 23:50
 */

namespace Sau\Joomla\ASM\Helpers;


use Joomla\CMS\Factory;

abstract class Template {
	/**
	 * Current template client
	 *
	 * @var string
	 * @since 1.0
	 */
	static protected $template;

	/**
	 * @param bool $clear
	 * @param bool $admin
	 *
	 * @return string
	 * @since 1.0
	 */
	static public function getTemplate( $clear = false, $admin = false ): string {
		if ( self::$template and $clear === false ) {
			return self::$template;
		} else {
			$db    = Factory::getDbo();
			$query = $db->getQuery( true )
			            ->select( 'template' )
			            ->from( '#__template_styles' )
			            ->where( '`home` = 1' );
			if ( $admin ) {
				$query->where( 'client_id = 1' );
			} else {
				$query->where( 'client_id = 0' );
			}

			return $db->setQuery( $query )
			          ->loadResult();
		}
	}
}