<div class="timepoints view">
<h2><?php  __('Timepoint');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo $tooltip->lookup('experiment_name', __('Experiment', true)); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($timepoint['Fermenter']['Experiment']['name'], array('controller' => 'experiments', 'action' => 'view', $timepoint['Fermenter']['Experiment']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo $tooltip->lookup('fermenter_name', __('Fermenter', true)); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($timepoint['Fermenter']['name'], array('controller' => 'fermenters', 'action' => 'view', $timepoint['Fermenter']['id'])); ?>
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
		<li><?php echo $html->link(__('List Events', true), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Events');?></h3>
	<?php if (!empty($timepoint['Event'])):?>
	<table cellpadding = "0" cellspacing = "0">
    <thead>
	<tr>
		<th><?php __('Timepoint Id'); ?></th>
		<th><?php __('Experiment Id'); ?></th>
		<th><?php __('Description'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($timepoint['Event'] as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $event['timepoint_id'];?></td>
			<td><?php echo $event['experiment_id'];?></td>
			<td><?php echo $event['description'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'events', 'action' => 'delete', $event['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
        </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Samples');?></h3>
	<?php if (!empty($timepoint['Sample'])):?>
	<table cellpadding = "0" cellspacing = "0">
    <thead>
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Derives From'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Person Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($timepoint['Sample'] as $sample):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $html->link($sample['id'], array('controller' => 'samples', 'action' => 'view', $sample['id']));?></td>
            <td><?php echo $html->link($sample['derives_from_name'], array('controller' => 'samples', 'action' => 'view', $sample['derives_from']));?></td>
			<td><?php echo $sample['amount'];?></td>
			<td><?php echo $html->link($sample['Person']['lastname'], array('controller' => 'people', 'action' => 'view', $sample['Person']['id']));?></td>
			<td><?php echo $sample['created'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'samples', 'action' => 'view', $sample['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'samples', 'action' => 'edit', $sample['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'samples', 'action' => 'delete', $sample['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sample['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
        </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<?php echo $dataTable->create('div.related table'); ?>
