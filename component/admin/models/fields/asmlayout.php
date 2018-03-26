<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 26.03.18
 * Time: 7:48
 */

defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

use Joomla\CMS\Factory;
use Sau\Joomla\ASM\Component;
use Sau\Joomla\ASM\Exceptions\ExceptionHelper;
use Sau\Joomla\ASM\Exceptions\FieldSauException;
use Sau\Joomla\ASM\Fields\AbsFormField;

/**
 * Class FormFieldASMLayout
 */
class JFormFieldASMLayout extends AbsFormField {

	protected $type = 'ASMLayout';
	/**
	 * View for build list layouts
	 * @var string
	 * @since 1.0
	 */
	protected $view;

	protected function getInput () {
		try {
			if ( empty(trim($this->view = $this->getAttribute('view'))) ) {
				throw new FieldSauException('View type is empty (Field: ' . $this->name . ')');
			}

			echo JHtmlSelect::genericlist($this->getOptions(), $this->name);

		} catch ( Exception $fieldSauException ) {
			ExceptionHelper::renderException($fieldSauException);
		}

	}

	/**
	 * @return array
	 */
	protected function getOptions () {

		$pathCom      = JPATH_BASE . '/components/' . Component::NAME . '/views/page/tmpl';
//		$pathTemplate = JPATH_THEMES . DS . Factory::getApplication()
//				->getTemplate() . '/html/''/page/tmpl';
		$options      = $this->getXPath();
		foreach ( $options as &$option ) {
			$value = (string) $option[ 'value' ];
			$text  = trim((string) $option) != '' ? trim((string) $option) : $value;

			$option = JHtmlSelect::option($value, $text);
		}
		$layouts = scandir(JPATH_BASE . '/components/com_asm/views/' . $this->view . '');

		return $options;
	}
}
