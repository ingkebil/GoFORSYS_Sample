<div class="experiments form">
<?php echo $form->create('Experiment');?>
	<fieldset>
 		<legend><?php __('Edit Experiment');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Experiment.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Experiment.id'))); ?></li>
		<li><?php echo $html->link(__('List Experiments', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
