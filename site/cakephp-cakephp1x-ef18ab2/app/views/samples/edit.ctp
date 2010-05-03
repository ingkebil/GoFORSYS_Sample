<div class="samples form">
<?php echo $form->create('Sample');?>
	<fieldset>
 		<legend><?php __('Edit Sample');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('timepoint_id');
		echo $form->input('derives_from');
		echo $form->input('amount');
		echo $form->input('person_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Sample.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Sample.id'))); ?></li>
		<li><?php echo $html->link(__('List Samples', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Parent Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Timepoints', true), array('controller' => 'timepoints', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Timepoint', true), array('controller' => 'timepoints', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List People', true), array('controller' => 'people', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Person', true), array('controller' => 'people', 'action' => 'add')); ?> </li>
	</ul>
</div>
