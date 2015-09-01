<?php
App::uses('AppController', 'Controller');
App::uses('File','Utility');
/**
 * Bikes Controller
 *
 * @property Bike $Bike
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BikesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index($id=null) {
//            if($id==null){
//		$this->Bike->recursive = 0;
//		$this->set('bikes', $this->Paginator->paginate());
//            }
//            else{.
            if($this->Auth-user('role')=='admin'){
                $data= $this->Bike->find('all',array(//'order'=>'date',
                    'conditions'=>array('category_id LIKE' => '%' . $id . '%')));
              $info = array(
            'bikes' => $data
        );
        $this->set($info);
            }
        //    }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
             $current_user_id = $this->Auth->user('id');
            $incoming_user_data= $this->Bike->find('first',
                    array('fields'=>array('user_id'),
                        'conditions'=>array('Bike.id'=> $id)));
            $incoming_user_id=$incoming_user_data['Bike']['user_id'];
            if($incoming_user_id==$current_user_id || $this->Auth->user('role')=='admin'){
		if (!$this->Bike->exists($id)) {
			throw new NotFoundException(__('Invalid bike'));
		}
		$options = array('conditions' => array('Bike.' . $this->Bike->primaryKey => $id));
		$this->set('bike', $this->Bike->find('first', $options));
        }
        else{
            $this->Session->setFlash(__('Cannot access this'));
            $this->redirect(array('controller'=> 'bikes' ,'action'=>'vendor'));
        }
                }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		// form posted
		if ($this->request->is('post')) {
			// create
			$this->Bike->create();
                        //$user_id=$this->Auth->user('id');
                        //$this->request->data['Bike']['user_id']=$user_id;
			//attempt to save
			if ($this->Bike->save($this->request->data)) {
				$this->Session->setFlash(__('The bike has been saved.'));
				return $this->redirect(array('action' => 'vendor'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Bike->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $current_user_id = $this->Auth->user('id');
            $incoming_user_data= $this->Bike->find('first',
                    array('fields'=>array('user_id'),
                        'conditions'=>array('Bike.id'=> $id)));
            $incoming_user_id=$incoming_user_data['Bike']['user_id'];
                    pr($incoming_user_id);
        if(($current_user_id==$incoming_user_id) || $this->Auth->user('role')=='admin' ){
		if (!$this->Bike->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    $incoming_user_id = $this->request->data['Bike']['user_id'];
                    
//                    $user_id=$this->Auth->user('id');
//                        $this->request->data['Bike']['user_id']=$user_id;
			if ($this->Bike->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('action' => 'vendor'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
                
               
                
                        } else {
                       
			$options = array('conditions' => array('Bike.' . $this->Bike->primaryKey => $id));
			$this->request->data = $this->Bike->find('first', $options);
		}
		$categories = $this->Bike->Category->find('list');
		$this->set(compact('categories'));
	}
        else
        {
            $this->Session->setFlash(__("You cannot edit this bike"));
            $this->redirect(array('controller'=>'categories','action'=>'index'));
        }
        }
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bike->id = $id;
		if (!$this->Bike->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this->request->allowMethod('post', 'delete');
		$file = new File(WWW_ROOT . $bike['Bike']['image'], false, 0777);
		
		
		if($file->delete()) {
   		echo 'image deleted.....';
		}
		
		if ($this->Bike->delete()) {
			$this->Session->setFlash(__('The bike has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bike could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'vendor'));
	}
        
        public function vendor(){
            
            $user_id = $this->Auth->user('id');
            $data = $this->Bike->find('all',array(
                'conditions'=>array('user_id LIKE' => '%'. $user_id . '%' )
            ));
            $info = array('bikes'=> $data);
            $this->set($info);
    }
}
