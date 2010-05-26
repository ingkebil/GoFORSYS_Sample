<?php
/* Fermenter Fixture generated on: 2010-05-25 14:05:56 : 1274791376 */
class FermenterFixture extends CakeTestFixture {
	var $name = 'Fermenter';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 5),
		'experiment_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_fermenters_experiments1' => array('column' => 'experiment_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'description' => 'LL-HL/HL-LL experiment\r\nFrom Monday 19th until Friday 30th of April',
			'name' => 3,
			'experiment_id' => 2
		),
		array(
			'id' => 2,
			'description' => 'LL-HL/HL-LL experiment\r\nFrom Wednesday 21th until May 2nd',
			'name' => 4,
			'experiment_id' => 2
		),
	);
}
?>