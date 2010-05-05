<?php

class Sample extends AppModel {

    var $name = 'Sample';
    var $validate = array(
        'id' => array('notempty'),
        'name' => array('notempty'),
        'timepoint_id' => array(
            'rule' => 'numeric',
            'required' => true,
            'message' => 'A timepoint is required!'
        ),
        'derives_from' => array('notempty'),
        'amount' => array(
            'rule' => 'numeric',
            'required' => true,
            'message' => 'Please specify an amount'
        ),
        'person_id' => array(
            'rule' => 'numeric',
            'required' => true,
            'message' => 'Please give a name'
        ),
        'type' => array('notempty')
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
        'ParentSample' => array(
            'className' => 'Sample',
            'foreignKey' => 'id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Timepoint' => array(
            'className' => 'Timepoint',
            'foreignKey' => 'timepoint_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Person' => array(
            'className' => 'Person',
            'foreignKey' => 'person_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    var $hasMany = array(
        'ChildSample' => array(
            'className' => 'Sample',
            'foreignKey' => 'id',
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

    var $actsAs = array('containable');

    function __construct($id = false, $table = null, $ds = null) {
        parent::__construct($id, $table, $ds);
        $this->virtualFields = array(
            'derives_from_name' => sprintf('IF(%s.id = %s.derives_from, "Fermenter", %s.derives_from)', $this->alias, $this->alias, $this->alias)
        );
    }

}
?>
