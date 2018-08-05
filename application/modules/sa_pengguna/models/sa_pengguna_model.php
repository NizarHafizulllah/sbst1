<?php 

class sa_pengguna_model extends CI_Model {


	function sa_pengguna_model(){
		parent::__construct();
	}







	function data($param)
	{		

		// show_array($param);
		// exit;

		 extract($param);

		 $kolom = array(0=>"username",
							"nama",
							"level",
							"id"							 
		 	);


		 $this->db->select('u.*,')->from('pengguna u');
		
		 $this->db->order_by('u.level', 'desc');
		 // $this->db->where('id_jadwal', $id_jadwal);

		 if(!empty($username)) {
            $this->db->where("u.username",$username);
         }

          if(!empty($nama)) {
            $this->db->like("u.nama",$nama);
         }

          if(!empty($level)) {
            $this->db->where("u.level",$level);
         }


		($param['limit'] != null ? $this->db->limit($param['limit']['end'], $param['limit']['start']) : '');
		//$this->db->limit($param['limit']['end'], $param['limit']['start']) ;
       
       ($param['sort_by'] != null) ? $this->db->order_by($kolom[$param['sort_by']], $param['sort_direction']) :'';
        
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
 		return $res;
	}
	


}

?>