<div class="timepoints form">
<?php echo $form->create('Timepoint');?>
	<fieldset>
 		<legend><?php __('Edit Timepoint');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('when');
		echo $form->input('fermenter_id');
		echo $form->input('event');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Timepoint.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Timepoint.id'))); ?></li>
		<li><?php echo $html->link(__('List Timepoints', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Fermenters', true), array('controller' => 'fermenters', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fermenter', true), array('controller' => 'fermenters', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
