<?php 
/* SVN FILE: $Id$ */
/* Tooltip Fixture generated on: 2010-05-03 13:13:52 : 1272885232*/

class TooltipFixture extends CakeTestFixture {
	var $name = 'Tooltip';
	var $table = 'tooltips';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'element_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'tooltip' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'element_id' => 'Lorem ipsum dolor sit amet',
		'tooltip' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
	));
}
?>