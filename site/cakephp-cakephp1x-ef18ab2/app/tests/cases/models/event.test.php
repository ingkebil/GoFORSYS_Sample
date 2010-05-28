<?php
/* Event Test cases generated on: 2010-05-25 11:05:35 : 1274778575*/
App::import('Model', 'Event');

class EventTestCase extends CakeTestCase {
    var $fixtures = array('app.event', 'app.timepoint', 'app.fermenter', 'app.experiment', 'app.sample', 'app.person');

    function startTest() {
        $this->Event =& ClassRegistry::init('Event');
    }

    function endTest() {
        unset($this->Event);
        ClassRegistry::flush();
    }

    function testFindStart() {
        $this->Event =& ClassRegistry::init('Event');

        $exp_id = 2;
        $result = $this->Event->findStarts(2);
        $expected = array(
            1 => '2010-04-20 09:00:00',
            2 => '2010-04-20 11:00:00',
        );

        $this->assertEqual($result, $expected);
    }

    function testCalcDiff() {
        $this->Person =& ClassRegistry::init('Person');
        $result = $this->Event->calcDiffs($this->Person->find('first', array('conditions' => array('Person.id' => 1), 'contain' => array('Sample.Timepoint'))));

        $expected = array('Person' => 
            array (
                'id' => '1',
                'lastname' => 'Billiau',
            ),
            'Sample' => array (
                0 => array (
                    'id' => '2_3_10_3',
                    'name' => '3',
                    'timepoint_id' => '10',
                    'derives_from' => '2_3_10_3',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-04-30 13:21:32',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => array (
                        'id' => '10',
                        'name' => '10',
                        'when' => '2010-04-20 21:00:00',
                        'fermenter_id' => '2',
                        'diff' => 36000,
                    ),
                ),
                1 => 
                array (
                    'id' => '2_3_1_1',
                    'name' => '1',
                    'timepoint_id' => '1',
                    'derives_from' => '2_3_1_1',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-04-29 17:01:06',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => 
                    array (
                        'id' => '1',
                        'name' => '1',
                        'when' => '2010-04-19 09:00:00',
                        'fermenter_id' => '1',
                        'diff' => -86400,
                    ),
                ),
                2 => 
                array (
                    'id' => '2_3_2_10',
                    'name' => '10',
                    'timepoint_id' => '2',
                    'derives_from' => '2_3_2_10',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-04-30 13:30:00',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => 
                    array (
                        'id' => '2',
                        'name' => '2',
                        'when' => '2010-04-19 13:00:00',
                        'fermenter_id' => '1',
                        'diff' => -72000,
                    ),
                ),
                3 => 
                array (
                    'id' => '2_3_3_11',
                    'name' => '11',
                    'timepoint_id' => '3',
                    'derives_from' => '2_3_3_11',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-04-30 13:30:13',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => 
                    array (
                        'id' => '3',
                        'name' => '3',
                        'when' => '2010-04-19 21:00:00',
                        'fermenter_id' => '1',
                        'diff' => -43200,
                    ),
                ),
                4 => 
                array (
                    'id' => '2_3_4_12',
                    'name' => '12',
                    'timepoint_id' => '4',
                    'derives_from' => '2_3_4_12',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-05-03 10:09:51',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => 
                    array (
                        'id' => '4',
                        'name' => '4',
                        'when' => '2010-04-20 09:00:00',
                        'fermenter_id' => '1',
                        'diff' => 0,
                    ),
                ),
                5 => 
                array (
                    'id' => '2_3_5_13',
                    'name' => '13',
                    'timepoint_id' => '5',
                    'derives_from' => '2_3_5_13',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-05-03 10:11:46',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => 
                    array (
                        'id' => '5',
                        'name' => '5',
                        'when' => '2010-04-20 09:10:00',
                        'fermenter_id' => '1',
                        'diff' => 600,
                    ),
                ),
                6 => 
                array (
                    'id' => '2_3_6_14',
                    'name' => '14',
                    'timepoint_id' => '6',
                    'derives_from' => '2_3_6_14',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-05-11 12:51:27',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => 
                    array (
                        'id' => '6',
                        'name' => '6',
                        'when' => '2010-04-20 09:20:00',
                        'fermenter_id' => '2',
                        'diff' => -6000,
                    ),
                ),
                7 => 
                array (
                    'id' => '2_3_7_15',
                    'name' => '15',
                    'timepoint_id' => '7',
                    'derives_from' => '2_3_7_15',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-05-19 13:07:55',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => 
                    array (
                        'id' => '7',
                        'name' => '7',
                        'when' => '2010-04-20 10:00:00',
                        'fermenter_id' => '2',
                        'diff' => -3600,
                    ),
                ),
                8 => 
                array (
                    'id' => '2_3_8_16',
                    'name' => '16',
                    'timepoint_id' => '8',
                    'derives_from' => '2_3_8_16',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-05-19 15:34:26',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => 
                    array (
                        'id' => '8',
                        'name' => '8',
                        'when' => '2010-04-20 11:00:00',
                        'fermenter_id' => '2',
                        'diff' => 0,
                    ),
                ),
                9 => 
                array (
                    'id' => '2_3_9_2',
                    'name' => '2',
                    'timepoint_id' => '9',
                    'derives_from' => '2_3_9_2',
                    'amount' => '10',
                    'person_id' => '1',
                    'created' => '2010-04-30 13:20:45',
                    'derives_from_name' => 'Fermenter',
                    'Timepoint' => 
                    array (
                        'id' => '9',
                        'name' => '9',
                        'when' => '2010-04-20 13:00:00',
                        'fermenter_id' => '2',
                        'diff' => 7200,
                    ),
                ),
            ),
        );

        $this->assertEqual($result, $expected);
    }


}
?>
