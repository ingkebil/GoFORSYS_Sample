<div class="tooltips index">
<h2><?php __('Tooltips');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('element_class');?></th>
	<th><?php echo $paginator->sort('tooltip');?></th>
	<th><?php echo $paginator->sort('readmore_link');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($tooltips as $tooltip):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $tooltip['Tooltip']['id']; ?>
		</td>
		<td>
			<?php echo $tooltip['Tooltip']['element_class']; ?>
		</td>
		<td>
			<?php echo $tooltip['Tooltip']['tooltip']; ?>
		</td>
		<td>
			<?php echo $tooltip['Tooltip']['readmore_link']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $tooltip['Tooltip']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $tooltip['Tooltip']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $tooltip['Tooltip']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tooltip['Tooltip']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Tooltip', true), array('action' => 'add')); ?></li>
	</ul>
</div>
