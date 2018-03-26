<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_asm
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

use Joomla\CMS\Language\Text;
use Joomla\CMS\Pagination\Pagination;
use Sau\Joomla\ASM\Admin\AdminHtmlView;
use Sau\Joomla\ASM\Exceptions\ExceptionHelper;

class ASMViewPages extends AdminHtmlView {
	/**
	 * @var array
	 *
	 * @since 1.0
	 */
	protected $items;

	/**
	 * @var Pagination
	 *
	 * @since 1.0
	 */
	protected $pagination;

	/**
	 * @param null $tpl
	 *
	 * @return mixed|void
	 * @since 1.0
	 */
	public function display( $tpl = null ) {
		try {
			$this->items      = $this->get( 'Items' );
			$this->pagination = $this->get( 'Pagination' );

			parent::display( $tpl );
		} catch ( Exception $e ) {
			ExceptionHelper::renderException( $e );
		}
	}

	/**
	 * Displays a toolbar for a specific page.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	protected function toolbar() {
		JToolBarHelper::addNew( 'page.add' );
		JToolBarHelper::editList( 'page.edit' );
		JToolbarHelper::save2copy();
		JToolBarHelper::divider();
		JToolBarHelper::deleteList( '', 'pages.delete' );
	}

	/**
	 * Set title
	 *
	 * @return string
	 *
	 * @since version
	 */
	protected function setTitle(): string {
		return Text::_( 'COM_ASM_PAGES' );
	}
}