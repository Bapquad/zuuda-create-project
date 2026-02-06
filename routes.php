<?php

use Zuuda\Route;

// Let's cooment out this code if you have a index.php
route::get('/', function($res, $req) {
	echo "Hello World";
});
