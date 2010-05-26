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
    function findStarts($experiment_id, $event = 'start') {
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

}
?>
