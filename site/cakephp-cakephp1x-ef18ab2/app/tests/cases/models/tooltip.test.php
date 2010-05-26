<?php
/* Tooltip Test cases generated on: 2010-05-25 15:05:59 : 1274793659*/
App::import('Model', 'Tooltip');

class TooltipTestCase extends CakeTestCase {
	var $fixtures = array('app.tooltip');

	function startTest() {
		$this->Tooltip =& ClassRegistry::init('Tooltip');
	}

	function endTest() {
		unset($this->Tooltip);
		ClassRegistry::flush();
	}

}
?>