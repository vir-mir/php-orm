<?php
/**
 * Created by PhpStorm.
 * User: vir-mir
 * E-mail: virmir49@gmail.com
 * Date: 22.07.14
 * Time: 0:21
 */

/**
 * Autoloads VmOrm classes.
 *
 * @package raven
 */
class VmOrm_Autoloader
{
	/**
	 * Registers Raven_Autoloader as an SPL autoloader.
	 */
	public static function register()
	{
		ini_set('unserialize_callback_func', 'spl_autoload_call');
		spl_autoload_register(array('VmOrm_Autoloader', 'autoload'));
	}

	/**
	 * Handles autoloading of classes.
	 *
	 * @param string $class A class name.
	 */
	public static function autoload($class)
	{
		if (0 !== strpos($class, 'VmOrm')) {
			return;
		}

		if (is_file($file = dirname(__FILE__).'/'.str_replace(array('_', "\0"), array('/', ''), $class).'.php')) {
			require $file;
		}
	}
}

VmOrm_Autoloader::register();