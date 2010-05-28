<?php
/* Timepoint Fixture generated on: 2010-05-25 14:05:03 : 1274791503 */
class TimepointFixture extends CakeTestFixture {
	var $name = 'Timepoint';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5),
		'when' => array('type' => 'timestamp', 'null' => true, 'default' => NULL),
		'fermenter_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_timepoints_fermenters1' => array('column' => 'fermenter_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 1,
			'when' => '2010-04-19 09:00:00',
			'fermenter_id' => 1
		),
		array(
			'id' => 2,
			'name' => 2,
			'when' => '2010-04-19 13:00:00',
			'fermenter_id' => 1
		),
		array(
			'id' => 3,
			'name' => 3,
			'when' => '2010-04-19 21:00:00',
			'fermenter_id' => 1
		),
		array(
			'id' => 4,
			'name' => 4,
			'when' => '2010-04-20 09:00:00',
			'fermenter_id' => 1
		),
		array(
			'id' => 5,
			'name' => 5,
			'when' => '2010-04-20 09:10:00',
			'fermenter_id' => 1
		),
		array(
			'id' => 6,
			'name' => 6,
			'when' => '2010-04-20 09:20:00',
			'fermenter_id' => 2
		),
		array(
			'id' => 7,
			'name' => 7,
			'when' => '2010-04-20 10:00:00',
			'fermenter_id' => 2
		),
		array(
			'id' => 8,
			'name' => 8,
			'when' => '2010-04-20 11:00:00',
			'fermenter_id' => 2
		),
		array(
			'id' => 9,
			'name' => 9,
			'when' => '2010-04-20 13:00:00',
			'fermenter_id' => 2
		),
		array(
			'id' => 10,
			'name' => 10,
			'when' => '2010-04-20 21:00:00',
			'fermenter_id' => 2
		),
	);
}
?>
