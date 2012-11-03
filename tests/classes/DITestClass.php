<?php

class DITestClass {

	/**
	 * @var stdClass
	 */
	private $di_var;

	/**
	 * @return stdClass
	 */
	public function getVar() {
		// Do sth...
		$i = mt_rand();

		return $this->di_var;
	}
}