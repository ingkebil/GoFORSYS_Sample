<div class="events index">
<h2><?php __('Events');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('timepoint_id');?></th>
	<th><?php echo $paginator->sort('experiment_id');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($events as $event):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $event['Event']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($event['Timepoint']['name'], array('controller' => 'timepoints', 'action' => 'view', $event['Timepoint']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($event['Experiment']['name'], array('controller' => 'experiments', 'action' => 'view', $event['Experiment']['id'])); ?>
		</td>
		<td>
			<?php echo $event['Event']['description']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $event['Event']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $event['Event']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $event['Event']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $event['Event']['id'])); ?>
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
		<li><?php echo $html->link(__('New Event', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Timepoints', true), array('controller' => 'timepoints', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Experiments', true), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Experiment', true), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
	</ul>
</div>
