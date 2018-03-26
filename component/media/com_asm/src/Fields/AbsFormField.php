<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 26.03.18
 * Time: 12:10
 */

namespace Sau\Joomla\ASM\Fields;


use Joomla\CMS\Form\FormField;

/**
 * Class AbsFormField
 * @package Sau\Joomla\ASM\Fields
 * TODO JForm...->Form...
 */
abstract class AbsFormField extends FormField {


	/**
	 * Return Enter elements
	 *
	 * @param string $name Name element
	 *
	 * @return \SimpleXMLElement[]
	 * @since 1.0
	 */
	protected function getXPath ( $name = 'option' ) {
		return $this->element->xpath($name);
	}
}