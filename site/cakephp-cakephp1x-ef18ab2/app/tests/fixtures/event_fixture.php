<?php 
/* SVN FILE: $Id$ */
/* Event Fixture generated on: 2010-04-21 14:19:33 : 1271852373*/

class EventFixture extends CakeTestFixture {
	var $name = 'Event';
	var $table = 'events';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'timepoint_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'experiment_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'description' => array('type'=>'text', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_experiment_timepoint_experiments1' => array('column' => 'experiment_id', 'unique' => 0), 'fk_experiment_timepoint_timepoints1' => array('column' => 'timepoint_id', 'unique' => 0))
	);
	var $records = array(array(
		'id' => 1,
		'timepoint_id' => 1,
		'experiment_id' => 1,
		'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
	));
}
?>