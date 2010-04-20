<?php
class Experiment extends AppModel {

	var $name = 'Experiment';
	var $validate = array(
		'description' => array('notempty'),
		'name' => array('notempty')
	);
    var $uses = array('Timepoint');

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
		),
		'Sample' => array(
			'className' => 'Sample',
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


    function findCurExperiment() {
        App::import('model','Timepoint');
        $timepoint = new Timepoint();
        return $timepoint->find('first', array('conditions' => array('Timepoint.when <' => date('Y/m/d'))));
    }
}
?>
