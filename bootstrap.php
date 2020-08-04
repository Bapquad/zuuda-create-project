<?php
function callback_config_to_symbol() 
{
	global $configs;
	$server_name = (isset($_SERVER['SERVER_NAME']))?$_SERVER['SERVER_NAME']:'localhost';
	$server_protocol = (isset($_SERVER['SERVER_PROTOCOL']))?$_SERVER['SERVER_PROTOCOL']:'console';
	$server_port = (isset($_SERVER['SERVER_PORT']))?$_SERVER['SERVER_PORT']:"80";
	
	if( "HTTP/1.1"===$server_protocol ) 
		$httpProtocol = $configs['WEBPROTO']; 
	else
		$httpProtocol = $configs['SECPROTO']; 
	if( "80"===$server_port ) 
		$httpPort = ''; 
	else 
		$httpPort = ':'.$server_port; 
	
	$configs['DOMAIN'] = $server_name;
	$configs['ORIGIN_PATH'] = $configs['ORIGIN_DOMAIN'] = $httpProtocol.$server_name.$httpPort; 
} 
$_CONFIG = &$configs;
$_config = &$configs;
$_configs = &$configs;
function callback_autoload_to_symbol( $char ) 
{
	__dispatch_autoload_class_file( $char );
} 
function callback_symbol_to_routes() 
{
	spl_autoload_register( 'callback_autoload_to_symbol' );
} 
$config_filepath = DIRECTORY_SEPARATOR.'config.php'; 
if( !file_exists($config_filepath) ) 
{ 
	$config_filepath = __DIR__.$config_filepath;
} 
$autoload_filepath = DIRECTORY_SEPARATOR.'autoload.php'; 
if( !file_exists($autoload_filepath) ) 
{ 
	$autoload_filepath = __DIR__.$autoload_filepath;
} 
$symbol_filepath = DIRECTORY_SEPARATOR.'symbol.php'; 
if( !file_exists($symbol_filepath) ) 
{ 
	$symbol_filepath = __DIR__.$symbol_filepath;
} 
$routes_filepath = DIRECTORY_SEPARATOR.'routes.php'; 
if( !file_exists($routes_filepath) ) 
{ 
	$routes_filepath = __DIR__.$routes_filepath;
} 
require_once($config_filepath);
callback_config_to_symbol(); 
require_once($autoload_filepath);
require_once($symbol_filepath);
callback_symbol_to_routes(); 
require_once($routes_filepath);