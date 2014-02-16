<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
    
    public $hasMany = [
        'Post'
    ];
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
        }
        return true;
    }

    
    public $validate = [
        'username' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'A username is required'
            ]
        ],
        'password' => [
            'required' => [
                'rule' => ['notEmpty'],
                'message' => 'A password is required'
            ]
        ],
        'role' => [
            'valid' => [
                'rule' => ['inList', ['admin', 'author']],
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            ]
        ]
    ];
}

