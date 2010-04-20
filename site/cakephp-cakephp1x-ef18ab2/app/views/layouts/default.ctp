<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
        <?php __('DbFORSYS'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('cake.generic');

        echo $javascript->codeBlock('
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
    }');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>DbFORSYS: unconfusing data</h1>
		</div>
		<div id="content">

			<?php $session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $html->link(
                    '&nbsp; problems? &nbsp;',
                    'mailto:billiau@mpimp-golm.mpg.de',
                    array('title' => 'Or call me on 8626', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>
