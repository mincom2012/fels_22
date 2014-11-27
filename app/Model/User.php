<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property User $User
 * @property LessonDetail $LessonDetail
 * @property Lesson $Lesson
 */
class User extends AppModel {


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
        'user_name' => array(
            'required' => true,
            'rule' => array('notEmpty'),
            'message' => 'A username is required'
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'email' => array(
            'required' => 'true',
            'rule' => 'email',
            'message' => 'A Email is required'
        )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'LessonDetail' => array(
			'className' => 'LessonDetail',
			'foreignKey' => 'user_id',
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
		'Lesson' => array(
			'className' => 'Lesson',
			'foreignKey' => 'user_id',
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

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

}
