<?php 
/* SVN FILE: $Id$ */
/* Tooltip Test cases generated on: 2010-05-03 13:13:52 : 1272885232*/
App::import('Model', 'Tooltip');

class TooltipTestCase extends CakeTestCase {
	var $Tooltip = null;
	var $fixtures = array('app.tooltip');

	function startTest() {
		$this->Tooltip =& ClassRegistry::init('Tooltip');
	}

	function testTooltipInstance() {
		$this->assertTrue(is_a($this->Tooltip, 'Tooltip'));
	}

	function testTooltipFind() {
		$this->Tooltip->recursive = -1;
		$results = $this->Tooltip->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Tooltip' => array(
			'id' => 1,
			'element_id' => 'Lorem ipsum dolor sit amet',
			'tooltip' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		));
		$this->assertEqual($results, $expected);
	}
}
?>