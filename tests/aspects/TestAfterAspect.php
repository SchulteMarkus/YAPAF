<?php

class TestAfterAspect {

	/**
	 * @var String
	 */
	const SOME_METHOD_RETURN = 'afterAspectReturns';

	/**
	 * @After(class="TestClass", method="setVar");
	 */
	public function someMethod() {
		return TestAfterAspect::SOME_METHOD_RETURN;
	}
}
