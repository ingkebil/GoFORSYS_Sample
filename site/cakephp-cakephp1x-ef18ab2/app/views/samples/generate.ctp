<?php echo $javascript->codeBlock("
function setCookie(c_name,value,expiredays) {
    var exdate=new Date();
    exdate.setDate(exdate.getDate()+expiredays);
    document.cookie=c_name+ '=' +escape(value) + ((expiredays==null) ? '' : ';expires='+exdate.toUTCString());
}
function getCookie(c_name) {
if (document.cookie.length>0) {
  c_start=document.cookie.indexOf(c_name + '=');
  if (c_start!=-1) {
    c_start=c_start + c_name.length+1;
    c_end=document.cookie.indexOf(';',c_start);
    if (c_end==-1) c_end=document.cookie.length;
    return unescape(document.cookie.substring(c_start,c_end));
    }
  }
return '';
}
"); ?>
<?php $javascript->link('jquery-1.4.2.min', false); ?>
<?php $javascript->link('simpleAutoComplete', false); ?>
<?php $html->css('simpleAutoComplete', null, false, false); ?>
<?php $html->css('samples', null, false, false); ?>
<div class="samples form">
<?php if (! count($experiments['Fermenter'])): ?>
No timepoints found! Maybe someone should <?php echo $html->link('add some', '/timepoints/create'); ?>?
<?php else: ?>
<?php echo $form->create('Sample', array('action' => "generate"));?>
	<fieldset>
 		<legend><?php __('Add Sample');?></legend>
        <table>
            <tr>
                <th>Date</th>
                <?php $ferms = array(); ?>
                <?php foreach ($experiments['Fermenter'] as $fermenter): ?>
                    <th id="selectall-<?php echo $fermenter['name'] ?>"><?php echo $fermenter['name']; $ferms[] = $fermenter['name']; ?></th>
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
                            <span ferm="<?php echo $ferm_id ?>" tp="<?php echo $tp['tp']; ?>" id="<?php echo $tp_id; ?>"><?php echo $time ?> <span class="tminus">(<?php echo $tp['diff']; ?>)</span></span><br />
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
#		echo $form->input('timepoint_id', array('type' => 'hidden'));
		echo $form->input('experiment_id', array('type' => 'hidden'));
		echo $form->input('fermenter_id'); # , array('type' => 'hidden'));
		echo $form->input('timepoint_id');
		echo $form->input('amount', array('between' => '(ml)'));
		echo $form->input('Person.lastname');
	?>
	</fieldset>
<?php echo $form->end('Generate');?>
</div>
<?php endif; ?>

<?php echo $javascript->codeBlock('
    $(document).ready(function() {
        $("table tr th:not(:first)").click(function(event) {
            event.preventDefault();
            var ferm = $(this).attr("id").substring("selectall-".length);
            $("span[id^=TP-]").each(function(index) {
                if ($(this).attr("ferm") == ferm) {
                    $(this).toggleClass("selected");
                }
            });
        });    

        $("table tr td:first-child").click(function () {
            $(this).siblings().children("span").toggleClass("selected");
        });

        $("span[id^=TP-]").click(function () {
            if ($(this).hasClass("selected")) {
                $(this).removeClass("selected");
            }
            else {
                $(this).addClass("selected");
            }
        });
    });

    $(document).ready(function () {
        $("#PersonLastname").val(getCookie("lastname")); 
        $("#PersonLastname").change(function () {
           setCookie("lastname", $("#PersonLastname").val(), 365);
        });

        $("#PersonLastname").simpleAutoComplete("'.$html->url('/people/listem').'");
    });

    $(document).ready(function () {
        $("#SampleGenerateForm").submit(function() {
            var tps = "";
            var ferms = "";
            var ids = $("span[id^=TP-].selected");
            if (ids.size() == 1) {
                //$("fieldset").append("<fieldset><legend>Generated ID</legend></fieldset>");
            }
            else {
                ids.each(function(index) {
                    tps += "," + $(this).attr("tp");
                    ferms += "," + $(this).attr("ferm");
                });
            }
            $("#SampleTimepointId").val(tps);
            $("#SampleFermenterId").val(ferms);
        });
    });

'); ?>
