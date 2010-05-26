<?php
/* Person Fixture generated on: 2010-05-25 14:05:44 : 1274791484 */
class PersonFixture extends CakeTestFixture {
	var $name = 'Person';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'lastname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'lastname' => 'Billiau'
		),
		array(
			'id' => 2,
			'lastname' => 'Irgang'
		),
		array(
			'id' => 3,
			'lastname' => 'Hemme'
		),
	);
}
?>