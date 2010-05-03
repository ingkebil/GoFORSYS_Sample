<div class="tooltips form">
<?php echo $form->create('Tooltip');?>
	<fieldset>
 		<legend><?php __('Add Tooltip');?></legend>
	<?php
		echo $form->input('element_class');
		echo $form->input('tooltip');
		echo $form->input('readmore_link');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Tooltips', true), array('action' => 'index'));?></li>
	</ul>
</div>
