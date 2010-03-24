<?php
class Fermenter extends AppModel {

	var $name = 'Fermenter';
	var $validate = array(
		'description' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Sample' => array(
			'className' => 'Sample',
			'foreignKey' => 'fermenter_id',
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