<?php
class Sample extends AppModel {

	var $name = 'Sample';
	var $validate = array(
		'fermenter_id' => array('numeric'),
		'timepoint' => array('numeric'),
		'derives_from' => array('notempty'),
		'amount' => array('numeric'),
		'experiment_id' => array('numeric'),
		'person_id' => array('numeric'),
		'type' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Fermenter' => array(
			'className' => 'Fermenter',
			'foreignKey' => 'fermenter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Experiment' => array(
			'className' => 'Experiment',
			'foreignKey' => 'experiment_id',
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

}
?>