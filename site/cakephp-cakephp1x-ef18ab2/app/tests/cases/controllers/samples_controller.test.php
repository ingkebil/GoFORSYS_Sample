<?php 
/* SVN FILE: $Id$ */
/* SamplesController Test cases generated on: 2010-03-23 12:50:58 : 1269345058*/
App::import('Controller', 'Samples');

class TestSamples extends SamplesController {
	var $autoRender = false;
}

class SamplesControllerTest extends CakeTestCase {
	var $Samples = null;

	function startTest() {
		$this->Samples = new TestSamples();
		$this->Samples->constructClasses();
	}

	function testSamplesControllerInstance() {
		$this->assertTrue(is_a($this->Samples, 'SamplesController'));
	}

	function endTest() {
		unset($this->Samples);
	}
}
?>