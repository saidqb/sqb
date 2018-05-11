<?php
/**
 * @package    	sqb
 * @since 		1.0.0
 * @author     	(saidqb) Muh Nurul Khomsa
 * @email 		<saidqb@gmail.com>
 */

namespace sqb_core\core\ntv\bootstrap;

class ComponentsV37
{
	function alert( $data = 'text alert', $alert_name = 'success', $btn_close = true)
	{
		$html = '<div class="alert alert-'.$alert_name.'" role="alert">';
		$html .= $data;
		if($btn_close == true){
			$html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
			$html .= '<span aria-hidden="true">&times;</span>';
			$html .= '</button>';
		}
		$html .= '</div>';
		return $html;

	}
}