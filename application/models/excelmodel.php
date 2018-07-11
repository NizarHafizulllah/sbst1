<?php

class excelmodel extends CI_Model {
	function __construct() {
		parent::__construct();
	}


function getdatalaporan($post) {


// $post = $this->input->get(); 
	// show_array($post);
	extract($post); 

	$this->db->select("
			p.*, if(p.status=0,'DAFTAR',
				IF(p.status=2,'VER. LV2',IF(p.status=3,'VER. LV3','X'))) AS status2,
		,   
   IF((p.approved=0 and approved_error = 0 ), 'TUNGGU BLOKIR', 
   if((p.approved=0 and approved_error = 1),'TUNGGU BLOKIR',
   if((p.approved=0 and approved_error = 2),'BATAL BLOKIR (BPKB sudah diblokir)',
   if((p.approved=0 and approved_error = 3),'BATAL BLOKIR (KENDARAAN SUDAH JADI BPKB)',
   if((p.approved=0 and approved_error = 4),'BPKB SUDAH TERBIT DAN SUDAH TIDAK AKTIF',
   if((p.approved=0 and approved_error = 5),'USER TIDAK DITEMUKAN',
   
   IF(p.approved=1,'BLOKIR BPKB',IF(p.approved=2, 'CEK ABSAH POLISI, NOMOR RANGKA TIDAK DITEMUKAN', '-'))))) ) ) ) AS approved2,
			cab.cabang_nama",false);
		$this->db->where("p.leasing_id",$leasing_id);	

		if($id_polda <> 'x') { 
		$this->db->where("id_polda",$id_polda); }
		
		$this->db->where("jenis_permohonan",$jenis_permohonan);
		$this->db->from("t_pendaftaran p");
		$this->db->join("t_cabang cab",'p.cabang_id = cab.cabang_id','left');
		$this->db->order_by("daft_id desc");
		

		if($status <> '0') {

			 if($status==1) { // level 2 
			 	$this->db->where("status",2);
			 }
			 if ($status==2){ //
			 	$this->db->where("approved",0);
			 	$this->db->where("approved_error",0);			 	
			 }
			 if ($status==3){
			 	$this->db->where("approved",0);
			 	$this->db->where("approved_error <> 0 ",null,false);		
			 }
			 if($status==4){
			 	$this->db->where("approved",1);
			 }
		} 

		 
		if($bayar<>'x'){
			$this->db->where("bayar",$bayar);
		}

		if(!empty($no_rangka) ) {
			//$no_rangka = $param['no_rangka'];
			$this->db->where("(no_rangka = '$no_rangka' or no_bpkb='$no_rangka') ",null,false);
		}

		if( !empty($tanggal_awal) ) {

			$tanggal_awal = flipdate($tanggal_awal);
			$tanggal_akhir = flipdate($tanggal_akhir);
			$this->db->where("daft_date between '$tanggal_awal'  and '$tanggal_akhir'");
		}

		$this->db->order_by("cabang_id,daft_date"); 

		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
		return $res;



}


}

?>