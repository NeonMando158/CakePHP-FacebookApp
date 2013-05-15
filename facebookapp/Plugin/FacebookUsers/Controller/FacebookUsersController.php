<?php
App::uses('FacebookUsersAppController', 'FacebookUsers.Controller');
/**
 * FacebookUsers Controller
 *
 * @property FacebookUser $FacebookUser
 */
class FacebookUsersController extends FacebookUsersAppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FacebookUser->recursive = 0;
		$this->set('facebookUsers', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->FacebookUser->id = $id;
		if (!$this->FacebookUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('facebook user')));
		}
		$this->set('facebookUser', $this->FacebookUser->read(null, $id));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->FacebookUser->recursive = 0;
		$this->set('facebookUsers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->FacebookUser->id = $id;
		if (!$this->FacebookUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('facebook user')));
		}
		$this->set('facebookUser', $this->FacebookUser->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->FacebookUser->create();
			if ($this->FacebookUser->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('facebook user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('facebook user')),
					'alert',
					array(
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
		$this->FacebookUser->id = $id;
		if (!$this->FacebookUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('facebook user')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FacebookUser->save($this->request->data)) {
				$this->Session->setFlash(
					__('The %s has been saved', __('facebook user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-success'
					)
				);
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(
					__('The %s could not be saved. Please, try again.', __('facebook user')),
					'alert',
					array(
						'plugin' => 'TwitterBootstrap',
						'class' => 'alert-error'
					)
				);
			}
		} else {
			$this->request->data = $this->FacebookUser->read(null, $id);
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
		$this->FacebookUser->id = $id;
		if (!$this->FacebookUser->exists()) {
			throw new NotFoundException(__('Invalid %s', __('facebook user')));
		}
		if ($this->FacebookUser->delete()) {
			$this->Session->setFlash(
				__('The %s deleted', __('facebook user')),
				'alert',
				array(
					'plugin' => 'TwitterBootstrap',
					'class' => 'alert-success'
				)
			);
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(
			__('The %s was not deleted', __('facebook user')),
			'alert',
			array(
				'plugin' => 'TwitterBootstrap',
				'class' => 'alert-error'
			)
		);
		$this->redirect(array('action' => 'index'));
	}
}
