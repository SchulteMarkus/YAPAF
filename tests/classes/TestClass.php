<?php

class TestClass {

	/**
	 * @var mixed
	 */
	public $var;

	/**
	 * @param mixed $var
	 */
	public function setVar($var) {
		$this->var = $var;
	}

	/**
	 * @param 	int $i
	 * @return 	int	Input²
	 */
	public function square($i) {
		return $i * $i;
	}

	/**
	 * @param 	int $i
	 * @param 	int $j
	 * @return	int	$i * $j
	 */
	public function multiplication($i, $j) {
		return $i * $j;
	}
}