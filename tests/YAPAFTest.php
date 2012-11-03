<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'YAPAF.php');
require_once('usual_autoload.php');

class YAPAFTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$path = __DIR__ . DIRECTORY_SEPARATOR . 'classes';
		set_include_path(get_include_path() . PATH_SEPARATOR . $path);
	}

	/**
	 * @test
	 */
	public function OtherTestClassExecutesNormally() {
		spl_autoload_register('usual_autoload');

		$testValue = 'testParam' . mt_rand();

		$obj = new OtherTestClass();
		$return = $obj->setOnTestClassAndReturn($testValue);

		$this->assertSame($return, $testValue);
	}

	/**
	 * @test
	 * @depends OtherTestClassExecutesNormally
	 */
	public function AfterAspectReturnsImmediately() {
		$testValue = 'testParam' . mt_rand();

		require_once('aspects/TestAfterAspect.php');
		YAPAF::init(array(new TestAfterAspect()));

		$obj = new OtherTestClass();
		$return = $obj->setOnTestClassAndReturn($testValue);

		$this->assertSame($return, TestAfterAspect::SOME_METHOD_RETURN);
	}

	/**
	 * @test
	 * @depends OtherTestClassExecutesNormally
	 */
	public function BeforeAspectReturnsImmediately() {
		$testValue = 'testParam' . mt_rand();

		require_once('aspects/TestBeforeAspect.php');
		YAPAF::init(array(new TestBeforeAspect));

		$obj = new OtherTestClass();
		$return = $obj->setOnTestClassAndReturn($testValue);

		$this->assertSame($return, TestBeforeAspect::SOME_METHOD_RETURN);
	}
}
