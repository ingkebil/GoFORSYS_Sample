<?php
 $html->css('../js/dataTables-1.6/media/css/demo_page');
 $html->css('../js/dataTables-1.6/media/css/demo_table');
echo $html->css('datatables.css', false, false, false);
$javascript->link('jquery-1.4.2.min', false);
$javascript->link('dataTables-1.6/media/js/jquery.dataTables', false);
?>
<div class="people view">
<h2><?php  __('Person');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lastname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $person['Person']['lastname']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Person', true), array('action' => 'edit', $person['Person']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Person', true), array('action' => 'delete', $person['Person']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $person['Person']['id'])); ?> </li>
		<li><?php echo $html->link(__('List People', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Person', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Samples', true), array('controller' => 'samples', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Samples');?></h3>
	<?php if (!empty($person['Sample'])):?>
	<table cellpadding = "0" cellspacing = "0"  class="display" id="example">
    <thead>
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Timepoint'); ?></th>
		<th><?php __('Derives From'); ?></th>
		<th><?php __('Amount'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($person['Sample'] as $sample):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $sample['id'];?></td>
			<td><?php echo $html->link($sample['timepoint_id'], array('controller' => 'timepoints', 'action' => 'view', $sample['timepoint_id']));?></td>
			<td><?php echo $sample['derives_from'];?></td>
			<td><?php echo $sample['amount'];?></td>
			<td><?php echo $sample['created'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller' => 'samples', 'action' => 'view', $sample['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller' => 'samples', 'action' => 'edit', $sample['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller' => 'samples', 'action' => 'delete', $sample['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sample['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Sample', true), array('controller' => 'samples', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>

<?php echo $javascript->codeBlock("
$(document).ready(function () {
    $('div.related table').dataTable( {
        'bStateSave': true,
        'sPaginationType': 'full_numbers'

    } );
});
"); ?>
