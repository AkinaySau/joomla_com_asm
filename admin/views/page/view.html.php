<?php

use Joomla\CMS\Form\Form;
use Joomla\CMS\Language\Text;
use Sau\Joomla\ASM\Admin\AdminHtmlView;

/**
 * Created by PhpStorm.
 * User: sau
 * Date: 22.03.18
 * Time: 12:49
 * @since 1.0
 */
class ASMViewPage extends AdminHtmlView {

	/**
	 * Запись
	 * @var object
	 * @since 1.0
	 */
	protected $item;

	/**
	 * Форма
	 * @var Form
	 * @since 1.0
	 */
	protected $form;

	public function display( $tpl = null ) {
		$this->item = $this->get( 'Item' );
		$this->form = $this->get( 'Form' );

		return parent::display( $tpl );
	}

	/**
	 * Displays a toolbar for a specific page.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	protected function toolbar() {
		JToolbarHelper::apply( 'page.apply' );
		JToolbarHelper::save( 'page.save' );
		JToolbarHelper::save2new( 'page.save2new' );
		JToolbarHelper::cancel( 'page.cancel' );
	}

	/**
	 * Set title
	 *
	 * @return string
	 *
	 * @since version
	 */
	protected function setTitle(): string {
		return Text::_( 'COM_ASM_PAGE' );
	}
}