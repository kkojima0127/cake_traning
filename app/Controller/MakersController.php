<?php
class MakersController extends AppController {
    public $uses = ['Maker'];
    public $components = ['Session'];
    
    public function isAuthorized($user = null) {
        if (in_array($this->action, ['index', 'view'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function index() {
        $makers = $this->Maker->find('all');
        $this->set(compact('makers'));
    }

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Maker->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }
    
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        $maker = $this->Maker->findById($id);
        if (!$maker) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        if ($this->request->is(['post', 'put'])) {
            $this->Maker->id = $id;
            if ($this->Maker->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
        
        if (!$this->request->data) {
            $this->request->data = $maker;
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        
        if ($this->Maker->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
