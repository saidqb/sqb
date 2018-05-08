<?php
/**
 * @package    	sqb
 * @since 		1.0.0
 * @author     	(saidqb) Muh Nurul Khomsa
 * @email 		<saidqb@gmail.com>
 */

namespace sqb_core\core\ntv\bootstrap;

use sqb_core\core\ntv\bootstrap\ComponentsV37 as ComponentsV37; 
use sqb_core\core\ntv\bootstrap\ComponentsV40 as ComponentsV40; 

class Bootstrap
{
	 

	public function v($version = '37'){

		if($version == '37'){
			return new ComponentsV37;
		} elseif(($version == '40') || ($version == '4')) {
			return new ComponentsV40;
		} else {
			return new ComponentsV37;
		}

		
	}

}