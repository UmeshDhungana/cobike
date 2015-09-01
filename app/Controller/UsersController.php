<?php

class UsersController extends AppController {
    
    public $name = 'Users';
    
    public function index() {
        if ($this->Auth->user('role')=='admin'){
	$this->User->recursive = 0;
	$this->set('users', $this->paginate());
        $count = $this->User->find('count');
        $this->set('count',$count);
        }
        else
        {
            $this->Session->setFlash(__("Cannot access this"));
        }
    }
    
    public function view($id = null) {
        if ($this->Auth->user('role')=='admin'){
        $this->User->id = $id;
        
        if(!$this->User->exists()) {
            throw new NotFoundException('Invalid User');
        }
	if (!$id) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
	}
	$this->set('user', $this->User->read());
        }
        else
        {
            $this->Session->setFlash(__("Cannot access this"));
            $this->redirect(array('controller'=>'bikes','action'=>'index'));
        }
    }
    
    public function add() {
        if($this->Auth->user('role')=='admin'){
		if (!empty($this->data)) {
                   
			$this->User->create();
//                         $password = $this->request->data['User']['password'];
//                    $confirm= $this->request->data['User']['password_confirmation'];
//                    if ($password==$confirm){
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		//}
                }
                else
                {
                    $this->Session->setFlash('Password do not match');
                }
        }
        else{
            $this->Session->setFlash("You cannot access this.");
        }
	}
        
        function edit($id = null) {
            if($this->Auth->user('role')=='admin'){
            $this->User->id =$id;
            
            if(!$this->User->exists()) {
                throw new NotFoundException('Invalid User');
            }
            if($this->request->is('post') || $this->request->is('put')) {
                if($this->User->save($this->request->data)) {
                    $this->Session->setFlash('The User has been saved');
                    $this->redirect(array('action'=>'index'));
                } else {
                    $this->request->data = $this->User->read();
                }
            }
	}
    else {
         $this->Session->setFlash(__('Cannot access this.'));
    }
    }

	function delete($id = null) {
            if($this->Auth->user('role')=='admin'){
            if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
        else
        {
            $this->Session->setFlash(__('Cannot access this.'));
        }
        }
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login');
    }
    
    public function isAuthorized($user) {
        if ($user['role'] == 'admin') {
            return true;
        }
        if(in_array($this->action, array('edit','delete'))) {
            if($user['id'] != $this->request->params['pass'][0]) {
                return false;
            }
        }
        return true;
    }
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $role = $this->Auth->user('role');
                if ($role=='admin')
                $this->redirect($this->Auth->redirect(array('controller'=>'users','action'=>'index')));
                else
                    $this->redirect($this->Auth->redirect(array('controller'=>'bikes','action'=>'vendor')));
            } else {
                $this->Session->setFlash('Incorrect Username/Password');
            }
        }
    }
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
    
    
}

?>

