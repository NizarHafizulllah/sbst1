<?php 

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