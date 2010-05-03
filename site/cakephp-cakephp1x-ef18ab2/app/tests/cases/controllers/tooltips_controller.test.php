<?php 
/* SVN FILE: $Id$ */
/* TooltipsController Test cases generated on: 2010-05-03 14:05:23 : 1272888323*/
App::import('Controller', 'Tooltips');

class TestTooltips extends TooltipsController {
	var $autoRender = false;
}

class TooltipsControllerTest extends CakeTestCase {
	var $Tooltips = null;

	function startTest() {
		$this->Tooltips = new TestTooltips();
		$this->Tooltips->constructClasses();
	}

	function testTooltipsControllerInstance() {
		$this->assertTrue(is_a($this->Tooltips, 'TooltipsController'));
	}

	function endTest() {
		unset($this->Tooltips);
	}
}
?>