<?php
class Event extends AppModel {

	var $name = 'Event';
	var $validate = array(
		'timepoint_id' => array('numeric'),
		'experiment_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Timepoint' => array(
			'className' => 'Timepoint',
			'foreignKey' => 'timepoint_id',
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
		)
	);

}
?>