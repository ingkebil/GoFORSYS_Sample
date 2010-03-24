<?php 
/* SVN FILE: $Id$ */
/* ExperimentsController Test cases generated on: 2010-03-23 12:52:31 : 1269345151*/
App::import('Controller', 'Experiments');

class TestExperiments extends ExperimentsController {
	var $autoRender = false;
}

class ExperimentsControllerTest extends CakeTestCase {
	var $Experiments = null;

	function startTest() {
		$this->Experiments = new TestExperiments();
		$this->Experiments->constructClasses();
	}

	function testExperimentsControllerInstance() {
		$this->assertTrue(is_a($this->Experiments, 'ExperimentsController'));
	}

	function endTest() {
		unset($this->Experiments);
	}
}
?>