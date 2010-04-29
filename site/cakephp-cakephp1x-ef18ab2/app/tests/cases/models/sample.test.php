<?php 
/* SVN FILE: $Id$ */
/* Sample Test cases generated on: 2010-04-28 13:59:21 : 1272455961*/
App::import('Model', 'Sample');

class SampleTestCase extends CakeTestCase {
	var $Sample = null;
	var $fixtures = array('app.sample', 'app.person');

	function startTest() {
		$this->Sample =& ClassRegistry::init('Sample');
	}

	function testSampleInstance() {
		$this->assertTrue(is_a($this->Sample, 'Sample'));
	}

    /**
     * To test if the MySQL Trigger to add generate the sample ID works
     *
     */
    function testCreateSampleIdTrigger() {
        $this->Sample->query('DELIMITER $$;');
        $this->Sample->query('
DROP TRIGGER /*!50033 IF EXISTS */ `create_sample_id` $$
CREATE TRIGGER `create_sample_id` BEFORE INSERT ON `samples`
FOR EACH ROW BEGIN
        SET @derives_from_tp = (SELECT timepoint_id FROM `samples` WHERE id = NEW.derives_from);
    IF @derives_from_tp IS NOT NULL THEN /* when your make a derived sample id */
        SET NEW.timepoint_id = @derives_from_tp;
        SET @name = (SELECT max(name) + 1 FROM `samples` WHERE derives_from = NEW.derives_from AND derives_from <> id);
        IF @name IS NULL THEN
            SET NEW.name = 1;
        ELSE
            SET NEW.name = @name;
        END IF;
        SET NEW.id = concat_ws("_", NEW.derives_from, NEW.name);
    ELSE /* a completely new (from the fermenter) sample id */
        SET @name = (SELECT max(name) + 1 FROM `samples` WHERE `timepoint_id` = NEW.`timepoint_id`);
        IF @name IS NULL THEN
            SET NEW.name = 1;
        ELSE
            SET NEW.name = @name;
        END IF;

        SET @ferm_name = (SELECT ferm.name FROM `fermenters` ferm
            JOIN `timepoints` tp ON ferm.id = tp.fermenter_id
            WHERE tp.id = NEW.timepoint_id);
        SET @exp_name = (SELECT exp.name FROM `experiments` exp
            JOIN `fermenters` ferm ON ferm.experiment_id = exp.id
            JOIN `timepoints` tp ON ferm.id = tp.fermenter_id   
            WHERE tp.id = NEW.timepoint_id);
        SET NEW.id = concat_ws("_",  @exp_name, @ferm_name, NEW.timepoint_id, NEW.name);

        IF @derives_from_tp IS NULL THEN
            SET NEW.derives_from = NEW.id;
        END IF;
    END IF;
END;

');

        $this->Sample->save(array(
            'Sample' => array(
                'timepoint' => 1,
                'amount' => 10,
                'person_id' => 1
            )
        ));

        #$result1 = $this->Sample->find('first', array('conditions' => array('Sample.id' => '2_3_1_1')));
        $result1 = $this->Sample->find('all');
        pr($result1);
        $expected1 = array(
            'Sample' => array(
                'id' => '2_3_1_1',
                'name' => 1,
                'timepoint_id' => 1,
                'derives_from' => '2_3_1_1',
                'amount' => 10,
                'person_id' => 1,
                'description' => '',
                'type' => '',
                'created' => $result1['Sample']['created'] # I'm sorry, but I'm not interested if the date is inserted correctly
            )
        );
        $this->assertEqual($result1, $expected1);
    }

	function testSampleFind() {
		$this->Sample->recursive = -1;
		$results = $this->Sample->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Sample' => array(
			'id' => 'Lorem ipsum dolor sit amet',
			'name' => 1,
			'timepoint_id' => 1,
			'derives_from' => 'Lorem ipsum dolor sit amet',
			'amount' => 1,
			'person_id' => 1,
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 'Lorem ipsum dolor sit amet',
			'created' => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>
