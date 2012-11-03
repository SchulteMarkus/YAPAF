<?php

class TestCallSquareAspectNumInputs {

	/**
	 * @Call(class="TestClass", method="multiplication");
	 */
	public function returnMethodInputNumArgs() {
		return __FUNC_NUM_ARGS__();
	}
}