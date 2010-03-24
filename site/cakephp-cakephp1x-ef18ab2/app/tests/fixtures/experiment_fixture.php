<?php 
/* SVN FILE: $Id$ */
/* Experiment Fixture generated on: 2010-03-23 12:47:33 : 1269344853*/

class ExperimentFixture extends CakeTestFixture {
	var $name = 'Experiment';
	var $table = 'experiments';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'description' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 45),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'description' => 'Lorem ipsum dolor sit amet'
	));
}
?>