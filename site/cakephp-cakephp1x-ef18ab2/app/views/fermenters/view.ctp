<div class="fermenters view">
<h2><?php  __('Fermenter');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fermenter['Fermenter']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fermenter['Fermenter']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fermenter['Fermenter']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Experiment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($fermenter['Experiment']['name'], array('controller' => 'experiments', 'action' => 'view', $fermenter['Experiment']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Fermenter', true), array('action' => 'edit', $fermenter['Fermenter']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Fermenter', true), array('action' => 'delete', $fermenter['Fermenter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fermenter['Fermenter']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Fermenters', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fermenter', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Experiments', true), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Experiment', true), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timepoints', true), array('controller' => 'timepoints', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Timepoints');?></h3>
	<?php if (!empty($fermenter['Timepoint'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('When'); ?></th>
		<th><?php __('Fermenter Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($fermenter['Timepoint'] as $timepoint):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $timepoint['id'];?></td>
			<td><?php echo $timepoint['name'];?></td>
			<td><?php echo $timepoint['when'];?></td>
			<td><?php echo $timepoint['fermenter_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'timepoints', 'action' => 'view', $timepoint['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'timepoints', 'action' => 'edit', $timepoint['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'timepoints', 'action' => 'delete', $timepoint['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timepoint['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
