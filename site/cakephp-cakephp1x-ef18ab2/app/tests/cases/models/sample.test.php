<?php 
/* SVN FILE: $Id$ */
/* Sample Test cases generated on: 2010-03-23 12:50:11 : 1269345011*/
App::import('Model', 'Sample');

class SampleTestCase extends CakeTestCase {
	var $Sample = null;
	var $fixtures = array('app.sample', 'app.fermenter', 'app.experiment', 'app.person');

	function startTest() {
		$this->Sample =& ClassRegistry::init('Sample');
	}

	function testSampleInstance() {
		$this->assertTrue(is_a($this->Sample, 'Sample'));
	}

	function testSampleFind() {
		$this->Sample->recursive = -1;
		$results = $this->Sample->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Sample' => array(
			'id' => 'Lorem ipsum dolor sit amet',
			'fermenter_id' => 1,
			'timepoint' => 1,
			'derives_from' => 'Lorem ipsum dolor sit amet',
			'amount' => 1,
			'experiment_id' => 1,
			'person_id' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 'Lorem ipsum dolor sit amet',
			'date' => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>