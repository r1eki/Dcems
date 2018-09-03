<?php

function getBulan($bln) {
	switch ($bln) {
		case 1:
			return "Januari";
			break;
		case 2:
			return "Februari";
			break;
		case 3:
			return "Maret";
			break;
		case 4:
			return "April";
			break;
		case 5:
			return "Mei";
			break;
		case 6:
			return "Juni";
			break;
		case 7:
			return "Juli";
			break;
		case 8:
			return "Agustus";
			break;
		case 9:
			return "September";
			break;
		case 10:
			return "Oktober";
			break;
		case 11:
			return "November";
			break;
		case 12:
			return "Desember";
			break;
	}
}

function getDay($day) {
	switch ($day) {
		case 1:
			return "Senin";
			break;
		case 2:
			return "Selasa";
			break;
		case 3:
			return "Rabu";
			break;
		case 4:
			return "Kamis";
			break;
		case 5:
			return "Jumat";
			break;
		case 6:
			return "Sabtu";
			break;
		case 7:
			return "Minggu";
			break;
	}
}

function tglIndo($tgl) {
	$tm=strtotime($tgl);
	$mm=getBulan(date("m",$tm));
	$dd=date("d",$tm);
	$yy=date("Y",$tm);
	$hari=getDay(date("N",$tm));
	return $hari.', '.$dd.' '.$mm.' '.$yy;
}

if ( ! function_exists('setActive')) {
	# code...
	function setActive($path)
	{
	    return Request::is($path . '*') ? ' class=active' :  '';
	}
}

