<?php
/**
 * @package     Sau\Joomla\ASM
 * @subpackage  com_asm
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Sau\Joomla\ASM;


use JHtmlSidebar;
use Joomla\CMS\Language\Text;

abstract class SAdminViewHelper {
	static protected $params = [
		'option' => 'com_asm',
		'view'   => '',
		'layout' => '',
		'Itemid' => '',
		'lang'   => '',
	];

	/**
	 * @param string $active ID element
	 *
	 * @return string
	 *
	 * @since version
	 */
	public static function sidebar ( $active ) {

		$list   = [
			[
				'label' => Text::_('COM_ASM_PAGES'),
				'view'  => 'pages'
			],
		];
		$params = array_diff(self::$params, array( '' ));
		foreach ( $list as $i ) {
			$params[ 'view' ] = $i[ 'view' ];
			JHtmlSidebar::addEntry(Text::_('COM_ASM_PAGES'), UrlHelper::buildLink($params), $i[ 'view' ] == $active);
		}

		return JHtmlSidebar::render();
	}
}