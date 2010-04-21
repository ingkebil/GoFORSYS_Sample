<?php 
/* SVN FILE: $Id$ */
/* Event Test cases generated on: 2010-04-21 14:19:33 : 1271852373*/
App::import('Model', 'Event');

class EventTestCase extends CakeTestCase {
	var $Event = null;
	var $fixtures = array('app.event', 'app.timepoint', 'app.experiment');

	function startTest() {
		$this->Event =& ClassRegistry::init('Event');
	}

	function testEventInstance() {
		$this->assertTrue(is_a($this->Event, 'Event'));
	}

	function testEventFind() {
		$this->Event->recursive = -1;
		$results = $this->Event->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Event' => array(
			'id' => 1,
			'timepoint_id' => 1,
			'experiment_id' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		));
		$this->assertEqual($results, $expected);
	}
}
?>