<div class="samples view">
<h2><?php  __('Sample');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($sample['Sample']['id'], array('controller' => 'samples', 'action' => 'view', $sample['Sample']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sample['Sample']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Timepoint'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($sample['Timepoint']['name'], array('controller' => 'timepoints', 'action' => 'view', $sample['Timepoint']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Derives From'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($sample['Sample']['derives_from_name'], array('controller' => 'samples', 'action' => 'view', $sample['Sample']['derives_from'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sample['Sample']['amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Person'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($sample['Person']['lastname'], array('controller' => 'people', 'action' => 'view', $sample['Person']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sample['Sample']['created']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Sample', true), array('action' => 'edit', $sample['Sample']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Sample', true), array('action' => 'delete', $sample['Sample']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sample['Sample']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Samples', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Parent Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timepoints', true), array('controller' => 'timepoints', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List People', true), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Person', true), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Samples');?></h3>
	<?php if (!empty($sample['ChildSample'])):?>
	<table cellpadding = "0" cellspacing = "0">
    <thead>
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Timepoint'); ?></th>
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
		foreach ($sample['ChildSample'] as $childSample):
			$class = null;
            if ($childSample['id'] == $childSample['derives_from']) continue;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $html->link($childSample['id'], array('controller' => 'samples', 'action' => 'view', $childSample['id']));?></td>
			<td><?php echo $childSample['name'];?></td>
			<td><?php echo $html->link($childSample['timepoint_id'], array('controller' => 'timepoints', 'action' => 'view', $childSample['timepoint_id']));?></td>
			<td><?php echo $html->link($childSample['derives_from_name'], array('controller' => 'samples', 'action' => 'view', $childSample['derives_from']));?></td>
			<td><?php echo $childSample['amount'];?></td>
			<td><?php echo $html->link($childSample['Person']['lastname'], array('controller' => 'people', 'action' => 'view', $childSample['person_id']));?></td>
			<td><?php echo $childSample['created'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'samples', 'action' => 'view', $childSample['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'samples', 'action' => 'edit', $childSample['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'samples', 'action' => 'delete', $childSample['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $childSample['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
        </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Child Sample', true), array('controller' => 'samples', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<?php echo $dataTable->create('div.related table'); ?>
