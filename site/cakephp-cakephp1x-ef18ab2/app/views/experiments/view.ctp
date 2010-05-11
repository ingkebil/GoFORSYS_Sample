<div class="experiments view">
<h2><?php  __('Experiment');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $experiment['Experiment']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo $tooltip->lookup('experiment_name', __('Name', true)); ?></dt>
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
	<h3><?php __('Related Fermenters');?></h3>
	<?php if (!empty($experiment['Fermenter'])):?>
	<table cellpadding = "0" cellspacing = "0">
    <thead>
	<tr>
		<th><?php __('Name'); ?></th>
		<th><?php __('Description'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
    </thead><tbody>
	<?php
		$i = 0;
		foreach ($experiment['Fermenter'] as $fermenter):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $fermenter['name'];?></td>
			<td><?php echo $fermenter['description'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'fermenters', 'action' => 'view', $fermenter['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'fermenters', 'action' => 'edit', $fermenter['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'fermenters', 'action' => 'delete', $fermenter['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fermenter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
        </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Fermenter', true), array('controller' => 'fermenters', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Events');?></h3>
	<table cellpadding = "0" cellspacing = "0">
    <thead>
	<tr>
		<th><?php __('When'); ?></th>
		<th><?php __('Fermenter'); ?></th>
		<th><?php __('Event'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
    </thead><tbody>
	<?php
		$i = 0;
		foreach ($experiment['Fermenter'] as $fermenter):
		foreach ($fermenter['Timepoint'] as $timepoint):
		foreach ($timepoint['Event'] as $event):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $timepoint['when'];?></td>
			<td><?php echo $fermenter['name'];?></td>
			<td><?php echo $event['event'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'timepoints', 'action' => 'view', $event['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'timepoints', 'action' => 'edit', $event['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'timepoints', 'action' => 'delete', $event['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	<?php endforeach; ?>
	<?php endforeach; ?>
        </tbody>
	</table>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Timepoints');?></h3>
	<?php if (!empty($experiment['Fermenter'][0]['Timepoint'])):?>
	<table cellpadding = "0" cellspacing = "0">
    <thead>
	<tr>
		<th><?php __('Name'); ?></th>
		<th><?php __('When'); ?></th>
		<th><?php __('Fermenter'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
    </thead><tbody>
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
			    <td><?php echo $timepoint['name'];?></td>
                <td><?php echo $timepoint['when'];?> <span class="tminus">(<?php echo $moreTime->simpleDiff($timepoint['when'], $start[ $fermenter['id'] ]); ?>)</span></td>
			    <td><?php echo $fermenter['name'];?></td>
			    <td class="actions">
			    	<?php echo $html->link(__('View', true), array('controller' => 'timepoints', 'action' => 'view', $timepoint['id'])); ?>
			    	<?php echo $html->link(__('Edit', true), array('controller' => 'timepoints', 'action' => 'edit', $timepoint['id'])); ?>
			    	<?php echo $html->link(__('Delete', true), array('controller' => 'timepoints', 'action' => 'delete', $timepoint['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timepoint['id'])); ?>
			    </td>
            </tr>
	    <?php endforeach; ?>
	<?php endforeach; ?>
            </tbody>
	</table>
    <thead>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Samples');?></h3>
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
    </thead><tbody>
	<?php
		$i = 0;
		foreach ($experiment['Fermenter'] as $fermenter):
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
	<?php endforeach; ?>
        </tbody>
	</table>
<?php echo $dataTable->create('div.related table'); ?>
