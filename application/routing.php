<?php

namespace projectname;
use alsvanzelf\fem;

class routing extends fem\routing {

protected $default_handler = 'home';
protected $map_to_filesystem = false;

/**
 * user defined mapping url to handler
 * 
 * @return array with keys for each supported http method ..
 *               .. and inside, key-value pairs of url-regex => handler
 * 
 * for example `$routes['GET']['foo'] = 'bar';` ..
 * .. maps the GET url 'foo' to the file 'bar'
 * 
 * the url-regex doesn't need regex boundaries like '/foo/'
 * @see \alsvanzelf\fem\routing::get_handler_type() for the different ways to define a handler
 */
protected function get_custom_routes() {
	$routes = [];
	
	// map to a file
	$routes['GET']['foo'] = 'bar';
	
	// map to a method
	$accept = fem\request::get_primary_accept(); // html, json, etc.
	$routes['GET']['foo'] = 'bar->'.$accept;
	$routes['GET']['foo'] = 'bar::'.$accept;
	
	// map to an inline function
	$routes['GET']['foo'] = function($url, $method){};
	$routes['GET']['foo'] = function($url, $method, $arguments){ echo 'baz'; };
	
	return $routes;
}

}
