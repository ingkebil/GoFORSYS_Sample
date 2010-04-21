<?php
class Sample extends AppModel {

	var $name = 'Sample';
	var $validate = array(
		'sample_id' => array('notempty'),
		'timepoint_id' => array('numeric'),
		'derives_from' => array('numeric'),
		'amount' => array('numeric'),
		'person_id' => array('numeric'),
		'type' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'ParentSample' => array(
			'className' => 'Sample',
			'foreignKey' => 'sample_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Timepoint' => array(
			'className' => 'Timepoint',
			'foreignKey' => 'timepoint_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Person' => array(
			'className' => 'Person',
			'foreignKey' => 'person_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'ChildSample' => array(
			'className' => 'Sample',
			'foreignKey' => 'sample_id',
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
