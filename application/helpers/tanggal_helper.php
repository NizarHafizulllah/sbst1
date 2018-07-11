<?php

function ribuan($angka) {
	return number_format($angka,0,',','.');
}

function ora_date($date){

	$mo = array(1=>"JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");

	$tmp = explode("-", $date);

	$tgl = $tmp[0]."-".$mo[intval($tmp[1])]."-".$tmp[2];
	return $tgl;

}


function hari($tgl) {
		// format tanggal haru Y-m-d
		$tgl = str_replace("-", "/", $tgl);
		$tgl = strtotime($tgl);
		$hari = date("l",$tgl);
		$arr_hari = array("Sunday"=>"Minggu",
						   "Monday" => "Senin",
						   "Tuesday" => "Selasa",
						   "Wednesday" => "Rabu",
						   "Thursday"  => "Kamis",
						   "Friday" => "Jum'at",
						   "Saturday" => "Sabtu"	);

		return $arr_hari[$hari];
}


function indo_date($date){

	$mo = array(1=>"JAN","FEB","MAR","APR","MAY","JUN","JUL","AUG","SEP","OCT","NOV","DEC");
	$mo = array_flip($mo);
	$tmp = explode("-", $date);

	$tgl = $tmp[0]."-".$mo[$tmp[1]]."-".$tmp[2];
	return $tgl;

}


function romawi($number) {
    $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    $returnValue = '';
    while ($number > 0) {
        foreach ($map as $roman => $int) {
            if($number >= $int) {
                $number -= $int;
                $returnValue .= $roman;
                break;
            }
        }
    }
    return $returnValue;
}

function tgl_indo($date){

	$mo = array(1=>
	"Januari","Februari","Maret",
	"April","Mei","Juni",
	"Juli","Agustus","September",
	"Oktober","November","Desember");
	//$mo = array_flip($mo);
	$tmp = explode("-", $date);

	$tgl = $tmp[2]." ".$mo[intval($tmp[1])]." ".$tmp[0];
	return $tgl;

}


function todate($date) {

	if(empty($date)) return "";

	$thn = substr($date,0,4);
	$bln = substr($date,4,2);
	$tgl = substr($date,6,2);

	$jam = substr($date,8,2);
	$menit = substr($date,10,2);
	$detik = substr($date,12,2);
	return "$tgl-$bln-$thn $jam:$menit:$detik ";

}


function todate2($date) {

	if(empty($date)) return "";

	$thn = substr($date,0,4);
	$bln = substr($date,4,2);
	$tgl = substr($date,6,2);

	// $jam = substr($date,8,2);
	// $menit = substr($date,10,2);
	// $detik = substr($date,12,2);
	return "$thn-$bln-$tgl";

}



function service_date($tgl){
	$tmp = explode("-", $tgl);
	$ret = $tmp[2].$tmp[1].$tmp[0];
	return $ret;
}


function nama_desa($str) {
	$tmp  = explode(" ", $str);

	$arr = array("I","II","III","IV","V","VI","VII","VIII");

	$max_array = count($tmp) - 1;


	if(in_array($tmp[$max_array],$arr))
	{
		$suffix = $tmp[$max_array]; 
		$nama_desa = "";

		for($i=0; $i<$max_array; $i++) { 

			$nama_desa .=$tmp[$i]." ";
		}	

		$nama_desa = ucwords(strtolower($nama_desa))." ".$tmp[count($tmp)-1]; 
		//return $nama_desa; 

	}
	else {
		$nama_desa = ucwords(strtolower($str));
	}

	return $nama_desa;


	
}


?>