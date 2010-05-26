<?php
/* Fermenter Test cases generated on: 2010-05-25 14:05:05 : 1274791385*/
App::import('Model', 'Fermenter');

class FermenterTestCase extends CakeTestCase {
	var $fixtures = array('app.fermenter', 'app.experiment', 'app.timepoint', 'app.event', 'app.sample', 'app.person');

	function startTest() {
		$this->Fermenter =& ClassRegistry::init('Fermenter');
	}

	function endTest() {
		unset($this->Fermenter);
		ClassRegistry::flush();
	}

	function testFindStart() {

	}

}
?>