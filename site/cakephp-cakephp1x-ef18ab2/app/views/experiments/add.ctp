<div class="experiments form">
<?php echo $form->create('Experiment');?>
	<fieldset>
 		<legend><?php __('Add Experiment');?></legend>
	<?php
		echo $form->input('description');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Experiments', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
