<?php
/* Experiment Fixture generated on: 2010-05-25 12:05:17 : 1274784437 */
class ExperimentFixture extends CakeTestFixture {
	var $name = 'Experiment';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45),
		'name' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'description' => 'First Core Experiment',
			'name' => 1
		),
		array(
			'id' => 2,
			'description' => 'Second Core Experiment',
			'name' => 2
		),
	);
}
?>