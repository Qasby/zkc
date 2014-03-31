<?php
class zkcController
{
	static protected $classes;//Zmienna obiektów
	
	
	static public function setClass($className, $class)
	{
		self::$classes[$className] = $class;
	}	
	static public function getClass($className)
	{
		return array_key_exists ($className , self::$classes) ? self::$classes[$className] : false;
	}
	static public function loadClass($fileName, $appName = "core")
	{
		if(!file_exists("source/application/" . $appName . "/class/" . $fileName . ".php"))
		{
			return false;
		}
		else
		{
			include_once("source/application/" . $appName . "/class/" . $fileName . ".php");
			return true;
		}
	
	}
	public static function loadPage($app, $module, $section)
	{
			if(!file_exists("source/application/" . $app . "/modules_public/" . $module . ".php"))
			{
					return false;
			
			}
			include("source/application/" . $app . "/modules_public/" . $module . ".php");
			if(!class_exists("public_" . $app . "_" . $module))
			{
					return false;

			}
			$class_name = "public_" . $app . "_" . $module;
			$class_name = new $class_name();
			if(!method_exists($class_name, $section)) 
			{ 
				$section = "index";
			}
			else
			{
				$reflection = new ReflectionMethod($class_name, $section);
				if (!$reflection->isPublic()) {
					$section = "index";
				}
			
			}
			
			
			
			$class_name->$section();
	
	
	}
	

}