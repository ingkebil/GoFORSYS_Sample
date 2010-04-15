<div class="samples form">
<?php echo $form->create('Sample', array('action' => 'generate'));?>
	<fieldset>
 		<legend><?php __('Add Sample');?></legend>
	<?php
		echo $form->input('experiment_id', array('type' => 'select', 'options' => array(2 => 2)));
		echo $form->input('fermenter_id', array('type' => 'select', 'options' => array(1 => 1, 2 =>  2, 3 => 3)));
		echo $form->input('timepoint', array('type' => 'select', 'options' => array(-60 => -60, 0 =>  0, 1 =>  1, 10 =>  10, 30 =>  30, 60 =>  60, 180 => 180)));
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
        sample_id = $("SampleExperimentId").value + "." +
                    $("SampleFermenterId").value + "." +
                    $("SampleTimepoint").value + "." +
                    "###";
        $("sample_id").innerHTML = sample_id;
    }
 
    addatchEvent($("SampleExperimentId"), "click", function () { update_sample_id(); });
    addatchEvent($("SampleFermenterId"), "click", function () { update_sample_id(); });
    addatchEvent($("SampleTimepoint"), "click", function () { update_sample_id(); });

'); ?>
