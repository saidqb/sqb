<?php
/**
 * @package    	sqb
 * @since 		1.0.0
 * @author     	(saidqb) Muh Nurul Khomsa
 * @email 		<saidqb@gmail.com>
 * @website		<saidqb.com>
 * 
 * PHP Version support : PHP 5 >= 5.4.0, PHP 7
 */

/* define sqb costant*/
define('sqb_dir', __DIR__ . '/');

/* memanggil autoload */
require_once sqb_dir . 'sqb_core/__autoload.php';

/**
* class sqb
*/
class sqb
{
	function __construct()
	{
		return new sqb_core\sqb_loader();
	}
}

/* Global Function sqb */
if(!function_exists('sqb')){
	
	/**
	 * @return object
	 */
	function sqb(){
		$class = new sqb_core\sqb_loader();
		return $class;
	}

}
