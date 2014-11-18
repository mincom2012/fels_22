<?php
App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property Category $Category
 * @property LessonDetail $LessonDetail
 * @property Lesson $Lesson
 * @property Word $Word
 */
class Category extends AppModel
{
    public $primaryKey = 'category_id';
    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'category_id' => array(
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
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
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
        'LessonDetail' => array(
            'className' => 'LessonDetail',
            'foreignKey' => 'category_id',
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
            'foreignKey' => 'category_id',
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
        'Word' => array(
            'className' => 'Word',
            'foreignKey' => 'category_id',
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

}
