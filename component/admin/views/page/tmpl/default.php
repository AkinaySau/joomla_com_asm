<?php
/**
 * Created by PhpStorm.
 * User: sau
 * Date: 22.03.18
 * Time: 16:14
 *
 *
 * @var ASMViewPage $this
 */


use Sau\Joomla\ASM\Admin\Helpers\AdminViewHelper;


?>
<?php AdminViewHelper::startForm( [
	'action' => AdminViewHelper::link( 'page', '', [ 'id' => $this->item->id ] )
] ) ?>
	<div class="span8">
		<?php echo $this->form->renderField( 'id' ) ?>
		<div class="">
			<?php echo $this->form->renderField( 'title' ) ?>
			<?php echo $this->form->renderField( 'alias' ) ?>
		</div class="">
		<?php echo $this->form->renderField( 'excerpt' ) ?>
		<?php echo $this->form->renderField( 'content' ) ?>
	</div>
	<div class="span4">
		<?php echo $this->form->renderFieldset( 'sidebar' ) ?>
		<?php echo $this->form->renderFieldset( 'base' ) ?>
		<?php
		echo '<pre>';
		print_r( $this->form->getFieldsets() );
		echo '</pre>';
		?>
	</div>
<?php AdminViewHelper::endForm( false ) ?>