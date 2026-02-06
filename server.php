<?php
include_once( __DIR__.'/bootstrap.php' );
// php -S localhost:8000 server.php
function rewrite() 
{
	global $uri; 
	$indexFiles = ['index.php', 'index.html'];
	foreach( $indexFiles as $key => $file ) 
	{
		$scriptFile = ltrim(rtrim($uri, '/'), '/'). DIRECTORY_SEPARATOR .$file;
		if( is_file($scriptFile) ) 
			return $scriptFile;
		elseif( $key===count($indexFiles)-1 ) 
			return "./".$indexFiles[0];
	}
}
$_GET['url'] = $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
if( is_dir('.'.$uri) && is_file($rewrite = rewrite()) ) 
{
	include $rewrite;
}
else 
{
	$scriptFile = __DIR__ . $uri;
	if( is_file($scriptFile) ) 
	{
		// 1. check that file is not outside of this directory for security
		// 2. check for circular reference to router.php
		// 3. don't serve dotfiles
		if( !strpos($scriptFile, __DIR__ . DIRECTORY_SEPARATOR) &&
			$scriptFile != __DIR__ . DIRECTORY_SEPARATOR . 'router.php' &&
			substr(basename($scriptFile), 0, 1) != '.' ) 
		{
			$scriptExts = strtolower(substr($scriptFile, -4));
			if( $scriptExts==='.php' ) {
				include $scriptFile; 	// php file; serve through interpreter
			}
			else {
				return false;			// asset file; serve from filesystem
			}
		} 
		else 
		{
			// disallowed file
			include __DIR__.'/autoload.php'; 
			abort( 404 );
		}
	}		
	else 
	{
		$dirs_r = "./";
		$dirs = explode( '/', substr($uri, 1));
		foreach($dirs as $dir) 
		{ 
			$dirs_r .= $dir;
			if(is_dir($dirs_r)) 
			{ 
				$uri = $dirs_r; 
			} 
		} 
		if(is_file($rewrite)) {
			include $rewrite;
		}
	}
}
