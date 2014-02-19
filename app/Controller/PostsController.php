<?php
class PostsController extends AppController {
    public $uses = ['Post', 'User'];
    public $helpers = ['Html', 'Form', 'Session'];
    public $components = ['Session'];
    
    public function isAuthorized($user = null) {
        if (in_array($this->action, ['add', 'index', 'view', 'search'])) {
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
        if ($this->Auth->user('role') == 'admin') {
            $data = $this->Post->find('all');
        } else {
            $data = $this->Post->find('all', [
                'conditions' => [
                    'Post.user_id' => $this->Auth->user('id')
                ]
            ]);
        }
        $this->set('posts', $data);
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set(compact('post'));
    }
    
    public function add() {
        if ($this->request->is('post')) {
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
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

    public function search() {
        $posts = $this->Post->find('all', [
            'conditions' => [
                $this->postConditions($this->request->data)
            ],
            'recursive' => 0
        ]);
        $this->set(compact('posts'));
    }
}
