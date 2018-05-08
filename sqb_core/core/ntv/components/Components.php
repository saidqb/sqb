<?php
/**
 * @package    	sqb
 * @since 		1.0.0
 * @author     	(saidqb) Muh Nurul Khomsa
 * @email 		<saidqb@gmail.com>
 */

namespace sqb_core\core\ntv\components;

/**
* 
*/
class Components
{
	public function dateTime(){
		return date('Y-m-d H:i:s');
	}

	public function year(){
		return date('Y');
	}
}
