<?php 
/* SVN FILE: $Id$ */
/* Sample Fixture generated on: 2010-03-23 12:50:11 : 1269345011*/

class SampleFixture extends CakeTestFixture {
	var $name = 'Sample';
	var $table = 'samples';
	var $fields = array(
		'id' => array('type'=>'string', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'fermenter_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'timepoint' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 6),
		'derives_from' => array('type'=>'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'amount' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'experiment_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'person_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'description' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'type' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 45),
		'date' => array('type'=>'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_samples_samples' => array('column' => 'derives_from', 'unique' => 0), 'fk_samples_experiments1' => array('column' => 'experiment_id', 'unique' => 0), 'fk_samples_fermenters1' => array('column' => 'fermenter_id', 'unique' => 0), 'fk_samples_people1' => array('column' => 'person_id', 'unique' => 0))
	);
	var $records = array(array(
		'id' => 'Lorem ipsum dolor sit amet',
		'fermenter_id' => 1,
		'timepoint' => 1,
		'derives_from' => 'Lorem ipsum dolor sit amet',
		'amount' => 1,
		'experiment_id' => 1,
		'person_id' => 1,
		'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
		'type' => 'Lorem ipsum dolor sit amet',
		'date' => 'Lorem ipsum dolor sit amet'
	));
}
?>