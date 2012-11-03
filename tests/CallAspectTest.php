<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'libs' . DIRECTORY_SEPARATOR . 'YAPAF.php');
require_once('usual_autoload.php');

class CallAspectTest extends PHPUnit_Framework_TestCase {

	public function setUp() {
		$path = __DIR__ . DIRECTORY_SEPARATOR . 'classes';
		set_include_path(get_include_path() . PATH_SEPARATOR . $path);
	}

	/**
	 * Test "TestClass" for expected behaviour.
	 *
	 * @test
	 */
	public function AspectReturnsImmediately_disapproveTest() {
		spl_autoload_register('usual_autoload');

		$testValue = 'testParam' . mt_rand();

		$obj = new TestClass();
		$return = $obj->setVar($testValue);

		$this->assertSame($obj->var, $testValue);
		$this->assertNull($return);
	}

	/**
	 * Test changed behaviour of "TestClass" because of "TestCallAspect".
	 *
	 * @test
	 * @depends AspectReturnsImmediately_disapproveTest
	 */
	public function AspectReturnsImmediately() {
		$testValue = 'testParam' . mt_rand();

		require_once('aspects/TestCallAspect.php');
		YAPAF::init(array(new TestCallAspect()));

		$obj = new TestClass();
		$varBefore = $obj->var;
		$return = $obj->setVar($testValue);

		$this->assertSame($varBefore, $obj->var);
		$this->assertSame($return, TestCallAspect::SOME_METHOD_RETURN);
	}

	/**
	 * @test
	 */
	public function SquareWorks() {
		spl_autoload_register('usual_autoload');
		$obj = new TestClass();
		$this->assertSame(5 * 5, $obj->square(5));
	}

	/**
	 * @test
	 * @depends SquareWorks
	 */
	public function AspectReturnsSquareInput() {
		require_once('aspects/TestCallAspect.php');
		YAPAF::init(array(new TestCallAspect()));

		$obj = new TestClass();
		$this->assertSame(5, $obj->square(5));
	}

	/**
	 * @test
	 * @depens SquareWorks
	 */
	public function AspectDoublesSquareInput() {
		require_once('aspects/TestCallSquareAspect.php');
		YAPAF::init(array(new TestCallSquareAspect()));

		$j = 5;
		$i = 2 * 5;

		$obj = new TestClass();
		$this->assertSame($i * $i, $obj->square($j));
	}

	/**
	 * @test
	 */
	public function MultiplicationWorks() {
		spl_autoload_register('usual_autoload');

		$obj = new TestClass();
		$this->assertSame(6 * 7, $obj->multiplication(6, 7));
	}

	/**
	 * @test
	 * @depends MultiplicationWorks
	 */
	public function AspectDoublesMultiplicationInputs() {
		require_once('aspects/TestCallSquareAspect.php');
		YAPAF::init(array(new TestCallSquareAspect()));

		$obj = new TestClass();
		$this->assertSame((3 * 6) * (3 * 7), $obj->multiplication(6, 7));
	}

	/**
	 * @test
	 * @depends MultiplicationWorks
	 */
	public function AspectReturnMultiplicationInput() {
		require_once('aspects/TestCallSquareAspectNumInputs.php');
		YAPAF::init(array(new TestCallSquareAspectNumInputs()));

		$obj = new TestClass();
		$this->assertSame(2, $obj->multiplication(6, 7));
		$this->assertSame(7, $obj->multiplication(1, 2, 3, 4, 5, 6, 7));
	}
}