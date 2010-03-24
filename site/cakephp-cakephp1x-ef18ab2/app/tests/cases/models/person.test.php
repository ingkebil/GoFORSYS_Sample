<?php 
/* SVN FILE: $Id$ */
/* Person Test cases generated on: 2010-03-23 12:48:19 : 1269344899*/
App::import('Model', 'Person');

class PersonTestCase extends CakeTestCase {
	var $Person = null;
	var $fixtures = array('app.person', 'app.sample');

	function startTest() {
		$this->Person =& ClassRegistry::init('Person');
	}

	function testPersonInstance() {
		$this->assertTrue(is_a($this->Person, 'Person'));
	}

	function testPersonFind() {
		$this->Person->recursive = -1;
		$results = $this->Person->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Person' => array(
			'id' => 1,
			'lastname' => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>