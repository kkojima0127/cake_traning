<?php
class Post extends AppModel {
    
    public $belongsTo = [
        'User'
    ];
    
    public $validate = [
        'title' => [
            'rule' => 'notEmpty'
        ],
        'body' => [
            'rule' => 'notEmpty'
        ],
    ];
    
    public function isOwnedBy($post, $user) {
        return $this->field('id', ['id' => $post, 'user_id' => $user]) === $post;
    }

}



