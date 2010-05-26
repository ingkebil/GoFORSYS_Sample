<?php
/* Event Test cases generated on: 2010-05-25 11:05:35 : 1274778575*/
App::import('Model', 'Event');

class EventTestCase extends CakeTestCase {
	var $fixtures = array('app.event', 'app.timepoint', 'app.fermenter', 'app.experiment', 'app.sample', 'app.person');

	function startTest() {
		$this->Event =& ClassRegistry::init('Event');
	}

	function endTest() {
		unset($this->Event);
		ClassRegistry::flush();
	}

	function testFindStart() {
        $this->Event =& ClassRegistry::init('Event');

        $exp_id = 2;
        $result = $this->Event->findStarts(2);
        $expected = array(
            1 => '2010-04-20 09:00:00',
        );

        $this->assertEqual($result, $expected);
	}

}
?>
