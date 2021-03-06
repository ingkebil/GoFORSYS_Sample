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

    function findCurExperimentId() {
        $exp = $this->query(
            "SELECT Experiment.id FROM experiments AS Experiment
            JOIN fermenters AS Fermenter ON Experiment.id = Fermenter.experiment_id
            JOIN timepoints AS Timepoint ON Fermenter.id = Timepoint.fermenter_id
            WHERE Timepoint.when < '" . date('Y/m/d H:i:s') . "'
            LIMIT 1");

        if (!$exp) {
            return false;
        }
        return $exp[0]['Experiment']['id'];
    }

    /**
     * Find timepoints per fermenter and orders them like this:
     * date => fementer name => time => (tp, diff with start experiment)
     *
     * @param int $exp_id optional parameter denoting the experiment of which you need the timepoints per fermenter. If not 
     * given, the current experiment (as found with 
     * $this->findCurExperimentId()) is used.
     * @return array the modified find('all') experiments array with above 
     * mentioned structure added
     */
    function findTPFermenter($exp_id) {
        if ($exp_id == null) {
            $exp_id = $this->findCurExperimentId();
        }
        $experiments = 
            $this->find('first', array(
                'conditions' => array('id' => $exp_id),
                'contain' => array('Fermenter.Timepoint')
            ));

        # get the startingpoint of an experiment
        App::import('model', 'Event');
        $this->Event = new Event();
        $events = $this->Event->findStarts($exp_id);

        $tps = array();
        $experiments['Timepoints'] = array();
        foreach ($experiments['Fermenter'] as $fermenter) {
            $cur_day = null;
            foreach($fermenter['Timepoint'] as $timepoint) {
                $day = date('l, d/m/Y', strtotime($timepoint['when']));
                if ($day != $cur_day) {
                    $cur_day = $day;
                    if (! array_key_exists( $cur_day, $tps)) {
                        $tps[ $cur_day ] = array();
                    }
                }
                if (! array_key_exists($fermenter['name'], $tps[ $cur_day ])) {
                    $tps[ $cur_day ][ $fermenter['name'] ] = array();
                }
                $date_diff = '';
                if (array_key_exists($fermenter['id'], $events)) {
                    $date_diff = $this->date_diff($timepoint['when'], $events[ $fermenter['id'] ]);
                }
                $tps[ $cur_day ]
                    [ $fermenter['name'] ]
                    [ date('H:i', strtotime($timepoint['when'])) ] = 
                    array('tp' => $timepoint['id'], 'diff' => $date_diff);
            }
            $experiments['Timepoints'] = array_merge($experiments['Timepoints'], $tps);
        }
        return $experiments;
    }

    /**
     * Calculates the difference between two date. Only used to calc the diff 
     * between a TP and the start of the experiment so we can denote a TP as 
     * '-24h to start' or '10m after start'. Only goes in two scales: hours 
     * and minutes, all the rest is 'ceiled'.
     *
     * @param int $start The start date parsable by strtotime.
     * @param int $end The end date parsable by strtotime. Default NOW.
     * @return string e.g. 24h10m 
     */
    function date_diff($start, $end="NOW") {
        $start_time = strtotime($start);
        $stop_time = strtotime($end);

        $diff_time = $start_time - $stop_time;

        if (abs($diff_time) < 3600) {
            return ceil($diff_time / 60) . 'm';
        }

        return ceil($diff_time / 3600) . 'h';
    }

}
?>
