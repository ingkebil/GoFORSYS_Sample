<?php 
/* SVN FILE: $Id$ */
/* Experiment Test cases generated on: 2010-03-23 12:47:33 : 1269344853*/
App::import('Model', 'Experiment');

class ExperimentTestCase extends CakeTestCase {
	var $Experiment = null;
	var $fixtures = array('app.experiment', 'app.sample');

	function startTest() {
		$this->Experiment =& ClassRegistry::init('Experiment');
	}

	function testExperimentInstance() {
		$this->assertTrue(is_a($this->Experiment, 'Experiment'));
	}

	function testExperimentFind() {
		$this->Experiment->recursive = -1;
		$results = $this->Experiment->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Experiment' => array(
			'id' => 1,
			'description' => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>