<?php
/**
 * @package    	sqb
 * @since 		1.0.0
 * @author     	(saidqb) Muh Nurul Khomsa
 * @email 		<saidqb@gmail.com>
 */

namespace sqb_core\core\ntv\currency;

/**
* 
*/
class Currency
{

	/**
	 * [rp merubah angka ke Rp]
	 * @param  [string] $angka [tidak boleh kosong]
	 * @return [string]        [format rupiah]
	 */
	public function rp($angka)
	{
		if(!empty($angka)){
			return 'Rp. '.strrev(implode('.',str_split(strrev(strval($angka)),3)));
		} else {
			return 'angka tidak boleh kosong';
		}
	}

	/**
	 * remove
	 * @param  [string] $rupiah [tidak boleh kosong]
	 * @return [int]        	[hanya menampilkan number]
	 */
	function remove($rupiah)
	{
		return intval(preg_replace('/,.*|[^0-9]/', '', $rupiah));
	}
}