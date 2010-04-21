<div class="fermenters form">
<?php echo $form->create('Fermenter');?>
	<fieldset>
 		<legend><?php __('Edit Fermenter');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('description');
		echo $form->input('name');
		echo $form->input('experiment_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Fermenter.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Fermenter.id'))); ?></li>
		<li><?php echo $html->link(__('List Fermenters', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Experiments', true), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Experiment', true), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timepoints', true), array('controller' => 'timepoints', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add')); ?> </li>
	</ul>
</div>
