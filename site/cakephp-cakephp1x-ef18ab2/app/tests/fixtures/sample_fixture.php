<?php 
/* SVN FILE: $Id$ */
/* Sample Fixture generated on: 2010-04-28 13:59:17 : 1272455957*/

class SampleFixture extends CakeTestFixture {
	var $name = 'Sample';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'timepoint_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'derives_from' => array('type'=>'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'amount' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'person_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'description' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 45),
		'created' => array('type'=>'timestamp', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_samples_timepoints1' => array('column' => 'timepoint_id', 'unique' => 0), 'fk_samples_people1' => array('column' => 'person_id', 'unique' => 0), 'fk_samples_samples1' => array('column' => 'derives_from', 'unique' => 0))
	);
	var $records = array(array(
		'id' => 'Lorem ipsum dolor sit amet',
		'name' => 1,
		'timepoint_id' => 1,
		'derives_from' => 'Lorem ipsum dolor sit amet',
		'amount' => 1,
		'person_id' => 1,
		'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'type' => 'Lorem ipsum dolor sit amet',
		'created' => 'NOW()'
	));
}
?>
