<?php
/* Experiment Test cases generated on: 2010-05-25 14:05:43 : 1274791363*/
App::import('Model', 'Experiment');

class ExperimentTestCase extends CakeTestCase {
	var $fixtures = array('app.experiment', 'app.fermenter', 'app.timepoint', 'app.event', 'app.sample', 'app.person');

	function startTest() {
		$this->Experiment =& ClassRegistry::init('Experiment');
	}

	function endTest() {
		unset($this->Experiment);
		ClassRegistry::flush();
	}

	function testFindCurExperimentId() {

	}

	function testFindTPFermenter() {

	}

	function testDateDiff() {

	}

}
?>