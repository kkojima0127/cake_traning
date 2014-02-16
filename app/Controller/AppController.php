<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    public $components = [
        'Session',
        'Auth' => [
            'authenticate' => [
                AuthComponent::ALL => ['userModel' => 'User'],
                'Form' => [
                    'fields' => ['userName' => 'username']
                ],
            ],
            'loginRedirect' => ['controller' => 'posts', 'action' => 'index'],
            'logoutRedirect' => ['controller' => 'users', 'action' => 'login'],
            'authorize' => ['Controller']
        ],
        'DebugKit.Toolbar'
    ];
    
    public function isAuthorized($user = null) {
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        return false;
    }

    public function beforeFilter() {
        $this->Auth->allow('login');
        if (!defined('LOGIN')) {
            if ($this->Auth->user()) {
                define('LOGIN' , TRUE); 
            } else {
                define('LOGIN' , FALSE); 
            }
        }
        if (!defined('USER_NAME')) {
            define('USER_NAME', $this->Auth->user('username'));
        }
        if (!defined('ROLE')) {
            define('ROLE', $this->Auth->user('role'));
        }
    }
}
