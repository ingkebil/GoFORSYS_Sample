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
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Fermenter', true), array('action' => 'edit', $fermenter['Fermenter']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Fermenter', true), array('action' => 'delete', $fermenter['Fermenter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fermenter['Fermenter']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Fermenters', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fermenter', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Samples');?></h3>
	<?php if (!empty($fermenter['Sample'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Fermenter Id'); ?></th>
		<th><?php __('Timepoint'); ?></th>
		<th><?php __('Derives From'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Experiment Id'); ?></th>
		<th><?php __('Person Id'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Type'); ?></th>
		<th><?php __('Date'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($fermenter['Sample'] as $sample):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $sample['id'];?></td>
			<td><?php echo $sample['fermenter_id'];?></td>
			<td><?php echo $sample['timepoint'];?></td>
			<td><?php echo $sample['derives_from'];?></td>
			<td><?php echo $sample['amount'];?></td>
			<td><?php echo $sample['experiment_id'];?></td>
			<td><?php echo $sample['person_id'];?></td>
			<td><?php echo $sample['description'];?></td>
			<td><?php echo $sample['type'];?></td>
			<td><?php echo $sample['date'];?></td>
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
