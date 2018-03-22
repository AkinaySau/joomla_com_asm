<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_asm
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

use Joomla\CMS\MVC\Model\ListModel;

class ASMModelPages extends ListModel {

	protected function getListQuery () {
		$db    = $this->_db;
		$query = $db->getQuery(true);
		$query->select($db->quoteName([ 'id', 'title', 'created', 'modified' ]))
			->from('#__asm_pages');

		return $query;
	}
}