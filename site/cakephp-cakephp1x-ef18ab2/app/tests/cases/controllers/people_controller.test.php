<?php 
/* SVN FILE: $Id$ */
/* PeopleController Test cases generated on: 2010-03-23 14:40:19 : 1269351619*/
App::import('Controller', 'People');

class TestPeople extends PeopleController {
	var $autoRender = false;
}

class PeopleControllerTest extends CakeTestCase {
	var $People = null;

	function startTest() {
		$this->People = new TestPeople();
		$this->People->constructClasses();
	}

	function testPeopleControllerInstance() {
		$this->assertTrue(is_a($this->People, 'PeopleController'));
	}

	function endTest() {
		unset($this->People);
	}
}
?>