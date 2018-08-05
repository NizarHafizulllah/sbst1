<?php
class sa_pengguna extends super_admin_controller {

	var $controller ;

	function __construct(){
		parent::__construct();
		// $this->load->model("core_model","cm");
		$this->load->model("coremodel","cm");
		// $this->load->helper("tanggal");
		$this->controller = get_class($this);
		$this->load->model($this->controller."_model","dm");
		

	}

	function index(){

		$data_array = array();
		$data_array['arr_level'] = array('' => '- Pilih Level -',
										'1' => 'Admin Wilayah',
										'2' => 'Admin Korlantas',
										'3' => 'Super Admin');


		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("Pengguna");
		$this->set_title("SBST");
		$this->set_content($content);
		$this->render();
	}



	function simpan(){
		$post = $this->input->post();
		$userdata = $_SESSION['userdata'];

		// show_array($post);
		// exit();

		// $post['user_id'] = $userdata['id'];

		$post['tgl_input'] = date('Y-m-d h:i:s');

		if ($post['jenis']=='simpan') {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('cekusername', 'username', 'callback_cekusername');
      		$this->form_validation->set_rules('cekpass','p1','callback_cekpass');
      		$this->form_validation->set_rules('nama','Nama','required');          
        	$this->form_validation->set_rules('level','Level','required');
        	
		}else if ($post['jenis']=='update') {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('cekuser2', 'username', 'callback_cekuser2');
      		$this->form_validation->set_rules('cekpass2','p1','callback_cekpass2');
      		$this->form_validation->set_rules('nama','Nama','required');          
        	$this->form_validation->set_rules('level','Level','required');
		}

		
		$this->form_validation->set_message('required', ' %s Harus diisi ');
        	$this->form_validation->set_error_delimiters('', '<br>');


    if($this->form_validation->run() == TRUE ) { 

        if (!empty($post['p1'])) {
    		$post['password'] = md5($post['p1']);
        }

    	unset($post['p1']);
    	unset($post['p2']);
    	$jenis = $post['jenis'];
    	unset($post['jenis']);

    	if ($jenis=='simpan') {
    		$res = $this->db->insert('pengguna', $post);	
    	}else if ($jenis=='update') {
    		$this->db->where('id', $post['id']);
    		$res = $this->db->update('pengguna', $post);
    	}
         
        if($res){
            $arr = array("error"=>false,'message'=>"BERHASIL DISIMPAN");
        }
        else {
             $arr = array("error"=>true,'message'=>"GAGAL  DISIMPAN");
        }

              
    }
    else {
    $arr = array("error"=>true,'message'=>validation_errors());
    }
        echo json_encode($arr);
	}


function cekpass2($pass){
	$post  = $_POST;

	 
	if($post['p1'] <> $post['p2']) {
		$this->form_validation->set_message('cekpass2', ' %s tidak sama ');
		return false;
	}
}

function cekuser2($username){
	$post  = $_POST;

	if($post['username']=="") {
		$this->form_validation->set_message('cekuser', ' %s Harus diisi ');
		return false;
	}
	$this->db->where('id !=', $post['id']);
	$this->db->where('username', $post['username']);
	$res = $this->db->get('pengguna');

	if ($res->num_rows()>0) {
		$this->form_validation->set_message('cekuser', ' %s telah dipakai ');
		return false;
	}

	
}


function hapus(){
	$data = $this->input->post();
	$this->db->where("id",$data['id']);
	$res = $this->db->delete("pengguna");
	if($res){
		$ret = array("error"=>false,"message"=>"Data Berhasi dihapus");

	}
	else {
		$ret = array("error"=>true,"message"=>"Data gagal dihapus");
	}
	echo json_encode($ret);
}


function cekusername($username){
  $post = $_POST;
  $username = $post['username'];
  if(empty($username)) {

    $this->form_validation->set_message('cekusername', ' Username Harus diisi ');
    return false;
  }

  $this->db->where("username",$username);

  if($this->db->get("pengguna")->num_rows() > 0 ) {
    $this->form_validation->set_message('cekusername', ' Username Sudah digunakan');
    return false;
  }

}

function cekpass(){
  $post  = $_POST;

  if($post['p1']=="" or $post['p2']=="") {
    $this->form_validation->set_message('cekpass', ' Password Harus diisi ');
    return false;
  }

  if($post['p1'] <> $post['p2']) {
    $this->form_validation->set_message('cekpass', ' Password tidak sama ');
    return false;
  }
}

  function get_row(){
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $res = $this->db->get('pengguna')->row_array();

        echo json_encode($res);
    }

	 function get_data() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        $username = $_REQUEST['columns'][1]['search']['value'];
        $nama = $_REQUEST['columns'][2]['search']['value'];
        $level = $_REQUEST['columns'][3]['search']['value'];



      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                "username" => $username,
                "nama" => $nama,
                "level" => $level
                
                 
        );     

        // show_array($req_param);
           
        $row = $this->dm->data($req_param)->result_array();
        
        $count = count($row); 
       
        
        $req_param['limit'] = array(
                    'start' => $start,
                    'end' => $limit
        );
          
        
        $result = $this->dm->data($req_param)->result_array();
        

       // show_array($result);
       // exit;
        $arr_data = array();
        foreach($result as $row) : 
        // $daft_id = $row['daft_id'];
        $id = $row['id'];

         $action = "<div class='btn-group'>
                              <button type='button' class='btn btn-primary'>Action</button>
                              <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown'>
                                <span class='caret'></span>
                                <span class='sr-only'>Toggle Dropdown</span>
                              </button>
                              <ul class='dropdown-menu' role='menu'>
                                <li><a href ='#' onclick=\"edit('$id')\"><i class='fa fa-pencil'></i> Edit</a></li>
                                <li><a href ='#' onclick=\"hapus('$id')\"><i class='fa fa-trash'></i> Hapus</a></li>
                              </ul>
                            </div>";
         if ($row['level']==1) {
         	$level = 'Admin Wilayah';
         }else if ($row['level']==2) {
         	$level = 'Admin Korlantas';
         }else if ($row['level']==3) {
         	$level = 'Super Admin';
         }
             
            $arr_data[] = array(
                $row['username'],
                $row['nama'],
                $level,
                $action
                     
                                );
        endforeach;

         $responce = array('draw' => $draw, // ($start==0)?1:$start,
                          'recordsTotal' => $count, 
                          'recordsFiltered' => $count,
                          'data'=>$arr_data
            );
         
        echo json_encode($responce); 
    }


	
}

?>