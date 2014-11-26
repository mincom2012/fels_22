<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

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
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => __('A username is required')
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => __('A password is required')
            )
        ),
        'newPassword' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => __('A password is required')
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => __('A email is required')
            )
        ),
        'confirmPassword' => array(
            'required' => array(
                'rule' => array('notEmpty'), 
                'message' => __('Please confirm your password')
            ),
            'compare' => array(
                'rule' => array('validatePasswords'),
                'message' => __('The passwords you entered do not match.')
            )
        ),
        'currentPassword' => array(
            'required' => array(
                'rule' => array('notEmpty'), 
                'message' => __('Please confirm new password')
            ),
            'compare' => array(
                'rule' => array('checkPassword'),
                'message' => __('The passwords you entered do not match with current password.')
            )
        ),
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

    // Validate confirm password
    public function validatePasswords() {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirmPassword'];
    }

    // Check current password
    public function checkPassword() {
        $currentPassword = AuthComponent::password($this->data[$this->alias]['currentPassword']);
        return $currentPassword === $this->Auth->user('password');
    }

    // Count learned words
    public function countLearnedWord($id) {
        $learned = $this->User->LessonDetail->find('all', 
            array(
                'conditions' => array(
                    'LessonDetail.user_id' => $id
                ),
                'fields' => 'LessonDetail.word_id'
            )
        );

        $wordIds = [];
        foreach ($learned as $word) {
            $wordIds[] = $word['LessonDetail']['word_id'];
        }
        $wordIds = array_unique($wordIds);
        return count($wordIds);
    }
}
