<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 27.03.18
 * Time: 7:26
 */

use Joomla\CMS\MVC\Model\ItemModel;
use Joomla\CMS\Table\Table;


/**
 * Class ASMViewPage
 * @since 1.0
 */
class ASMModelPage extends ItemModel {


	public function getTable( $type = 'Page', $prefix = 'Table', $config = array() ) {
		return Table::getInstance( $type, $prefix, $config );
	}
}