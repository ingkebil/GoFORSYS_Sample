<?php
/* Fermenter Test cases generated on: 2010-05-25 14:05:05 : 1274791385*/
App::import('Model', 'Fermenter');

class FermenterTestCase extends CakeTestCase {
	var $fixtures = array('app.fermenter', 'app.experiment', 'app.timepoint', 'app.event', 'app.sample', 'app.person');

	function startTest() {
		$this->Fermenter =& ClassRegistry::init('Fermenter');
	}

	function endTest() {
		unset($this->Fermenter);
		ClassRegistry::flush();
	}

	function testFindStart() {
        $result = $this->Fermenter->findStart(1);
        $expected = '2010-04-20 09:00:00';

        $this->assertEqual($result, $expected);
	}

    function testFindStarts() {
		$this->Person =& ClassRegistry::init('Person');
        $tps = $this->Person->find('first', array('conditions' => array('Person.id' => 1), 'contain' => array('Sample.Timepoint')));

        $result = $this->Fermenter->findStarts($tps);
        $expected = array(
            1 => '2010-04-20 09:00:00',
            2 => '2010-04-20 11:00:00'
        );

        $this->assertEqual($result, $expected);
    }

    function test__find_fermenter_id() {
		$this->Person =& ClassRegistry::init('Person');
        $tps = $this->Person->find('first', array('conditions' => array('Person.id' => 1), 'contain' => array('Sample.Timepoint')));

        $result = $this->Fermenter->__find_fermenter_ids($tps);
        $expected = array(1 => 1, 2 => 1);

        $this->assertEqual($result, $expected);
    }

}
?>
