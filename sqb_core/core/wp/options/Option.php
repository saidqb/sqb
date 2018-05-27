<?php
/**
 * @package    	sqb
 * @since 		1.0.0
 * @author     	(saidqb) Muh Nurul Khomsa
 * @email 		<saidqb@gmail.com>
 */

namespace sqb_core\core\wp\options;

/**
* 
*/
class Option
{

	function __construct()
	{
		$this->setDefault = 'sqb_opti_';
	}

/**
 * [get_sqb_options description]
 * @param  [string] $name [key field yang disimpan]
 * @return [type]       [data dari database]
 */
	function get_sqb_options($name){
		
		return get_option( $this->setDefault . $name );
	}

/**
 * [set_sqb_options description]
 * @param [string] $name  [key field admin]
 * @param [string] $value [data yang mau di simpan pada options admin]
 * @param string $type  ['html']
 */
	function set_sqb_options($name,$value, $type =''){

		if($type == 'html'){
			$data_val = stripslashes(wp_filter_post_kses(addslashes($value)));
		} else {
			$data_val = $value;
		}

		if(sqb_options($name) == ''){
			add_option( $this->setDefault . $name, $data_val);
		} 
		else {
			update_option( $this->setDefault . $name, $data_val);
		}
	}
}