<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 22.03.18
 * Time: 12:17
 */

use Joomla\CMS\MVC\Model\FormModel;
use Joomla\CMS\Table\Table;

class ASMModelPage extends FormModel {

	/**
	 * Abstract method for getting the form from the model.
	 *
	 * @param   array   $data     Data for the form.
	 * @param   boolean $loadData True if the form is to load its own data (default case), false if not.
	 *
	 * @return  \JForm|boolean  A \JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm ( $data = array(), $loadData = true ) {
		$form = $this->loadForm('com_asm.banner', 'banner', array( 'control' => 'jform', 'load_data' => $loadData ));

		return $form;
	}

	/**
	 * @param string $name
	 * @param string $prefix
	 * @param array  $options
	 *
	 * @return JTable
	 * @throws Exception
	 * @since 1.0
	 */
	public function getTable ( $name = 'Pages', $prefix = 'Table', $options = array() ) {
		return parent::getTable($name, $prefix, $options);
	}
}