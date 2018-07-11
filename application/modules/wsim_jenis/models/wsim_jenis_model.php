<?php 

class wsim_jenis_model extends CI_Model {


	function wsim_jenis_model(){
		parent::__construct();
	}







	function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"jenis",
							"kode",
							"nama",
							"satuan",
							"uraian"							 
		 	);


		 $this->db->select('sj.*, s.satuan as satuan')->from('sim_jenis sj');
		 $this->db->join('satuan s', 's.id=sj.satuan', 'left');
		 $this->db->order_by('sj.tgl_input', 'desc');
		 // $this->db->where('id_jadwal', $id_jadwal);

		 


		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}
	


}

?>