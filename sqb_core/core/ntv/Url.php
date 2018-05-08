<?php
/**
 * @package    	sqb
 * @since 		1.0.0
 * @author     	(saidqb) Muh Nurul Khomsa
 * @email 		<saidqb@gmail.com>
 */

namespace sqb_core\core\ntv;

class Url
{

	/**
	 * [protocol menampilkan prcol http atau https]
	 * @return [string]
	 */
	public function protocol(){
		if (isset($_SERVER['HTTPS']) &&
			($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
			isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
			$_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
		{
			$protocol = 'https://';
		} else {
			$protocol = 'http://';
		}
		return $protocol;
	}


	public function site_url(){
		return $this->protocol() . $_SERVER['SERVER_NAME'] . DIRECTORY_SEPARATOR;
	}

	/**
	 * [segment]
	 * menampilkan segment url dimulai dari 1
	 * @param  [int] $data 	[number]
	 * @return [string]    	[menampilkan path url sesuai number segment]
	 */
	public function segment($num_segment=NULL){
		$base_url = $this->site_url();
		$actual_link = $this->protocol() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$set_parse =  str_replace($base_url, $this->protocol() . 'g.g/', $actual_link);
		$parse_url = parse_url($set_parse, PHP_URL_PATH);
		$arrPath = explode('/', $parse_url);
		/*	membuat urutan ulang index array. urutan pertama menjadi 1 */

		if($num_segment == NULL){

			/* menampilkan semua data array */
			return $arrPath;
		} else {

			/* chcek jika input data melebihi jumlah array path */
			if(count($arrPath) >= $num_segment){
				if(isset($arrPath[$num_segment])){
					return $arrPath[$num_segment];

				} 
			}
		}
	}

	/**
	 * [current menampilkan url sekarang]
	 * @return [string]
	 */
	public function current(){
		$actual_link = $this->protocol() . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		return $actual_link;
	}

}