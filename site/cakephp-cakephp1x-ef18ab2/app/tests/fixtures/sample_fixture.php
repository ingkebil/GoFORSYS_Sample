<?php 
/* SVN FILE: $Id$ */
/* Sample Fixture generated on: 2010-04-21 17:35:27 : 1271864127*/

class SampleFixture extends CakeTestFixture {
	var $name = 'Sample';
	var $table = 'samples';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'sample_id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'key' => 'unique'),
		'timepoint_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'derives_from' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'amount' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'person_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'description' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 45),
		'created' => array('type'=>'timestamp', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'sample_id_UNIQUE' => array('column' => 'sample_id', 'unique' => 1), 'fk_samples_samples' => array('column' => 'derives_from', 'unique' => 0), 'fk_samples_timepoints1' => array('column' => 'timepoint_id', 'unique' => 0), 'fk_samples_people1' => array('column' => 'person_id', 'unique' => 0))
	);
	var $records = array(array(
		'id' => 1,
		'sample_id' => 'Lorem ipsum dolor sit amet',
		'timepoint_id' => 1,
		'derives_from' => 1,
		'amount' => 1,
		'person_id' => 1,
		'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'type' => 'Lorem ipsum dolor sit amet',
		'created' => 'Lorem ipsum dolor sit amet'
	));
}
?>