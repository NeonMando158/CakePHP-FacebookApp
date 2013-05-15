<?php
App::uses('FacebookUser', 'FacebookUsers.Model');

/**
 * FacebookUser Test Case
 *
 */
class FacebookUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.facebook_users.facebook_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FacebookUser = ClassRegistry::init('FacebookUsers.FacebookUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FacebookUser);

		parent::tearDown();
	}

}
