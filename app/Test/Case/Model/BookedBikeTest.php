<?php
App::uses('BookedBike', 'Model');

/**
 * BookedBike Test Case
 *
 */
class BookedBikeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.booked_bike',
		'app.bike',
		'app.category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BookedBike = ClassRegistry::init('BookedBike');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BookedBike);

		parent::tearDown();
	}

}
