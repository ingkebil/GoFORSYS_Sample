<div class="people form">
<?php echo $form->create('Person');?>
	<fieldset>
 		<legend><?php __('Edit Person');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('lastname');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Person.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Person.id'))); ?></li>
		<li><?php echo $html->link(__('List People', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
