<?php
App::uses('AppController', 'Controller');
/**
 * BookedBikes Controller
 *
 * @property BookedBike $BookedBike
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BookedBikesController extends AppController {

/**
 * Components
 *
 * @var array
 */     
        public function beforeFilter() {
            $this->Auth->allow(array('add'));
            parent::beforeFilter();
        }
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BookedBike->recursive = 0;
		$this->set('bookedBikes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BookedBike->exists($id)) {
			throw new NotFoundException(__('Invalid booked bike'));
		}
		$options = array('conditions' => array('BookedBike.' . $this->BookedBike->primaryKey => $id));
		$this->set('bookedBike', $this->BookedBike->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BookedBike->create();                       
			if ($this->BookedBike->save($this->request->data)) {
				$this->Session->setFlash(__('The booked bike has been saved.'));
				return $this->redirect(array('controller'=>'bikes' ,'action' => 'index'));
                                    
			} else {
				$this->Session->setFlash(__('The booked bike could not be saved. Please, try again.'));
			
//                                $this->redirect(array('controller'=>'bikes' ,'action' => array('index',
//                                    $this->request->data['BookedBikes']['id'])));
                        }
		}
		$bikes = $this->BookedBike->Bike->find('list');
		$this->set(compact('bikes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BookedBike->exists($id)) {
			throw new NotFoundException(__('Invalid booked bike'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BookedBike->save($this->request->data)) {
				$this->Session->setFlash(__('The booked bike has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The booked bike could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BookedBike.' . $this->BookedBike->primaryKey => $id));
			$this->request->data = $this->BookedBike->find('first', $options);
		}
		$bikes = $this->BookedBike->Bike->find('list');
		$this->set(compact('bikes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BookedBike->id = $id;
		if (!$this->BookedBike->exists()) {
			throw new NotFoundException(__('Invalid booked bike'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->BookedBike->delete()) {
			$this->Session->setFlash(__('The booked bike has been deleted.'));
		} else {
			$this->Session->setFlash(__('The booked bike could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
