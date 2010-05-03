<div class="tooltips view">
<h2><?php  __('Tooltip');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tooltip['Tooltip']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Element Class'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tooltip['Tooltip']['element_class']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tooltip'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tooltip['Tooltip']['tooltip']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Readmore Link'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tooltip['Tooltip']['readmore_link']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Tooltip', true), array('action' => 'edit', $tooltip['Tooltip']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Tooltip', true), array('action' => 'delete', $tooltip['Tooltip']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tooltip['Tooltip']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Tooltips', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Tooltip', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
