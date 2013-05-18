<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

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

	public $components = array(
	    'DebugKit.Toolbar',
	    'Auth',
	    'Session',
	    'FacebookCanvas.Canvas'
	);
	public $helpers = array(
	    'Session',
	    'Html' => array('className' => 'TwitterBootstrap.BootstrapHtml'),
	    'Form' => array('className' => 'TwitterBootstrap.BootstrapForm'),
	    'Paginator' => array('className' => 'TwitterBootstrap.BootstrapPaginator'),
	    'FacebookCanvas.FacebookCanvas'
	);
	public $layout = 'facebook-app';

	public function beforeFilter() {
		$this->Auth->login();
	}

	protected function flashError($msg) {
		$this->Session->setFlash($msg, 'alert', array(
		    'plugin' => 'TwitterBootstrap',
		    'class' => 'alert alert-error'
		));
	}

	protected function flashSuccess($msg) {
		$this->Session->setFlash($msg, 'alert', array(
		    'plugin' => 'TwitterBootstrap',
		    'class' => 'alert alert-success'
		));
	}

	protected function flashInfo($msg) {
		$this->Session->setFlash($msg, 'alert', array(
		    'plugin' => 'TwitterBootstrap',
		    'class' => 'alert alert-info'
		));
	}

	public function isAuthorized($user) {
		// Ony Admins can access admin actions
		if (isset($this->request->params['admin']) && $this->request->params['admin'] === true) {
			//we are in an admin section
			return (bool) $user['is_admin'];
		}
		return true;
	}

}
