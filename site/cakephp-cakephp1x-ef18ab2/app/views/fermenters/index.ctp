<div class="fermenters index">
<h2><?php __('Fermenters');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('experiment_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($fermenters as $fermenter):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $fermenter['Fermenter']['id']; ?>
		</td>
		<td>
			<?php echo $fermenter['Fermenter']['description']; ?>
		</td>
		<td>
			<?php echo $fermenter['Fermenter']['name']; ?>
		</td>
		<td>
			<?php echo $html->link($fermenter['Experiment']['name'], array('controller' => 'experiments', 'action' => 'view', $fermenter['Experiment']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $fermenter['Fermenter']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $fermenter['Fermenter']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $fermenter['Fermenter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fermenter['Fermenter']['id'])); ?>
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
		<li><?php echo $html->link(__('New Fermenter', true), array('action' => 'add')); ?></li>
		<li><?php echo $html->link(__('List Experiments', true), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Experiment', true), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timepoints', true), array('controller' => 'timepoints', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add')); ?> </li>
	</ul>
</div>
