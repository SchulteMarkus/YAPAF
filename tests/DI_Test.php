<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'YAPAF.php');
require_once('usual_autoload.php');

class DI_Test extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$path = __DIR__ . DIRECTORY_SEPARATOR . 'classes';
		set_include_path(get_include_path() . PATH_SEPARATOR . $path);
	}

	/**
	 * @test
	 */
	public function di_disapprove() {
		spl_autoload_register('usual_autoload');

		$obj = new DITestClass();
		$this->assertNull($obj->getVar());
	}

	/**
	 * @test
	 * @depends di_disapprove
	 */
	public function di() {
		require_once('aspects/DI_Aspect.php');
		YAPAF::init(array(new DI_Aspect()));

		$obj = new DITestClass();
		$this->assertInstanceOf('stdClass', $obj->getVar());
	}
}