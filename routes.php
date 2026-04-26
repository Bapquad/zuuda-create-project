<?php

use Zuuda\Route;

$router = array();

route::api(function($route) 
{
	$route::get('/', function($req, $res)
	{
		return $res->json([
			"message" => "welcome"
		]);
	});
	
});
