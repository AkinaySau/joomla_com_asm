<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_asm
 *
 * @copyright   A copyright
 * @license     A "Slug" license name e.g. GPL2
 */

/**
 * @var $this ASMViewPages
 */

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Sau\Joomla\ASM\UrlHelper;

defined( '_JEXEC' ) or die;
?>
<div id="j-sidebar-container" class="span2">
	<?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
	<form action="<?php echo Route::_( UrlHelper::buildLink( [ 'option' => 'com_asm' ] ) ); ?>" method="post" name="adminForm" id="adminForm">
		<table width="100%">
			<?php if ( $this->items ): ?>
				<thead>
				<tr>
					<th width="1%">
						<?php echo JHtmlGrid::checkall(); ?>
					</th>
					<th>
						<?php echo Text::_( 'COM_ASM_TITLE' ); ?>
					</th>
					<th>
						<?php echo Text::_( 'COM_ASM_DATE_CREATE' ); ?>
					</th>
					<th>
						<?php echo Text::_( 'COM_ASM_DATE_UPDATE' ); ?>
					</th>
					<th width="1%">
						<?php echo Text::_( 'COM_ASM_ID' ); ?>
					</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ( $this->items as $i => $item ) : ?>
					<tr>
						<td>
							<?php echo JHtmlGrid::id( $i, $item->id ); ?>
						</td>
						<td>
							<?php echo $item->title; ?>
						</td>
						<td>
							<?php echo $item->created; ?>
						</td>
						<td>
							<?php echo $item->updates; ?>
						</td>
						<td>
							<?php echo $item->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			<?php else: ?>
			<h3><?php echo Text::_('COM_ASM_NOT_FOUND'); ?></h3>
			<?php endif; ?>
			<tfoot>
			<tr>
				<td colspan="4"><?php echo $this->pagination->getListFooter(); ?></td>
			</tr>
			<tr>
				<th colspan="4">
					<a href="http://a-sau.ru" target="_blank">Akinay Sau</a>
				</th>
			</tr>
			</tfoot>
		</table>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtmlForm::token(); ?>
	</form>

</div>

