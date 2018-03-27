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


use Joomla\CMS\Router\Route;
use Joomla\CMS\Router\SiteRouter;
use Sau\Joomla\ASM\Admin\Helpers\AdminViewHelper;
use Sau\Joomla\ASM\Component;
use Sau\Joomla\ASM\Exceptions\ExceptionHelper;
use Sau\Joomla\ASM\UrlHelper;

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
			<?php if ( $this->item->id ): ?>
				<p>
					<?php $link = UrlHelper::buildLink( [
						'option' => Component::NAME,
						'view'   => 'page',
						'id'     => $this->item->id
					] ) ?>
					<a href="/<?php echo $link ?>" class="href" target="_blank"><?php echo $link; ?></a>
				</p>
			<?php endif; ?>
		</div>
		<?php echo $this->form->renderField( 'excerpt' ) ?>
		<?php echo $this->form->renderField( 'content' ) ?>
	</div>
	<!--	<div class="span4" id="j-sidebar-container">-->
	<div class="span4">
		<?php echo $this->loadTemplate( 'sidebar' ); ?>
	</div>
	<div class="span 12">
		<!--		--><?php //(new JFormFieldSubform())-> ?>
	</div>
	<?php AdminViewHelper::endForm( false ) ?>
	<?php
} catch ( Exception $exception ) {
	ExceptionHelper::renderException( $exception );
}
