<?php

namespace App;

use Illuminate\Foundation\Application as IlluminateFoundationApplication;


class App extends IlluminateFoundationApplication
{

	public static function notFoundClass()
    {
		$namespace = "\\" . \Config::get('controller.service_provider')->getNamespace();
		$controller_action = \Config::get('controller.404');
		if($namespace && $controller_action){
			return explode('@', $namespace . "\\" . $controller_action);
		}
	}
}
