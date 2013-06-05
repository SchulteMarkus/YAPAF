<?php

function usual_autoload($class) {
	$class = str_replace('_', '/', $class);
	include $class . '.php';
}