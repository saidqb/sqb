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
class Date {
	public $gmtoffset;

	public $idioma;
	
	public function __construct(){

		list($this->year, $this->month, $this->day) = explode("-", date("Y-m-d"));
		list($this->hour, $this->minute, $this->second) = explode(":", date("g:i:s"));
		$this->gmtoffset = 0;
	}

	public function Date($lang) {
		/*setlocale (LC_TIME, 'id_ID');*/
		/*setlocale (LC_TIME,en_US);*/
		list($this->year, $this->month, $this->day) = explode("-", gmdate("Y-m-d"));
		list($this->hour, $this->minute, $this->second) = explode(":", gmdate("g:i:s"));
		$this->gmtoffset = 0;
		$this->idioma=$lang;
	}

	public function getYear() {
		return $this->year;
	}
	public function setYear($year) {
		$year = intval($year);
		if($year >= 0) {
			$this->year = $year;
		} else {
			/*throw new Exception("Invalid year! Prior to 0 A.D.!");*/
		}
		return true;
	}
	public function getMonth() {
		return $this->month;
	}
	public function setMonth($month) {
		$month = intval($month);
		if(($month >= 1) && ($month <= 12)) {
			$this->month = $month;
		} else {
			/*throw new Exception("Invalid month! Not between 1 and 12!");*/
		}
		return true;
	}
	public function getDay() {
		return $this->day;
	}
	public function setDay($day) {
		$day = intval($day);
		if(($day >= 1) && ($day <= 31)) {
			$this->day = $day;
		} else {
			/*throw new Exception("Invalid day! Not between 1 and 31!");*/
		}
		return true;
	}
	public function getHour() {
		return $this->hour;
	}
	public function setHour($hour) {
		$hour = intval($hour);
		if(($hour >= 0) && ($hour <= 23)) {
			$this->hour = $hour;
		} else {
			/*throw new Exception("Invalid hour! Not between 0 & 23!");*/
		}
		return true;
	}
	public function getMinute() {
		return $this->minute;
	}
	public function setMinute($minute) {
		$minute = intval($minute);
		if(($minute >= 0) && ($minute <= 59)) {
			$this->minute = $minute;
		} else {
			/*throw new Exception("Invalid minute! Not between 0 and 59!");*/
		}
		return true;
	}
	public function getSecond() {
		return $this->second;
	}
	public function setSecond($second) {
		$second = intval($second);
		if(($second >= 0) && ($second <= 59)) {
			$this->second = $second;
		} else {
			/*throw new Exception("Invalid second! Not between 0 and 59!");*/
		}
		return true;
	}
	public function getGMTOffset() {
		return $this->gmtoffset;
	}
	public function setGMTOffset($gmtoffset) {
		$gmtoffset = intval($gmtoffset);
		if(($gmtoffset >= -12) && ($gmtoffset <= 12)) {
			$this->gmtoffset = $gmtoffset;
		} else {
			/*throw new Exception("Invalid GMT offset! Not between -12 and 12!");*/
		}
		return true;
	}
	public function setDate($year, $month, $day) {
		$this->setYear($year);
		$this->setMonth($month);
		$this->setDay($day);
		return true;
	}
	public function setTime($hour, $minute, $second, $gmtoffset = 0) {
		$this->setHour($hour);
		$this->setMinute($minute);
		$this->setSecond($second);
		$this->setGMTOffset($gmtoffset);
		return true;
	}
	public function setDateTime($year, $month, $day, $hour, $minute, $second, $gmtoffset) {
		$this->setDate($year, $month, $day);
		$this->setTime($hour, $minute, $second, $gmtoffset);
		return true;
	}
	public function timestamp() {
		/*This public function returns a user's correct timezone in the form*/
		/*of a unix timestamp.*/
		return mktime($this->hour + $this->gmtoffset,
			$this->minute,
			$this->second,
			$this->month,
			$this->day,
			$this->year);
	}
	public function longDateTimeHuman($db_date) {
		/*Returns a date string like "Saturday, November 5, 2005 3:25 PM".*/
		if(empty($db_date)){
			return date("l, j F, Y g:i A", $this->timestamp());
		}
		else {
			return date("l, j F, Y g:i A", strtotime($db_date));
		}
	}
	public function nameDay(){
		/*Returns a day string like "Saturday".*/
		return date("l", $this->timestamp());
	}
	public function nameMoth(){
		/*retorna un string del mes "November".*/
		return date("F", $this->timestamp());
	}

	public function nameDayIndo($nameDay){
		switch($nameDay)
		{
			case "Saturday": return("Sabtu");break;
			case "Sunday": return("Minggu");break;
			case "Monday": return("Senin");break;
			case "Tuesday": return("Selasa");break;
			case "Wednesday": return("Rabu");break;
			case "Thursday": return("Kamis");break;
			case "Friday": return("Jumat");break;
		}
	}
	public function nameMonthIndo($nameMonth){
		switch($nameMonth)
		{      
			case "January": return(_JAN);break;
			case "February": return(_FEB);break;
			case "March": return(_MAR);break;
			case "April": return(_APR);break;
			case "May": return(_MAY);break;
			case "June": return(_JUN);break;
			case "July": return(_JUL);break;
			case "August": return(_AUG);break;
			case "September": return(_SEP);break;
			case "October": return(_OCT);break;
			case "November": return(_NOV);break;
			case "December": return(_DEC);break;
		}
	}

	public function longDateHuman($type = 'en') {
		/*  Returns a date string like "Saturday, November 5, 2005".*/
		if($type =="en")
			return date("l, j F , Y", $this->timestamp());
		else
		{
			return "".$this->diaSemana_es($this->diaSemana()).", ".$this->mes_es($this->mes())." ".$this->day.", ".$this->year;
		}
	}
	public function shortDateHuman($db_date='') {
		/*    Returns a date string like "November 5, 2005".*/
		if(empty($db_date)){
			return date("F j, Y", $this->timestamp());
		}
		else {
			return date("F j, Y", strtotime($db_date));
		}
	}
	public function longTimeHuman($db_date='') {
		/*Returns a time like "3:32:56 PM". F j of Y, g:i a*/
		if(empty($db_date)){
			return date("g:i:s A", $this->timestamp());
		}
		else {
			return date("g:i:s A", strtotime($db_date));
		}
		/*return date("F j of Y", $this->timestamp());*/
	}
	public function shortTimeHuman($db_date='') {
		/*Returns a time like "3:32 PM".*/
		if(empty($db_date)){
			return date("g:i A", $this->timestamp());
		}
		else {
			return date("g:i A",strtotime($db_date));
		}
	}
	public function militaryTime() {
		/*Returns a time like "15:34:24".*/
		return date("h:i:s", $this->timestamp());
	}
	public function SQLDate() {
		return date("Y-m-d", $this->timestamp());
	}

	public function SQLTime() {
		return date("h:i:s", $this->timestamp());
	}
	public function SQLDateTime() {
		return date("Y-m-d h:i:s", $this->timestamp());
	}

	public function arrMonthIndo(){
		$bulans = array(
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember'
		);
		return $bulans;
	}

}