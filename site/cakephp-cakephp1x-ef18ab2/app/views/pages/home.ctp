<h2>Sample ID Generation</h2>
You can ...
<ul>
<li><?php echo $html->link('... Generate sample IDs', '/generate'); ?></li>
<li><?php echo $html->link('... Browse previous sample IDs', '/samples'); ?></li>
<li><?php echo $html->link('... View a summary of the experiment data', '/experiments'); ?></li>
</ul>
<br />
<ul>
<li><?php echo $html->link('... Browse the help', 'http://gent/dokuwiki/goforsys/'); ?></li>
</ul>

<?php $html->script('timeline_2.3.0/src/webapp/api/timeline-api.js', false); ?>
<?php echo $html->scriptBlock('
var tl;
window.onload = function () {
  var bandInfos = [
    Timeline.createBandInfo({
        width:          "100%", 
        intervalUnit:   Timeline.DateTime.MONTH, 
        intervalPixels: 100
    }),
  ];
  tl = Timeline.create(document.getElementById("fermenter-timeline"), bandInfos);
}

var resizeTimerID = null;
window.onresize = function () {
    if (resizeTimerID == null) {
        resizeTimerID = window.setTimeout(function() {
            resizeTimerID = null;
            tl.layout();
        }, 500);
    }
}

// addatchEvent(window, "load", function (e) { onLoad(); });
// addatchEvent(window, "resize", function (e) { onResize(); });
'); ?>

<!--h2>Fermenter Timelines</h2>

<div id="fermenter-timeline" style="height: 150px; border: 1px solid #aaa"></div-->

