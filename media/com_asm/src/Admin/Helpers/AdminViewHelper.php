<?php
/**
 * @package     Sau\Joomla\ASM
 * @subpackage  com_asm
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Sau\Joomla\ASM\Admin\Helpers;


use JHtmlForm;
use JHtmlSidebar;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Sau\Joomla\ASM\Component;
use Sau\Joomla\ASM\UrlHelper;

abstract class AdminViewHelper {
	static protected $params = [
		'option' => 'com_asm',
		'view'   => '',
		'layout' => '',
		'Itemid' => '',
		'lang'   => '',
	];

	public static function link( $view = 'pages', $layout = '', $params = [] ) {
		return UrlHelper::buildLink( array_merge( [
			'option' => Component::NAME,
			'view'   => $view,
			'layout' => $layout,
		], $params ) );
	}


	/**
	 * @param string $active ID element
	 *
	 * @return string
	 *
	 * @since version
	 */
	public static function sidebar( $active ) {

		$list   = [
			[
				'label' => Text::_( 'COM_ASM_PAGES' ),
				'view'  => 'pages'
			],
		];
		$params = array_diff( self::$params, array( '' ) );
		foreach ( $list as $i ) {
			$params[ 'view' ] = $i[ 'view' ];
			JHtmlSidebar::addEntry( Text::_( 'COM_ASM_PAGES' ), UrlHelper::buildLink( $params ), $i[ 'view' ] == $active );
		}

		return JHtmlSidebar::render();
	}

	/**
	 * Рендер начала формы
	 *
	 * @param array $params Параметры формы
	 *
	 * @since 1.0
	 *
	 */
	public static function startForm( $params = [] ) {

		$params = array_merge( [
			'action' => Route::_( UrlHelper::buildLink( [ 'option' => 'com_asm' ] ) ),
			'method' => 'post',
			'name'   => 'adminForm',
			'id'     => 'adminForm',
			'class'  => 'form-validate'
		], $params );
		$line   = '';
		foreach ( $params as $name => $param ) {
			$line .= ' ' . $name . '="' . $param . '"';
		}

		echo "<form{$line}>";
	}

	/**
	 * Конец формы
	 * @since 1.0
	 */
	public static function endForm( $list = true ) {
		echo '<input type="hidden" name="task" value="" />';
		if ( $list ) {
			echo '<input type="hidden" name="boxchecked" value="0" />';
		}
		echo JHtmlForm::token();
		echo '</form>';
	}
}