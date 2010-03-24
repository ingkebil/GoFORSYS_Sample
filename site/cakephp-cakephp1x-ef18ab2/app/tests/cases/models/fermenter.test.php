<?php 
/* SVN FILE: $Id$ */
/* Fermenter Test cases generated on: 2010-03-23 12:48:01 : 1269344881*/
App::import('Model', 'Fermenter');

class FermenterTestCase extends CakeTestCase {
	var $Fermenter = null;
	var $fixtures = array('app.fermenter', 'app.sample');

	function startTest() {
		$this->Fermenter =& ClassRegistry::init('Fermenter');
	}

	function testFermenterInstance() {
		$this->assertTrue(is_a($this->Fermenter, 'Fermenter'));
	}

	function testFermenterFind() {
		$this->Fermenter->recursive = -1;
		$results = $this->Fermenter->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Fermenter' => array(
			'id' => 1,
			'description' => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>