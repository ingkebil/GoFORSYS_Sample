<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Event', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('timepoint_id');
		echo $this->Form->input('fermenter_id');
		echo $this->Form->input('event');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Event.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Event.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Events', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Timepoints', true)), array('controller' => 'timepoints', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Timepoint', true)), array('controller' => 'timepoints', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Experiments', true)), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Experiment', true)), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
	</ul>
</div>