<?php
class Experiment extends AppModel {

	var $name = 'Experiment';
	var $validate = array(
		'description' => array('notempty'),
		'name' => array('rule' => 'numeric', 'required' => true, 'message' => 'Should be numeric!')
	);
    var $actsAs = array('containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'experiment_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Fermenter' => array(
			'className' => 'Fermenter',
			'foreignKey' => 'experiment_id',
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

    var $hasAndBelongsToMany = array(
        'Timepoint' => array(
            'className' => 'Timepoint',
            'joinTable' => 'events',
            'foreignKey' => 'experiment_id',
            'associationForeignKey' => 'timepoint_id',
            'unique' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'deleteQuery' => '',
            'insertQuery' => ''
        )
    );

    function findCurExperiment() {
        return $this->Event->find('first', array('conditions' => array('Timepoint.when <' => date('Y/m/d H:i:s')), 'order' => array('when' => 'ASC')));
    }
}
?>
