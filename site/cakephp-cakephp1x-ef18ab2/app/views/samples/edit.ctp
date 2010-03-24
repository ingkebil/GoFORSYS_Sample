<div class="samples form">
<?php echo $form->create('Sample');?>
	<fieldset>
 		<legend><?php __('Edit Sample');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('fermenter_id');
		echo $form->input('timepoint');
		echo $form->input('derives_from');
		echo $form->input('amount');
		echo $form->input('experiment_id');
		echo $form->input('person_id');
		echo $form->input('description');
		echo $form->input('type');
		echo $form->input('date');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Sample.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Sample.id'))); ?></li>
		<li><?php echo $html->link(__('List Samples', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Fermenters', true), array('controller' => 'fermenters', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fermenter', true), array('controller' => 'fermenters', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Experiments', true), array('controller' => 'experiments', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Experiment', true), array('controller' => 'experiments', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List People', true), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Person', true), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
