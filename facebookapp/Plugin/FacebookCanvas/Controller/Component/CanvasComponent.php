<?php

App::uses('Component', 'Controller');
/**
 * Loads the settings for AuthComponent and FacebookAppAuthenticate
 *
 * @author amoreno
 *
 * @property SessionComponent $Session
 * @property AuthComponent $Auth
 */
class CanvasComponent extends Component {

	/**
	 * Settings for this Component
	 *
	 * @var array
	 */
	public $settings = array(
	    'autoLogin' => false,
	    'app_id' => null,
	    'app_secret' => null,
	    'canvas_page' => null,
	    'scope' => array('email'),
	    'userModel' => 'FacebookCanvas.CanvasUser',
	    'session_namespace' => 'FacebookApp',
	    'loginAction' => array(
		'admin' => false,
		'plugin' => 'facebook_canvas',
		'controller' => 'canvas_users',
		'action' => 'login',
	    ),
	);

	/**
	 * Settings configurable through bootstrap
	 *
	 * @var array
	 */
	protected $_configurableSettings = array(
	    'app_id',
	    'app_secret',
	    'canvas_page',
	    'scope',
	);

	/**
	 * Other Components this component uses.
	 *
	 * @var array
	 */
	public $components = array('Session', 'Auth');

	/**
	 * Constructor
	 *
	 * @param ComponentCollection $collection A ComponentCollection this component can use to lazy load its components
	 * @param array $settings Array of configuration settings.
	 */
	public function __construct(ComponentCollection $collection, $settings = array()) {
		$settings = array_merge($this->settings, $settings);
		parent::__construct($collection, $settings);
		foreach ($this->_configurableSettings as $configurableSetting) {
			if (is_null($this->settings[$configurableSetting]) && Configure::check('FacebookApp.' . $configurableSetting)) {
				$this->settings[$configurableSetting] = Configure::read('FacebookApp.' . $configurableSetting);
			} elseif (is_null($this->settings[$configurableSetting]) && !Configure::check('FacebookApp.' . $configurableSetting)) {
				throw new CakeException('Missing parameter:"' . $configurableSetting . '"');
			}
		}
	}

	/**
	 * Called before the Controller::beforeFilter().
	 *
	 * @param Controller $controller Controller with components to initialize
	 * @return void
	 */
	public function initialize(Controller $controller) {
		$this->_authSetUp();
		/**
		 * @todo move signed request to the authentication object
		 */
		//$this->_getSignedRequest($controller->request);
	}

	/**
	 * Called after the Controller::beforeFilter() and before the controller action
	 *
	 * @param Controller $controller Controller with components to startup
	 * @return void
	 */
	public function startup(Controller $controller) {

	}

	/**
	 * Sets up AuthComponent
	 *
	 * @return void
	 */
	protected function _authSetUp() {
		$this->Auth->authorize = array('Controller');
		$this->Auth->authenticate = array(
		    'FacebookCanvas.FacebookApp' => array(
			'app_id' => $this->settings['app_id'],
			'app_secret' => $this->settings['app_secret'],
			'canvas_page' => $this->settings['canvas_page'],
			'userModel' => $this->settings['userModel'],
			'session_namespace' => $this->settings['session_namespace'],
			'loginAction' => $this->settings['loginAction'],
		    )
		);
		$this->Auth->allow('display');

		$this->Auth->loginRedirect = $this->settings['canvas_page'];
		$this->Auth->logoutRedirect = '/';
		$this->Auth->authError = 'Did you really think you are allowed to see that?';
		$this->Auth->loginAction = $this->settings['loginAction'];
	}

	/**
	 * Get a user based on information in the request.
	 *
	 * @param CakeRequest $request Request object.
	 * @return void
	 * @deprecated moved to FacebookAppAuthenticate
	 */
	protected function _getSignedRequest(CakeRequest $request) {
		if (isset($request->data['signed_request'])) {
			$signed_request = $request->data['signed_request'];
			$decoded_request = $this->_parse_signed_request($signed_request);
			$this->_sessionWrite('signed_request', $signed_request);
			$this->_sessionWrite('decoded_request', $decoded_request);
			if ($this->settings['autoLogin'] && isset($decoded_request['user_id'])) {
				$this->Auth->login();
			}
		}
	}

	/*
	 * @deprecated moved to FacebookAppAuthenticate
	 */
	protected function _parse_signed_request($signed_request) {
		list($encoded_sig, $payload) = explode('.', $signed_request, 2);
		$sig = $this->_base64_url_decode($encoded_sig);
		$expected_sig = hash_hmac('sha256', $payload, $this->settings['app_secret'], $raw = true);
		if ($sig !== $expected_sig) {
			throw new CakeException('Bad Signed JSON signature!');
		}
		$data = json_decode($this->_base64_url_decode($payload), true);

		return $data;
	}

	/**
	 * @deprecated moved to FacebookAppAuthenticate
	 */
	protected function _base64_url_decode($input) {
		return base64_decode(strtr($input, '-_', '+/'));
	}

	/**
	 * Creates the url for authenticating the FacebookApp
	 *
	 * @return string
	 */
	public function getAuthUrl() {
		$state = $this->_createStateSecret();
		$auth_url = 'https://www.facebook.com/dialog/oauth?client_id=';
		$auth_url .= $this->settings['app_id'];
		$auth_url .= '&scope=';
		$auth_url .= implode(',',$this->settings['scope']);
		$auth_url .= '&state=';
		$auth_url .= $state;
		$auth_url .= '&redirect_uri=';
		$auth_url .= urlencode(Router::url($this->settings['loginAction'], true));
		return $auth_url;
	}

	/**
	 * Create a random string and saves it to session. This is used to protect against Cross-site Request Forgery
	 *
	 * @return String
	 * @deprecated moved to FacebookAppAuthenticate
	 */
	protected function _createStateSecret() {
		$state = sprintf('fb_%s_state', $this->Auth->password(String::uuid()));
		$this->_sessionWrite('state', $state);
	}

	/**
	 * write to session
	 *
	 * @param string $name The name of the key your are setting in the session.
	 * @param string $value The value you want to store in a session.
	 * @return boolean Success
	 */
	protected function _sessionWrite($name, $value) {
		$name = $this->settings['session_namespace'] . '.' . $name;
		return $this->Session->write($name, $value);
	}

	/**
	 * read from session
	 *
	 * @param string $name the name of the session key you want to read
	 * @return mixed value from the session vars
	 */
	protected function _sessionRead($name = null) {
		$name = $this->settings['session_namespace'] . '.' . $name;
		return $this->Session->read($name);
	}

	/**
	 * delete in session
	 *
	 * @param string $name the name of the session key you want to delete
	 * @return boolean true is session variable is set and can be deleted, false is variable was not set.
	 */
	protected function delete($name) {
		$name = $this->settings['session_namespace'] . '.' . $name;
		return $this->Session->delete($name);
	}

}
