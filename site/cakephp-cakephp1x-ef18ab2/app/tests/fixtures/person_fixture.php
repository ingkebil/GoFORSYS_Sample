<?php 
/* SVN FILE: $Id$ */
/* Person Fixture generated on: 2010-03-23 12:48:19 : 1269344899*/

class PersonFixture extends CakeTestFixture {
	var $name = 'Person';
	var $table = 'people';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'lastname' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 45),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id' => 1,
		'lastname' => 'Lorem ipsum dolor sit amet'
	));
}
?>