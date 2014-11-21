<?php
/**
 * CategoryFixture
 *
 */
class CategoryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'category_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'updated_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'category_id', 'unique' => 1),
			'id' => array('column' => 'category_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'category_id' => 1,
			'category_name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'created_date' => '2014-11-21',
			'updated_date' => '2014-11-21'
		),
	);

}
