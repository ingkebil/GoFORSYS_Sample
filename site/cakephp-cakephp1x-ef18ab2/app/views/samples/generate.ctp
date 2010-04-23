<div class="samples form">
<?php echo $form->create('Sample', array('action' => 'generate'));?>
<a href="javascript:void(0);" onclick="selectAll()">Select All</a>
<div id="errors" class="error">No Errors</div>
	<fieldset>
 		<legend><?php __('Add Sample');?></legend>
        <table>
            <tr>
                <th>Date</th>
                <?php $ferms = array(); ?>
                <?php foreach ($experiments['Fermenter'] as $fermenter): ?>
                    <th><?php echo $fermenter['name']; $ferms[] = $fermenter['name']; ?> <a href="javascript:void(0);" onclick="selectAll('<?php echo $fermenter['name']; ?>')">select all</a></th>
                <?php endforeach; ?>
            </tr>
            <?php foreach ($experiments['Timepoints'] as $date => $dates): ?>
            <tr> 
                <td><b><?php echo $date ?></b></td>
                <?php foreach ($ferms as $ferm_id): ?>
                    <td>
                    <?php if (array_key_exists($ferm_id, $dates)):
                        foreach($dates[$ferm_id] as $time => $tp):
                            $tp_id = 'TP-' . $ferm_id . '-' . $tp['tp']; ?>
                                <span id="<?php echo $tp_id; ?>" onclick="toggleTP('<?php echo $tp_id ?>', true)" onmouseover="toggleTP('<?php echo $tp_id ?>')" onmousedown="TPdown();" onmouseup="TPup();" onselectstart="return false;">
                                    <?php echo $time ?> (<?php echo $tp['diff']; ?>)</span><br />
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

    var mousedown = false;

    function toggleTP(id, ignore) {
        if (mousedown || ignore) {
            $(id).setAttribute("class", $(id).getAttribute("class") == "selected" ? "" : "selected");
        }
    }

    function selectAll(fermenter) {
        fermenter = typeof(fermenter) != "undefined" ? fermenter : "";
        fermenter = fermenter + "-";
        var spans = document.getElementsByTagName("span");
        for (i=0; i<spans.length;i++) {
            var id = spans[i].getAttribute("id");
            if (id != null && id.substring(0,3 + fermenter.length) == "TP-" + fermenter) {
                spans[i].setAttribute("class", "selected");
            }
        }
    }

    function TPdown() { mousedown = true; return false; }
    function TPup()   { mousedown = false; }
    addatchEvent($("SampleExperimentId"), "click", function () { update_sample_id(); });
    addatchEvent($("SampleFermenterId"), "click", function () { update_sample_id(); });
    addatchEvent($("SampleTimepointId"), "click", function () { update_sample_id(); });

'); ?>
