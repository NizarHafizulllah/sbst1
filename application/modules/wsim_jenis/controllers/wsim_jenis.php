<?php
class wsim_jenis extends wilayah_controller {

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
		$data_array['arr_satuan'] = $this->cm->arr_dropdown('satuan', 'id', 'satuan', 'satuan');

		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("SIM - Jenis Material");
		$this->set_title("SBST");
		$this->set_content($content);
		$this->render();
	}



	function simpan(){
		$post = $this->input->post();
		$userdata = $_SESSION['userdata'];

		$post['user_id'] = $userdata['id'];

		$post['tgl_input'] = date('Y-m-d h:i:s');

		 $this->load->library('form_validation');
        $this->form_validation->set_rules('jenis','Jenis Material','required');          
        $this->form_validation->set_rules('kode','Kode Material','required');
        $this->form_validation->set_rules('nama','Nama Material','required');
        $this->form_validation->set_rules('satuan','Satuan Material','required');
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        $this->form_validation->set_error_delimiters('', '<br>');



    if($this->form_validation->run() == TRUE ) { 

        
        $res = $this->db->insert('sim_jenis', $post); 
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


	 function get_data() {

        
        // show_array($userdata);

        $draw = $_REQUEST['draw']; // get the requested page 
        $start = $_REQUEST['start'];
        $limit = $_REQUEST['length']; // get how many rows we want to have into the grid 
        $sidx = isset($_REQUEST['order'][0]['column'])?$_REQUEST['order'][0]['column']:0; // get index row - i.e. user click to sort 
        $sord = isset($_REQUEST['order'][0]['dir'])?$_REQUEST['order'][0]['dir']:"desc"; // get the direction if(!$sidx) $sidx =1;  
        
  
        



      //  order[0][column]
        $req_param = array (
                "sort_by" => $sidx,
                "sort_direction" => $sord,
                "limit" => null,
                
                 
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

        

             
            $arr_data[] = array(
                $row['jenis'],
                $row['kode'],
                $row['nama'],
                $row['satuan'],
                $row['uraian'],
                
                     
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