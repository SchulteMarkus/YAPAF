<?php

class TestBeforeAspect {

	/**
	 * @var String
	 */
	const SOME_METHOD_RETURN = 'beforeAspectReturns';

	/**
	 * @Before(class="TestClass", method="setVar");
	 */
	public function someMethod() {
		return TestBeforeAspect::SOME_METHOD_RETURN;
	}
}
