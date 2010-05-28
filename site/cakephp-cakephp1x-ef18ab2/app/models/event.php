<?php
class Event extends AppModel {

	var $name = 'Event';
	var $validate = array(
		'timepoint_id' => array('numeric'),
		'fermenter_id' => array('numeric')
	);
    var $actsAs = array('Containable');

	var $belongsTo = array(
		'Timepoint' => array(
			'className' => 'Timepoint',
			'foreignKey' => 'timepoint_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

    /**
     * Returns all TPs that have as event 'start'.
     *
     * @param int experiment_id
     * @return array [fermenter_id] => [Timepoint.when]
     */
    function findStarts($experiment_id = null, $event = 'start') {
        if (!$experiment_id) {
            App::import('model', 'Experiment');
            $this->Experiment = new Experiment();
            $experiment_id = $this->Experiment->findCurExperimentId();
        }
        
        $tps = $this->find('all', array(
            'conditions' => array(
                'Fermenter.experiment_id' => $experiment_id,
                'Event.event' => $event
            ),
            'fields' => array('Fermenter.id', 'Timepoint.when'),
            'contain' => false,
            'joins' => array(
                array(
                    'table' => 'timepoints',
                    'alias' => 'Timepoint',
                    'conditions' => array('Event.timepoint_id = Timepoint.id')
                ),
                array(
                    'table' => 'fermenters',
                    'alias' => 'Fermenter',
                    'conditions' => array('Timepoint.fermenter_id = Fermenter.id')
                )
            )
        ));

        $starts = array();
        foreach ($tps as $tp) {
            $starts[ $tp['Fermenter']['id'] ] = $tp['Timepoint']['when'];
        }

        return $starts;
    }

    /**
     * Given an array, this func will traverse recursively over each member, 
     * check if keys 'when' and 'fermenter_id' are set, and insert a new 
     * key=>value on that level with the calculated difference between when 
     * and Event.when. Event.when is picked according to the associated 
     * fermenter's 'start' event.
     *
     * @param array The timepoints
     */
    function calcDiffs(&$tps) {
        if (is_array($tps)) {
            if (array_key_exists('fermenter_id', $tps) && array_key_exists('when', $tps)) {
                $start = $this->Timepoint->Fermenter->findStart($tps['fermenter_id']);
                $tps['diff'] = strtotime($tps['when']) - strtotime($start);
            }
            else {
                foreach ($tps as &$tp) {
                    $this->calcDiffs($tp);
                }
            }
        }

        return $tps;
    }

}
?>
