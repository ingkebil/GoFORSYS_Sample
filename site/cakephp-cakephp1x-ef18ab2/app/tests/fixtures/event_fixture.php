<?php
/* Event Fixture generated on: 2010-05-26 12:05:25 : 1274871265 */
class EventFixture extends CakeTestFixture {
	var $name = 'Event';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'timepoint_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'event' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_events_timepoints1' => array('column' => 'timepoint_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'timepoint_id' => 4,
			'event' => 'start',
			'description' => ''
		),
		array(
			'id' => 2,
			'timepoint_id' => 32,
			'event' => 'start',
			'description' => ''
		),
	);

    /*
     * PFFFF! test suite does not support enum? :/
     * So create your own table for each table that has
     * an enum and prevetn the test suite to create or drop it
     */
   # function create(&$db) {
   #     return true;
   # }

   # function drop(&$db) {
   #     return true;
   # }

}
?>
