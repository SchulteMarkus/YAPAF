<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'YAPAF.php');
require_once('usual_autoload.php');

class ManipulateConstantTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$path = __DIR__ . DIRECTORY_SEPARATOR . 'classes';
		set_include_path(get_include_path() . PATH_SEPARATOR . $path);
	}

	/**
	 * @test
	 */
	public function fixtureIsCorrect() {
		spl_autoload_register('usual_autoload');

		$this->assertEquals('a constant', TestClass::SOME_CONST);
	}

	/**
	 * @test
	 * @depends fixtureIsCorrect
	 */
	public function valueOfConstantIsChanged() {
		require_once('aspects/ManipulateConstantAspect.php');
		YAPAF::init(array(new ManipulateConstantAspect()));

		$this->assertEquals(500.0, TestClass::SOME_CONST);
	}
}