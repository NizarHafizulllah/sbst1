<?php 

class wsim_keluar_model extends CI_Model {


	function wsim_keluar_model(){
		parent::__construct();
	}



	function get_last($material){
		

		$this->db->where('material', $material);
		$this->db->order_by('id', 'desc');

		$res = $this->db->get('material_sim')->row_array();
		return $res;
	}




	function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"tanggal",
							"s.nama",
							"kode",
							"keluar",
							"uraian"							 
		 	);


		 $this->db->select('sj.*, s.nama as nama, p.polres as polres')->from('material_sim sj');
		 $this->db->join('sim_jenis s', 's.id=sj.material', 'left');
		 $this->db->join('m_polres p', 'p.id=sj.polres', 'left');
		 $this->db->order_by('sj.tgl_record', 'desc');


		 $this->db->where('sj.jenis', 'keluar');
		 


		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}
	


}

?>