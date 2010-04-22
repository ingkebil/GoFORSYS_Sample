<div class="experiments view">
<h2><?php  __('Experiment');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $experiment['Experiment']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $experiment['Experiment']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $experiment['Experiment']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Experiment', true), array('action' => 'edit', $experiment['Experiment']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Experiment', true), array('action' => 'delete', $experiment['Experiment']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $experiment['Experiment']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Experiments', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Experiment', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Events', true), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Fermenters', true), array('controller' => 'fermenters', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fermenter', true), array('controller' => 'fermenters', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timepoints', true), array('controller' => 'timepoints', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Events');?></h3>
	<?php if (!empty($experiment['Timepoint'])):?>
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
		foreach ($experiment['Timepoint'] as $timepoint):
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
<div class="related">
	<h3><?php __('Related Fermenters');?></h3>
	<?php if (!empty($experiment['Fermenter'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Description'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Experiment Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($experiment['Fermenter'] as $fermenter):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $fermenter['id'];?></td>
			<td><?php echo $fermenter['description'];?></td>
			<td><?php echo $fermenter['name'];?></td>
			<td><?php echo $fermenter['experiment_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'fermenters', 'action' => 'view', $fermenter['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'fermenters', 'action' => 'edit', $fermenter['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'fermenters', 'action' => 'delete', $fermenter['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fermenter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Fermenter', true), array('controller' => 'fermenters', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Timepoints');?></h3>
	<?php if (!empty($experiment['Fermenter'][0]['Timepoint'])):?>
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
		foreach ($experiment['Fermenter'] as $fermenter):
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
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
