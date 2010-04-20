<?php
class Timepoint extends AppModel {

	var $name = 'Timepoint';
	var $validate = array(
		'name' => array('rule' => 'numeric', 'required' => true, 'message' => 'Should be numeric!'),
		'fermenter_id' => array('numeric'),
		'experiment_id' => array('numeric')
	);
    var $actsAs = array('Containable');

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
		)
	);

	var $hasMany = array(
		'Sample' => array(
			'className' => 'Sample',
			'foreignKey' => 'timepoint_id',
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

    /**
     * Creates many timepoints based on a string and one date. The string represents the timepoints around the given date.
     *
     * @param timepoints string "-24h,-20h,-12h,0,10m,168h10m". Following strings are accepted: 3d, 20h, 10m, 15s and any combination of this; 126h10m, 10d20m15s
     * @param date string the date around which we should represent the timepoints
     *
     */
    function createMany($data) {
        $units = array('d' => 'DAY', 'h' => 'HOUR', 'm' => 'MINUTE', 's' => 'SECOND');
        $db =& ConnectionManager::getDataSource($this->useDbConfig);
        $tp_num = 0;

        $date = $db->value($this->deconstruct('when', $data[$this->alias]['date']));

        # we're gonna create one array for all records, so we can use a transaction
        $timepoints = array();
        $tps = preg_split('/,|\n/', $data[$this->alias]['timepoints']);
        foreach ($tps as $tp) {
            preg_match_all('/(?P<sign>-*)(?P<num>\d+)(?P<unit>h|m|s|d)*/', $tp, $matches);

            $unit = array();
            $expressions = array();
            for($i = 0; $i < count($matches['num']); $i++) {
                $expressions[] = sprintf('%s%d', $matches['sign'][$i], $matches['num'][$i]);
                    $u = @$units[ $matches['unit'][$i] ];
                    $unit[] = $u ? $u : 'HOUR';
            }
            $expression = implode(' ', $expressions);
            if (count($expressions) > 1) {
                $expression = "'" . $expression . "'";
            }
            $unit = implode('_', $unit);
            $expression = sprintf("DATE_ADD(%s, INTERVAL %s %s)", $date, $expression, $unit);

            $current['when']      = $db->expression($expression);
            $current['name'] = ++$tp_num;
            $current['fermenter_id'] = $data[$this->alias]['fermenter_id'];
            $current['experiment_id'] = $data[$this->alias]['experiment_id'];
            $timepoints[] = $current;
        }

        return $this->saveAll($timepoints);
    }

}
?>
