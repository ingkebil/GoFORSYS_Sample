<div class="samples form">
<?php echo $form->create('Sample', array('action' => 'generate'));?>
	<fieldset>
 		<legend><?php __('Add Sample');?></legend>
        <table>
            <tr>
                <th>Date</th>
                <?php $ferms = array(); ?>
                <?php foreach ($experiments['Fermenter'] as $fermenter): ?>
                <th><?php echo $fermenter['name']; $ferms[] = $fermenter['name']; ?></th>
                <?php endforeach; ?>
            </tr>
            <?php foreach ($experiments['Timepoints'] as $date => $dates): ?>
            <tr> 
                <td><b><?php echo $date ?></b></td>
                <?php foreach ($ferms as $ferm_id): ?>
                    <td>
                    <?php 
                        if (array_key_exists($ferm_id, $dates)):
                            foreach($dates[$ferm_id] as $time => $tp_id):
                                echo $time ?> (<?php echo $tp_id['tp'] ?>) <?php echo $tp_id['diff']; ?><br />
                            <?php endforeach; ?>
                        <?php else: ?>
                            &nbsp;
                        <?php endif; ?>
                    </td>
                <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php
		echo $form->input('fermenter_id', array('type' => 'hidden'));
		echo $form->input('timepoint_id', array('type' => 'hidden'));
		echo $form->input('amount', array('label' => 'Amount (ml)'));
		echo $form->input('Person.lastname');
        echo $form->input('Person.IP');
	?>
	</fieldset>
    <fieldset>
        <legend><?php __('Generated sample ID'); ?></legend>
        <span id="sample_id">None yet<span>
    </fieldset>
<?php echo $form->end('Generate');?>
</div>

<?php echo $javascript->codeBlock('
    function addatchEvent (el, vent, fu) {
        if (el.addEventListener) {
            el.addEventListener(vent, fu, false);
        }
        else if (el.attachEvent) {
            el.attachEvent("on" + vent, fu);
        }
    }


    function $(el) {
        return document.getElementById(el);
    }

    function update_sample_id() {
        sample_id = $("SampleExperimentId").value + "_" +
                    $("SampleFermenterId").value  + "_" +
                    $("SampleTimepointId").value    + "_" +
                    "###";
        $("sample_id").innerHTML = sample_id;
    }
 
    addatchEvent($("SampleExperimentId"), "click", function () { update_sample_id(); });
    addatchEvent($("SampleFermenterId"), "click", function () { update_sample_id(); });
    addatchEvent($("SampleTimepointId"), "click", function () { update_sample_id(); });

'); ?>
