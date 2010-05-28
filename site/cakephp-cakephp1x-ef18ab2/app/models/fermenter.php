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

    function findStart($id, $event = 'start') {
        $tp = $this->find('first', array(
            'conditions' => array(
                'Fermenter.id' => $id,
                'Event.event' => $event
            ),
            'fields' => array('Timepoint.when'),
            'contain' => false,
            'joins' => array(
                array(
                    'table' => 'timepoints',
                    'alias' => 'Timepoint',
                    'conditions' => array('Fermenter.id = Timepoint.fermenter_id')
                ),
                array(
                    'table' => 'events',
                    'alias' => 'Event',
                    'conditions' => array('Event.timepoint_id = Timepoint.id')
                )
            )
        ));

        if (isset($tp['Timepoint']['when'])) {
            return $tp['Timepoint']['when'];
        }
        return false;
    }

    function findStarts($tps, $event = 'start') {
        # first find all the mentions of fermenter_ids
        $fermenter_ids = $this->__find_fermenter_ids($tps);

        # now for each fermenter, find the start date
        $starts = array();
        foreach ($fermenter_ids as $id => $n) {
            $starts[ $id ] = $this->findStart($id, $event);
        }

        return $starts;
    }

    function __find_fermenter_ids($tps) {
        $ferm_ids = array();
        if (is_array($tps)) {
            if (array_key_exists('fermenter_id', $tps)) {
                $ferm_ids = array($tps['fermenter_id'] => 1);
            }
            else {
                foreach ($tps as $key => $tp) {
                    $ferm_ids = array_replace($ferm_ids, $this->__find_fermenter_ids($tp));
                }
            }
        }


        return $ferm_ids;
    }

}
?>
