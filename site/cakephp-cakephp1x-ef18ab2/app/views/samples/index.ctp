<div class="samples index">
<h2><?php __('Samples');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('sample_id');?></th>
	<th><?php echo $paginator->sort('timepoint_id');?></th>
	<th><?php echo $paginator->sort('derives_from');?></th>
	<th><?php echo $paginator->sort('amount');?></th>
	<th><?php echo $paginator->sort('person_id');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('type');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($samples as $sample):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $sample['Sample']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($sample['Sample']['id'], array('controller' => 'samples', 'action' => 'view', $sample['Sample']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($sample['Timepoint']['name'], array('controller' => 'timepoints', 'action' => 'view', $sample['Timepoint']['id'])); ?>
		</td>
		<td>
			<?php echo $sample['Sample']['derives_from']; ?>
		</td>
		<td>
			<?php echo $sample['Sample']['amount']; ?>
		</td>
		<td>
			<?php echo $html->link($sample['Person']['id'], array('controller' => 'people', 'action' => 'view', $sample['Person']['id'])); ?>
		</td>
		<td>
			<?php echo $sample['Sample']['description']; ?>
		</td>
		<td>
			<?php echo $sample['Sample']['type']; ?>
		</td>
		<td>
			<?php echo $sample['Sample']['created']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $sample['Sample']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $sample['Sample']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $sample['Sample']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sample['Sample']['id'])); ?>
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
		<li><?php echo $html->link(__('New Sample', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timepoints', true), array('controller' => 'timepoints', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List People', true), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Person', true), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
