<?php
/**
 * @package     Sau\Joomla\ASM\Abs
 * @subpackage
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

namespace Sau\Joomla\ASM\Admin;

use JHtmlBehavior;
use JHtmlFormbehavior;
use Joomla\CMS\Factory;
use Joomla\CMS\MVC\View\HtmlView;
use JToolbarHelper;
use Sau\Joomla\ASM\Admin\Helpers\AdminViewHelper;
use Sau\Joomla\ASM\Component;

abstract class AdminHtmlView extends HtmlView {
	/**
	 * @var string
	 * @since version
	 */
	protected $title;
	/**
	 * The sidebar to show
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $sidebar = '';

	/**
	 * Execute and display a template script.
	 *
	 * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a JError object.
	 *
	 * @see     fetch()
	 * @since   1.0
	 */
	public function display( $tpl = null ) {
		$this->beafo();

		$this->title   = $this->setTitle();
		$this->sidebar = AdminViewHelper::sidebar( 'pages' );
		$this->toolbar();
		$this->baseToolbar();

		return parent::display( $tpl );
	}

	/**
	 * Displays a toolbar for a specific page.
	 *
	 * @return  void.
	 *
	 * @since   1.0
	 */
	abstract protected function toolbar();

	/**
	 * Base tool items
	 *
	 * @since 1.0
	 */
	final private function baseToolbar() {
		JToolbarHelper::title( $this->title );
		if ( Factory::getUser()
		            ->authorise( 'core.admin', 'com_asm' ) ) {
			JToolBarHelper::preferences( 'com_asm' );
		}
		JToolbarHelper::help( Component::NAME . '_help', false, Component::HelpURL );
	}

	/**
	 * Set title
	 *
	 * @return string
	 *
	 * @since version
	 */
	abstract protected function setTitle(): string;

	private function beafo() {
		JHtmlBehavior::tooltip();
		JHtmlBehavior::multiselect();
		JHtmlFormbehavior::chosen( 'select' );
	}
}