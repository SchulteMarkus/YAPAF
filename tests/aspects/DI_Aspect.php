<?php

class DI_Aspect {

	/**
	 * @Before(class="DITestClass", var="di_var");
	 */
	public function injectDependency() {
		$varReflected = new ReflectionAnnotatedProperty('DITestClass', 'di_var');
 		if (preg_match('/@var\s+([^\s]+)/', $varReflected->getDocComment(), $matches)) {
 			list(, $type) = $matches;
 			$this->di_var = new $type();
 		}
	}
}