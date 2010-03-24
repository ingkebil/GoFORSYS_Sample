<div class="fermenters form">
<?php echo $form->create('Fermenter');?>
	<fieldset>
 		<legend><?php __('Edit Fermenter');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('description');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Fermenter.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Fermenter.id'))); ?></li>
		<li><?php echo $html->link(__('List Fermenters', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
