<?php
class wsim_masuk extends wilayah_controller {

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
		$data_array['arr_jenis'] = $this->cm->arr_dropdown('sim_jenis', 'id', 'nama', 'nama');

		$content = $this->load->view($this->controller."_view",$data_array,true);

		$this->set_subtitle("SIM - Material Masuk");
		$this->set_title("SBST");
		$this->set_content($content);
		$this->render();
	}



	function simpan(){
		$post = $this->input->post();
        // show_array($post);

		$userdata = $_SESSION['userdata'];

		$post['id_user'] = $userdata['id'];


		 $this->load->library('form_validation');
        $this->form_validation->set_rules('tanggal','Tanggal','required');          
        $this->form_validation->set_rules('material','Material','required');
        $this->form_validation->set_rules('kode','Kode Barcode','required');
        $this->form_validation->set_rules('masuk','Jumlah','required');
        $this->form_validation->set_message('required', ' %s Harus diisi ');
        $this->form_validation->set_error_delimiters('', '<br>');



    if($this->form_validation->run() == TRUE ) { 

        $post['tanggal'] = flipdate($post['tanggal']);
        $post['jenis'] = 'masuk';
        $data = $this->dm->get_last($post['material']);

        if (!empty($data)) {
            $post['jumlah'] = $post['masuk']+$data['jumlah'];
        }else{
            $post['jumlah'] = $post['masuk'];
        }

        // show_array($post);
        // exit();

        $res = $this->db->insert('material_sim', $post); 
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
                flipdate($row['tanggal']),
                $row['nama'],
                $row['kode'],
                $row['masuk'],
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