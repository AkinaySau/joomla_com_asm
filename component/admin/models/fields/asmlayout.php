<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 26.03.18
 * Time: 7:48
 *
 * @package     Joomla.Administrator
 * @subpackage  com_asm
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.form.formfield' );

use Joomla\CMS\Language\Text;
use Sau\Joomla\ASM\Component;
use Sau\Joomla\ASM\Exceptions\ExceptionHelper;
use Sau\Joomla\ASM\Exceptions\FieldSauException;
use Sau\Joomla\ASM\Fields\AbsFormField;
use Sau\Joomla\ASM\Fields\ClassFieldForm;
use Sau\Joomla\ASM\Helpers\Attribute;
use Sau\Joomla\ASM\Helpers\Template;

/**
 * Class FormFieldASMLayout
 * @since 1.0
 */
class JFormFieldASMLayout extends AbsFormField {

	protected $type = 'ASMLayout';
	/**
	 * View for build list layouts
	 * @var string
	 * @since 1.0
	 */
	protected $view;

	protected function getInput() {
		try {
			if ( empty( trim( $this->view = $this->getAttribute( 'view' ) ) ) ) {
				throw new FieldSauException( 'View type is empty (Field: ' . $this->name . ')' );
			}

			$attr = Attribute::inString( [
				'class' => ClassFieldForm::INPUTBOX,
			] );

			return JHtmlSelect::genericlist( $this->getOptions(), $this->name, $attr, 'value', 'text', $this->value );

		} catch ( Exception $fieldSauException ) {
			ExceptionHelper::renderException( $fieldSauException );

			return '';
		}
	}


	/**
	 * @return array
	 * @throws Exception
	 * @since 1.0
	 */
	protected function getOptions() {

		$pathCom      = JPATH_SITE . '/components/' . Component::NAME . '/views/page/tmpl';
		$pathTemplate =
			JPATH_SITE . '/' . 'templates' . '/' . Template::getTemplate() . '/html/' . Component::NAME . '/' . $this->view;

		#TODO: no requires rules
		{
			#step 0 default
			$text                 = Text::_( 'COM_ASM_FORM_FIELD_DEFAULT' );
			$value                = $pathCom . '/Default';
			$options[ 'Default' ] = JHtmlSelect::option( $value, $text );

			#step 1 xml options
			if ( count( $list = $this->getXPath() ) ) {
				foreach ( $list as &$option ) {
					$value = (string) $option[ 'value' ];
					$text  = 'O| ' . Text::_( trim( (string) $option ) != '' ? trim( (string) $option ) : $value );

					$option = JHtmlSelect::option( $value, $text );
				}

				if ( count( $list ) ) {
					$options = array_merge( $options, $list );
				}
			}
		}

		#step 2 component layout
		$list = $this->collectLayout( $pathCom );
		if ( count( $list ) ) {
			$options = array_merge( $options, $list );
		}
		#step 3 template layout
		$list = $this->collectLayout( $pathTemplate );
		if ( count( $list ) ) {
			$options = array_merge( $options, $list );
		}

		return $options;
	}

	protected function collectLayout( string $path ) {
		if ( file_exists( $path ) ) {
			$list    = scandir( $path );
			$options = [];
			foreach ( $list as $folder ) {
				if ( $folder == '.' || $folder == '..' ) {
					continue;
				}
				$findex = $path . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . 'index.php';
				$exist  = file_exists( $findex );
				if ( ! $exist ) {
					continue;
				}
				$value              = $path . DIRECTORY_SEPARATOR . $folder;
				$text               = $folder;
				$options[ $folder ] = JHtmlSelect::option( $value, $text );
			}

			return $options;
		}

		return [];
	}
}
