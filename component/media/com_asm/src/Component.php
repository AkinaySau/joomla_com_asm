<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 25.03.18
 * Time: 14:59
 */

namespace Sau\Joomla\ASM;


use Joomla\CMS\Component\ComponentHelper;

abstract class Component {


	const NAME    = 'com_asm';
	const MyName  = 'AkinaySau';
	const MyURL   = 'http://a-sau.ru';
	const MyLink  = '<a href="' . self::MyURL . '" target="_blank">' . self::MyName . '</a>';
	const HelpURL = 'http://a-sau.ru';

	final static function getParams() {
		return ComponentHelper::getParams( self::NAME );
	}
}