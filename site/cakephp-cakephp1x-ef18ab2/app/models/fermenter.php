<?php
class Fermenter extends AppModel {

	var $name = 'Fermenter';
	var $validate = array(
		'name' => array('rule' => 'numeric', 'required' => true, 'message' => 'Should be numeric!'),
		'experiment_id' => array('numeric')
	);
    var $actsAs = array('containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Experiment' => array(
			'className' => 'Experiment',
			'foreignKey' => 'experiment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Timepoint' => array(
			'className' => 'Timepoint',
			'foreignKey' => 'fermenter_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => array('when' => 'ASC'),
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

    function findStart($id) {
        $tps = $this->find('first', array('conditions' => array('Event.event' => 'start'), 'contain' => array('Timepoint.Event')));
    }

}
?>
