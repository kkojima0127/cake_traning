<?php

/**
 * Post helper
 *
 */

class PostHelper extends AppHelper {
    public $uses = ['User'];
    public function getAuthor($author_id) {
        return $this->User->field('name', ['id' => $author_id]);
    }
    
}
?>