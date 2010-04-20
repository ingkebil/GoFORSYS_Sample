<div class="timepoints form">
<?php echo $form->create('Timepoint', array('action' => 'create'));?>
	<fieldset>
 		<legend><?php __('Add Timepoints');?></legend>
	<?php
		echo $form->input('timepoints', array('value' => "-24h\n-20h\n-12h\n0\n10m\n20m\n1h\n2h\n4h\n12h\n24h\n48h\n72h\n96h\n120h\n144h\n148h\n156h\n168h\n168h10m\n168h20m\n169h\n170h\n172h\n180h\n192h\n216h\n240h", 'type' => 'textbox'));
		echo $form->input('date', array('type' => 'datetime', 'label' => 'Timepoint 0'));
		echo $form->input('fermenter_id');
        echo $form->input('experiment_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Timepoints', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Fermenters', true), array('controller' => 'fermenters', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Fermenter', true), array('controller' => 'fermenters', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
