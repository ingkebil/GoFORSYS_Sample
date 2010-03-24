<?php 
/* SVN FILE: $Id$ */
/* Fermenter Fixture generated on: 2010-03-23 12:48:01 : 1269344881*/

class FermenterFixture extends CakeTestFixture {
	var $name = 'Fermenter';
	var $table = 'fermenters';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'description' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'description' => 'Lorem ipsum dolor sit amet'
	));
}
?>