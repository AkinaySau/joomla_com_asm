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
use Sau\Joomla\ASM\Admin\Helpers\AdminViewHelper;
use Sau\Joomla\ASM\Component;
use Sau\Joomla\ASM\UrlHelper;

defined( '_JEXEC' ) or die;
?>
<div id="j-sidebar-container" class="span2">
	<?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
	<?php AdminViewHelper::startForm() ?>
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
				<?php $link = AdminViewHelper::link( 'page', '', [ 'id' => $item->id ] ) ?>
				<tr>
					<td>
						<?php echo JHtmlGrid::id( $i, $item->id ); ?>
					</td>
					<td>
						<a href="<?php echo $link ?>">
							<?php echo $item->title; ?>
						</a>
					</td>
					<td>
						<?php echo date("d.m.Y H:i:s",strtotime($item->date_create)); ?>
					</td>
					<td>
						<?php echo date("d.m.Y H:i:s",strtotime($item->last_modified)); ?>
					</td>
					<td>
						<?php echo $item->id; ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		<?php else: ?>
			<h3><?php echo Text::_( 'COM_ASM_NOT_FOUND' ); ?></h3>
		<?php endif; ?>
		<tfoot>
		<tr>
			<td colspan="4"><?php echo $this->pagination->getListFooter(); ?></td>
		</tr>
		<tr>
			<th colspan="4">
				<?php echo Component::MyLink; ?>
			</th>
		</tr>
		</tfoot>
	</table>
	<?php AdminViewHelper::endForm() ?>
</div>

