<div class="fermenters view">
<h2><?php  __('Fermenter');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
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
    <thead>
	<tr>
		<th><?php __('Name'); ?></th>
		<th><?php __('When'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($fermenter['Timepoint'] as $timepoint):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $timepoint['name'];?></td>
			<td><?php echo $timepoint['when'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'timepoints', 'action' => 'view', $timepoint['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'timepoints', 'action' => 'edit', $timepoint['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'timepoints', 'action' => 'delete', $timepoint['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timepoint['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Samples');?></h3>
	<?php if (!empty($fermenter['Timepoint'])):?>
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
		foreach ($fermenter['Timepoint'] as $timepoint):
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
