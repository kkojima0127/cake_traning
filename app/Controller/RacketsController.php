<?php
class RacketsController extends AppController {
    public $uses = ['Racket', 'Maker'];
    public $helpers = ['Html', 'Form', 'Session'];
    public $components = ['Session'];
    
    public function isAuthorized($user = null) {
        if (in_array($this->action, ['add', 'index', 'view'])) {
            return true;
        }
        
        if (in_array($this->action, ['edit', 'delete'])) {
            $postId = $this->request->params['pass'][0];
            if ($this->Post->isOwnedBy($postId, $user['id'])) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function index() {
        $rackets = $this->Racket->find('all');
        $this->set(compact('rackets'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $racket = $this->Racket->findById($id);
        if (!$racket) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set(compact('racket'));
    }
    
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Racket->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
        $this->set('options', $this->Maker->returnOptions());
    }
    
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        if ($this->request->is(['post', 'put'])) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Sesstion->setFlash(__('Your post has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
        
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        
        if ($this->Post->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
