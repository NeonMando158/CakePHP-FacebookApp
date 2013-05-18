<?php
App::uses('CanvasUser', 'FacebookCanvas.Model');

/**
 * CanvasUser Test Case
 *
 */
class CanvasUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.facebook_canvas.canvas_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CanvasUser = ClassRegistry::init('FacebookCanvas.CanvasUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CanvasUser);

		parent::tearDown();
	}

}
