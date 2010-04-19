<?php 
/* SVN FILE: $Id$ */
/* FermentersController Test cases generated on: 2010-04-19 10:48:52 : 1271666932*/
App::import('Controller', 'Fermenters');

class TestFermenters extends FermentersController {
	var $autoRender = false;
}

class FermentersControllerTest extends CakeTestCase {
	var $Fermenters = null;

	function startTest() {
		$this->Fermenters = new TestFermenters();
		$this->Fermenters->constructClasses();
	}

	function testFermentersControllerInstance() {
		$this->assertTrue(is_a($this->Fermenters, 'FermentersController'));
	}

	function endTest() {
		unset($this->Fermenters);
	}
}
?>