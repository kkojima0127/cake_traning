<?php
class PlayersController extends AppController {
    
    public $components = ['Session'];

    public function isAuthorized($user = null) {
        if (in_array($this->action, ['index', 'view'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }

    public function index() {
        $players = $this->Player->find('all');
        $this->set(compact('players'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $player = $this->Player->findById($id);
        if (!$player) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set(compact('player'));
    }
    
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Player->save($this->request->data)) {
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
        
        $player = $this->Player->findById($id);
        if (!$player) {
            throw new NotFoundException(__('Invalid post'));
        }
        
        if ($this->request->is(['post', 'put'])) {
            if ($this->Player->saveAssociated($this->request->data)) {
                $this->Session->setFlash(__('Your post has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Session->setFlash(__('Unable to update your post.'));
        }
        
        if (!$this->request->data) {
            $this->request->data = $player;
        }
    }
    
    public function delete($id) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        
        if ($this->Player->delete($id)) {
            $this->Session->setFlash(__('The post with id: %s has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}
