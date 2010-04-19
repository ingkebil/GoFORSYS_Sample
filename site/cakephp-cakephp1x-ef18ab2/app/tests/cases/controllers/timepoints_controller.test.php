<?php 
/* SVN FILE: $Id$ */
/* TimepointsController Test cases generated on: 2010-04-19 11:11:04 : 1271668264*/
App::import('Controller', 'Timepoints');

class TestTimepoints extends TimepointsController {
	var $autoRender = false;
}

class TimepointsControllerTest extends CakeTestCase {
	var $Timepoints = null;

	function startTest() {
		$this->Timepoints = new TestTimepoints();
		$this->Timepoints->constructClasses();
	}

	function testTimepointsControllerInstance() {
		$this->assertTrue(is_a($this->Timepoints, 'TimepointsController'));
	}

	function endTest() {
		unset($this->Timepoints);
	}
}
?>