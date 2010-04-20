<div class="timepoints view">
<h2><?php  __('Timepoint');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timepoint['Timepoint']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timepoint['Timepoint']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('When'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timepoint['Timepoint']['when']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fermenter'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($timepoint['Fermenter']['name'], array('controller' => 'fermenters', 'action' => 'view', $timepoint['Fermenter']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Experiment'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($timepoint['Experiment']['name'], array('controller' => 'experiments', 'action' => 'view', $timepoint['Experiment']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Event'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timepoint['Timepoint']['event']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Timepoint', true), array('action' => 'edit', $timepoint['Timepoint']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Timepoint', true), array('action' => 'delete', $timepoint['Timepoint']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timepoint['Timepoint']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Timepoints', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timepoint', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Fermenters', true), array('controller' => 'fermenters', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fermenter', true), array('controller' => 'fermenters', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Experiments', true), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Experiment', true), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Samples');?></h3>
	<?php if (!empty($timepoint['Sample'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Sample Id'); ?></th>
		<th><?php __('Fermenter Id'); ?></th>
		<th><?php __('Timepoint Id'); ?></th>
		<th><?php __('Derives From'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Experiment Id'); ?></th>
		<th><?php __('Person Id'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($timepoint['Sample'] as $sample):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $sample['id'];?></td>
			<td><?php echo $sample['sample_id'];?></td>
			<td><?php echo $sample['fermenter_id'];?></td>
			<td><?php echo $sample['timepoint_id'];?></td>
			<td><?php echo $sample['derives_from'];?></td>
			<td><?php echo $sample['amount'];?></td>
			<td><?php echo $sample['experiment_id'];?></td>
			<td><?php echo $sample['person_id'];?></td>
			<td><?php echo $sample['description'];?></td>
			<td><?php echo $sample['type'];?></td>
			<td><?php echo $sample['created'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'samples', 'action' => 'view', $sample['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'samples', 'action' => 'edit', $sample['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'samples', 'action' => 'delete', $sample['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sample['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
