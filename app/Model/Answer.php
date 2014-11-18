<?php
App::uses('AppModel', 'Model');
/**
 * Answer Model
 *
 * @property Answer $Answer
 * @property Word $Word
 */
class Answer extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'is_correct' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'word_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Word' => array(
			'className' => 'Word',
			'foreignKey' => 'word_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
