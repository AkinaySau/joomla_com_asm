<?php
/**
 * @package    com
 *
 * @author     sau <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

/**
 * Pages table.
 *
 * @since       1.0
 */
class TablePage extends Table {
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver $db Database driver object.
	 *
	 * @since   1.0
	 */
	public function __construct ( JDatabaseDriver $db ) {
		parent::__construct('#__asm_pages', 'id', $db);
	}
}