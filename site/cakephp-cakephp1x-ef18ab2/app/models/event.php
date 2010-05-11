<?php
class Event extends AppModel {

	var $name = 'Event';
	var $validate = array(
		'timepoint_id' => array('numeric'),
		'fermenter_id' => array('numeric')
	);
    var $actsAs = array('Containable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
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
    function findStarts($experiment_id) {
        App::import('model', 'Experiment');
        $this->Experiment = new Experiment();
        if (!$experiment_id) {
            $experiment_id = $this->Experiment->findCurExperimentId();
        }
        App::import('Sanitize');
        $experiment_id = Sanitize::escape($experiment_id, 'default');
        $tps = $this->Experiment->query(
            "SELECT Fermenter.id, Timepoint.when FROM experiments Experiment
            JOIN fermenters AS Fermenter ON Experiment.id = Fermenter.experiment_id
            JOIN timepoints AS Timepoint ON Fermenter.id  = Timepoint.fermenter_id
            JOIN events     AS Event     ON Timepoint.id  = Event.timepoint_id
            WHERE Experiment.id = $experiment_id"
        );


        $starts = array();
        foreach ($tps as $tp) {
            $starts[ $tp['Fermenter']['id'] ] = $tp['Timepoint']['when'];
        }

        return $starts;
    }

}
?>
