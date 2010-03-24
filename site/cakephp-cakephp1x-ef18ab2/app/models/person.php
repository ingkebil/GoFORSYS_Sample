<?php
class Person extends AppModel {

	var $name = 'Person';
	var $validate = array(
		'lastname' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Sample' => array(
			'className' => 'Sample',
			'foreignKey' => 'person_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>