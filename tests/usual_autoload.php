<?php

function usual_autoload($class) {
	include $class . '.php';
}