if ( ! function_exists('read_more'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function read_more($string,$limit=100)
	{
		$length = strlen(strip_tags($string));
		if ($length>$limit){
			// return substr(strip_tags($string),0,$limit).' . . . ';
			$isi_halaman = strip_tags($string);
			$isi = substr($isi_halaman,0,$limit);
			$isi = substr($isi_halaman,0,strrpos($isi," "));

			return $isi;

		}
		else {
			return strip_tags($string);
		}
	}
}

if (! function_exists('goResult'))
{

	function goResult($def,$msg){
    	$data['status'] 	= $def;
		$data['msg'] 	= $msg;
		return toJson($data);
    }
}

if ( ! function_exists('youtube_preview'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function youtube_preview($url)
	{
		//https://www.youtube.com/watch?v=3p4MZJsexEs
		//https://img.youtube.com/vi/3p4MZJsexEs/mqdefault.jpg
		$bodytag = str_replace("https://www.youtube.com/watch?v=", "https://img.youtube.com/vi/", $url);
		return $bodytag.'/mqdefault.jpg';
	}
}

if ( ! function_exists('youtube_embed'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function youtube_embed($url)
	{
		//https://www.youtube.com/watch?v=3p4MZJsexEs
		//https://img.youtube.com/vi/3p4MZJsexEs/mqdefault.jpg
		$bodytag = str_replace("https://www.youtube.com/watch?v=", "//www.youtube.com/embed/", $url);
		return $bodytag.'/mqdefault.jpg';
	}
}



if ( ! function_exists('find_replace'))
{
	/**
	 * Site URL
	 *
	 * Create a local URL based on your basepath. Segments can be passed via the
	 * first parameter either as a string or an array.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function find_replace($string,$find)
	{
		$bodytag = str_replace($find, "<b><u>".$find."</u></b>", $string);
		return $bodytag;
	}
}

if ( ! function_exists('toJson'))
{
	function toJson($var) {
	    header('Content-Type: application/json');
	    return json_encode($var);
	}
}


if ( ! function_exists('seo'))
{
	function seo($s) {
	    $c = array (' ');
	    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    $s = strtolower(str_replace($c, '-', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
		}
}

if ( ! function_exists('seo_gbr'))
{
	function seo_gbr($s) {
	    $c = array (' ');
	    $d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
	    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
	    $s = str_replace($c, '-', $s); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
	    return $s;
		}
}

if ( ! function_exists('match'))
{
	function match($val,$val2,$return){
		if ($val==$val2){
			return $return;
		}
	}
}

if ( ! function_exists('daysLeft'))
{
	function daysLeft($date,$day){
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = Date('Y-m-d');
		$now 	= new DateTime($tanggal);
		$date 	= new DateTime($date);
		$result = $now->diff($date);

		return (($day - $result->days)<=0) ? 0 : $day - $result->days ;
	}
}


if ( ! function_exists('zero'))
{
	function zero($data,$url){
		if(count($data)<=0){
			redirect($url);
			exit;
		}
	}
}


if ( ! function_exists('remFile'))
{
	function remFile($path){
		if(file_exists($path)){
			if(unlink($path)){
				return true;	
			}
			
		}

		return false;
	}
}



if (!function_exists('img_holder')){
	function img_holder($type=null){
		switch ($type) {
			case 'food':
				return '/images/placeholder/food.png';
				break;
			case 'profile':
			    return '/images/placeholder/avatar.png';
				break;
			default:
				return base_url('images/placeholder/placeholder.png');
				# code...
				break;
		}
	}
}


if (!function_exists('notif_type')){
	function notif_type($data,$type=null){

		switch ($data) {
			case 'restaurant':
				$hasil 		= ($type==null) ? '<span class="label label-danger  label-icon"><i class="fa fa-cutlery"></i></span>' : '<span class="label label-danger  label-icon"><i class="fa fa-cutlery"></i></span>';
				break;
			case 'users':
			    $hasil 		= ($type==null) ? '<span class="label label-primary  label-icon"><i class="fa fa-users"></i></span>' : '<span class="label label-primary  label-icon"><i class="fa fa-users"></i></span>';
				break;
			case 'preorder':
			    $hasil 		= ($type==null) ? '<span class="label label-success  label-icon"><i class="fa fa-truck"></i></span>' : '<span class="label label-success  label-icon"><i class="fa fa-truck"></i></span>';
				break;
			case 'promo':
			    $hasil 		= ($type==null) ? '<span class="label label-warning  label-icon"><i class="fa fa-gift"></i></span>' : '<span class="label label-warning  label-icon"><i class="fa fa-gift"></i></span>';
				break;
			case 'review':
			    $hasil 		= ($type==null) ? '<span class="label label-info  label-icon"><i class="fa fa-newspaper-o"></i></span>' : '<span class="label label-info  label-icon"><i class="fa fa-newspaper-o"></i></span>';
				break;
			case 'message':
			    $hasil 		= ($type==null) ? '<span class="label bg-purple  label-icon"><i class="fa fa-envelope-o"></i></span>' : '<span class="label bg-inverse  label-icon"><i class="fa fa-envelope-o"></i></span>';
				break;
			default:
				$hasil 		= ($type==null) ? '<span class="label label-default  label-icon"><i class="fa fa-question"></i></span>' : '<span class="label label-default  label-icon"><i class="fa fa-question"></i></span>';
				# code...
				break;
		}

		return $hasil;
	}
}

if ( ! function_exists('toTime'))
{
	function toTime($date){
		$time=strtotime($date);
		return date("H:i",$time);
	}
}

// ------------------------------------------------------------------------
if (!function_exists('tgl_indo')){
	
	function tgl_indo($tgl){
     	$tanggal = substr($tgl,8,2);
     	switch (substr($tgl,5,2)){
					case '01': 
						$bulan= "Januari";
						break;
					case '02':
						$bulan= "Februari";
						break;
					case '03':
						$bulan= "Maret";
						break;
					case '04':
						$bulan= "April";
						break;
					case '05':
						$bulan= "Mei";
						break;
					case '06':
						$bulan= "Juni";
						break;
					case '07':
						$bulan= "Juli";
						break;
					case '08':
						$bulan= "Agustus";
						break;
					case '09':
						$bulan= "September";
						break;
					case '10':
						$bulan= "Oktober";
						break;
					case '11':
						$bulan= "November";
						break;
					case '12':
						$bulan= "Desember";
						break;
				}

		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;
     }
}

if (!function_exists('dateRange')){
	function dateRange($strDateFrom,$strDateTo)
	{
	    $aryRange=array();

	    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
	    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

	    if ($iDateTo>=$iDateFrom)
	    {
	        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
	        while ($iDateFrom<$iDateTo)
	        {
	            $iDateFrom+=86400; // add 24 hours
	            array_push($aryRange,date('Y-m-d',$iDateFrom));
	        }
	    }
	    return $aryRange;
	}
}

if (!function_exists('getBreakText')) {
	# code...
	function getBreakText($t) {
	    return strtr($t, array('\\r\\n' => '<br>', '\\r' => '<br>', '\\n' => '<br>'));
	}
}