<?php

class TestCallSquareAspect {

	/**
	 * @Call(class="TestClass", method="square");
	 */
	public function doubleSquareInput() {
		$j = __FUNC_GET_ARG__(0);
		__FUNC_SET_ARG__(0, 2 * $j);
	}

	/**
	 * @Call(class="TestClass", method="multiplication");
	 */
	public function tripleMultiInputs() {
 		$args = __FUNC_GET_ARGS__();
 		__FUNC_SET_ARG__(0, $args[0] * 3);
 		__FUNC_SET_ARG__(1, $args[1] * 3);
	}
}