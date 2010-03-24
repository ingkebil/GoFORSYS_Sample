<?php 
/* SVN FILE: $Id$ */
/* FermentersController Test cases generated on: 2010-03-23 12:52:56 : 1269345176*/
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