<?php
/* Person Test cases generated on: 2010-05-25 14:05:36 : 1274791476*/
App::import('Model', 'Person');

class PersonTestCase extends CakeTestCase {
	var $fixtures = array('app.person', 'app.sample', 'app.timepoint', 'app.fermenter', 'app.experiment', 'app.event');

	function startTest() {
		$this->Person =& ClassRegistry::init('Person');
	}

	function endTest() {
		unset($this->Person);
		ClassRegistry::flush();
	}

}
?>