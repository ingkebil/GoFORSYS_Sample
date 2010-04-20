<div class="timepoints index">
<h2><?php __('Timepoints');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('when');?></th>
	<th><?php echo $paginator->sort('fermenter_id');?></th>
	<th><?php echo $paginator->sort('experiment_id');?></th>
	<th><?php echo $paginator->sort('event');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($timepoints as $timepoint):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $timepoint['Timepoint']['id']; ?>
		</td>
		<td>
			<?php echo $timepoint['Timepoint']['name']; ?>
		</td>
		<td>
			<?php echo $timepoint['Timepoint']['when']; ?>
		</td>
		<td>
			<?php echo $html->link($timepoint['Fermenter']['name'], array('controller' => 'fermenters', 'action' => 'view', $timepoint['Fermenter']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($timepoint['Experiment']['name'], array('controller' => 'experiments', 'action' => 'view', $timepoint['Experiment']['id'])); ?>
		</td>
		<td>
			<?php echo $timepoint['Timepoint']['event']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $timepoint['Timepoint']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $timepoint['Timepoint']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $timepoint['Timepoint']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timepoint['Timepoint']['id'])); ?>
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
		<li><?php echo $html->link(__('New Timepoint', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Fermenters', true), array('controller' => 'fermenters', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fermenter', true), array('controller' => 'fermenters', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Experiments', true), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Experiment', true), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
