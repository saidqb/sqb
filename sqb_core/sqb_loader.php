<?php
namespace sqb_core;
use sqb_core;

class sqb_loader
{

	/**
	 * @param  [type]
	 * @return [type]
	 */
	public function _register_class($class){

		$namespace = __NAMESPACE__ ;

		$sparator = DIRECTORY_SEPARATOR;

		$get_class = str_replace("/", '\\',  $namespace . $sparator . $class);

		return new $get_class;
	}

	public function compile_get_class($name){

		foreach ($name as $key => $value) {

			if(!empty($value)){
				$data[$key] = $this->_register_class($value);

			}
		}

		return (object)$data;
	}

	
	public function call_register($name){

		$folder_register = '/register/';

		if(file_exists(__DIR__ . $folder_register . $name . '.php')){
			$class_reg = require(__DIR__ . $folder_register . $name . '.php');

			return $this->compile_get_class($class_reg);

		} else {
			return 'Object Class tidak terdaftar';
		}

	}

	
	public function __get($name)
	{
		$this->{$name} = $this->call_register($name);
		return $name = $this->{$name};
	}

}

