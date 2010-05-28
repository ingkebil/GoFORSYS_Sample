<?php
/* Sample Fixture generated on: 2010-05-25 14:05:51 : 1274791491 */
class SampleFixture extends CakeTestFixture {
	var $name = 'Sample';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'timepoint_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'derives_from' => array('type' => 'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'amount' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'person_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'created' => array('type' => 'timestamp', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_samples_timepoints1' => array('column' => 'timepoint_id', 'unique' => 0), 'fk_samples_people1' => array('column' => 'person_id', 'unique' => 0), 'fk_samples_samples1' => array('column' => 'derives_from', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => '2_3_1_1',
			'name' => 1,
			'timepoint_id' => 1,
			'derives_from' => '2_3_1_1',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-04-29 17:01:06'
		),
		array(
			'id' => '2_3_2_10',
			'name' => 10,
			'timepoint_id' => 2,
			'derives_from' => '2_3_2_10',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-04-30 13:30:00'
		),
		array(
			'id' => '2_3_3_11',
			'name' => 11,
			'timepoint_id' => 3,
			'derives_from' => '2_3_3_11',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-04-30 13:30:13'
		),
		array(
			'id' => '2_3_4_12',
			'name' => 12,
			'timepoint_id' => 4,
			'derives_from' => '2_3_4_12',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-05-03 10:09:51'
		),
		array(
			'id' => '2_3_5_13',
			'name' => 13,
			'timepoint_id' => 5,
			'derives_from' => '2_3_5_13',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-05-03 10:11:46'
		),
		array(
			'id' => '2_3_6_14',
			'name' => 14,
			'timepoint_id' => 6,
			'derives_from' => '2_3_6_14',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-05-11 12:51:27'
		),
		array(
			'id' => '2_3_7_15',
			'name' => 15,
			'timepoint_id' => 7,
			'derives_from' => '2_3_7_15',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-05-19 13:07:55'
		),
		array(
			'id' => '2_3_8_16',
			'name' => 16,
			'timepoint_id' => 8,
			'derives_from' => '2_3_8_16',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-05-19 15:34:26'
		),
		array(
			'id' => '2_3_9_2',
			'name' => 2,
			'timepoint_id' => 9,
			'derives_from' => '2_3_9_2',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-04-30 13:20:45'
		),
		array(
			'id' => '2_3_10_3',
			'name' => 3,
			'timepoint_id' => 10,
			'derives_from' => '2_3_10_3',
			'amount' => 10,
			'person_id' => 1,
			'created' => '2010-04-30 13:21:32'
		),
	);
}
?>
