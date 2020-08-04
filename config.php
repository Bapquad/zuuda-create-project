<?php

$configs = array(
	'DEVELOPMENT_ENVIRONMENT'  => 1, 
	'DEVELOPER_WARNING'        => 1, 
	'AUTOLOAD_ERRORS_WARNING'  => 0, 
	'CONTROLER_ERRORS_WARNING' => 1, 

	'EXT' 		=> '.php', 
	'ROOT'		=> dirname(__FILE__), 
	'APP_DIR'	=> dirname(__FILE__), 
	'WEBPROTO'	=> 'http://',
	'SECPROTO'	=> 'https://', 
	'MODULE'	=> NULL, 
	'CONTROLLER'	=> NULL, 
	'ACTION'	=> NULL, 
	'QUERY_STRING'	=> NULL, 
	'COM'		=> false,
	'APP_NAME'	=> "Zuuda Project Creator", 
	'SOLOGAN'	=> "Zuuda PHP Framework Project Creator", 
	'APP_PATH'	=> "/", 
/**
 * When config MEDIA directory, like as allow uploading.
 */
	'MEDIA'		=> array( 
		"image/jpg" 					=> array( 'ext' => '.jpg', 'dir' => 'photos' ), 
		"image/jpeg" 					=> array( 'ext' => '.jpg', 'dir' => 'photos' ), 
		"image/gif" 					=> array( 'ext' => '.gif', 'dir' => 'photos' ), 
		"image/png" 					=> array( 'ext' => '.png', 'dir' => 'photos' ), 
	), 
	
/**
 * Declare an encrypt method. Ussualy
 */
	'ENCRYPT'	=> array(
		"request"	=> 'md5', 
		"query"		=> 'sha1'
	), 
	
); 
