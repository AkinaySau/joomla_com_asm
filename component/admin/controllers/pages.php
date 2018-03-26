<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 21.03.18
 * Time: 14:41
 */

use \Joomla\CMS\MVC\Controller\AdminController;

class ASMControllerPages extends AdminController {

	public function getModel ( $name = 'Page', $prefix = 'ASMModel', $config = array() ) {
		return parent::getModel($name, $prefix, $config);
	}

}