<?php

class TestCallAspect {

	/**
	 * @var String
	 */
	const SOME_METHOD_RETURN = 'callAspectReturns';

	/**
	 * @Call(class="TestClass", method="setVar");
	 */
	public function someMethod() {
		return TestCallAspect::SOME_METHOD_RETURN;
	}

	/**
	 * @Call(class="TestClass", method="square");
	 */
	public function directlyReturnSquareInput() {
		return func_get_arg(0);
	}
}