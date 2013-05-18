<?php

App::uses('FacebookCanvasAppController', 'FacebookCanvas.Controller');

/**
 * CanvasUsers Controller
 *
 * @property CanvasUser $CanvasUser
 */
class CanvasUsersController extends FacebookCanvasAppController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('logout');
	}
	/**
	 * Log In method
	 *
	 * @return void
	 */
	public function login() {
		if ($this->Auth->login()) {
			return $this->redirect($this->Auth->loginRedirect);
		} else {
			$this->set('auth_url', $this->Canvas->getAuthUrl());
		}
	}

	public function logout() {
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
		$this->CanvasUser->recursive = 0;
		$this->set('canvasUsers', $this->paginate());
	}

	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		$this->CanvasUser->id = $id;
		if (!$this->CanvasUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('canvas user')));
		}
		$this->set('canvasUser', $this->CanvasUser->read(null, $id));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->CanvasUser->recursive = 0;
		$this->set('canvasUsers', $this->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		$this->CanvasUser->id = $id;
		if (!$this->CanvasUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('canvas user')));
		}
		$this->set('canvasUser', $this->CanvasUser->read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CanvasUser->create();
			if ($this->CanvasUser->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('canvas user')), 'alert', array(
				    'plugin' => 'TwitterBootstrap',
				    'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('canvas user')), 'alert', array(
				    'plugin' => 'TwitterBootstrap',
				    'class' => 'alert-error'
					)
				);
			}
		}
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		$this->CanvasUser->id = $id;
		if (!$this->CanvasUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('canvas user')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CanvasUser->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('canvas user')), 'alert', array(
				    'plugin' => 'TwitterBootstrap',
				    'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('canvas user')), 'alert', array(
				    'plugin' => 'TwitterBootstrap',
				    'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->CanvasUser->read(null, $id);
		}
	}

	/**
	 * admin_delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->CanvasUser->id = $id;
		if (!$this->CanvasUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('canvas user')));
		}
		if ($this->CanvasUser->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('canvas user')), 'alert', array(
			    'plugin' => 'TwitterBootstrap',
			    'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('canvas user')), 'alert', array(
		    'plugin' => 'TwitterBootstrap',
		    'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}

}
