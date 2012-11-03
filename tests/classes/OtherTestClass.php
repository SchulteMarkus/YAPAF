<?php

class OtherTestClass {

	public function setOnTestClassAndReturn($var) {
		require_once(__DIR__ . DIRECTORY_SEPARATOR . 'TestClass.php');

		$obj = new TestClass();
		$obj->setVar($var);
		return $obj->var;
	}
}