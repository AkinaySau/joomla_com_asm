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
use Sau\Joomla\ASM\Exceptions\ExceptionHelper;

try {
	?>
	<?php AdminViewHelper::startForm( [
		'action' => AdminViewHelper::link( 'page', '', [ 'id' => $this->item->id ] )
	] ) ?>
	<!--	<div class="span8" id="j-main-container">-->
	<div class="span8">
		<?php echo $this->form->renderField( 'id' ) ?>
		<div class="">
			<?php echo $this->form->renderField( 'title' ) ?>
			<?php echo $this->form->renderField( 'alias' ) ?>
		</div class="">
		<?php echo $this->form->renderField( 'excerpt' ) ?>
		<?php echo $this->form->renderField( 'content' ) ?>
	</div>
	<!--	<div class="span4" id="j-sidebar-container">-->
	<div class="span4">
		<?php echo $this->loadTemplate( 'sidebar' ); ?>
	</div>
	<div class="span 12">
		<?php (new JFormFieldSubform())-> ?>
	</div>
	<?php AdminViewHelper::endForm( false ) ?>
	<?php
} catch ( Exception $exception ) {
	ExceptionHelper::renderException( $exception );
}
