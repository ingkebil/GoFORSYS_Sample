<?php
/* Tooltip Fixture generated on: 2010-05-25 15:05:50 : 1274793650 */
class TooltipFixture extends CakeTestFixture {
	var $name = 'Tooltip';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'element_class' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45),
		'tooltip' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'readmore_link' => array('type' => 'string', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'element_class' => 'experiment_name',
			'tooltip' => 'This is the experiment id which is used as the first part in the generation of the sample ID.',
			'readmore_link' => 'http://gent/dokuwiki/goforsys:sampleids'
		),
		array(
			'id' => 2,
			'element_class' => 'sample_id',
			'tooltip' => 'A sample ID is nice way of naming samples throughout a project',
			'readmore_link' => 'http://gent/dokuwiki/goforsys:sampleids'
		),
		array(
			'id' => 3,
			'element_class' => 'fermenter_name',
			'tooltip' => 'This is the name of the fermenter during the experiment.',
			'readmore_link' => ''
		),
		array(
			'id' => 4,
			'element_class' => 'derives_from',
			'tooltip' => 'The sample ID from which this sample derives. This mostly will be the \'fermenter\' when the sample does not derive from any other sample.',
			'readmore_link' => 'http://gent/dokuwiki/goforsys:sampleids'
		),
	);
}
?>