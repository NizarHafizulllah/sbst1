<?php 
class login extends CI_Controller {
	function __construct(){
		parent::__construct(); 
		$this->load->helper("tanggal");
	}


function index() {
	$hash = md5(microtime());
	$_SESSION['hash'] = $hash;
	$this->load->view("login_view",array("hash"=>$hash));
}

 

function ceklogin(){
	$post = $this->input->post();
	// show_array($post);

  	$this->db->select("u.*")
    ->from("pengguna u")  	
    // ->join("admin_type a","a.admin_type=u.admin_type","left")
  	->where("username",$post['username'])
  	->where("password",md5($post['password']));

  	$rs = $this->db->get();

    // echo $this->db->last_query();

  	if($rs->num_rows() == 1) {
  		$userdata  = $rs->row_array();
    
      if  ($userdata['level']==1){
              $userdata['url'] = site_url("wilayah");
      $ret  = array("error"=>false,
              "message"=>"Login succes",
              "url"=>$userdata['url']);
      $userdata['login_wilayah'] = true;
      $_SESSION['userdata'] = $userdata;

    }else if($userdata['level']==2){
     
              $userdata['url'] = site_url("korlantas");
              $ret  = array("error"=>false,
                            "message"=>"Login succes",
                            "url"=>$userdata['url']);
      $userdata['login_korlantas'] = true;

      $_SESSION['userdata'] = $userdata;
    }else if($userdata['level']==3){
        $userdata['url'] = site_url("superadmin");
              $ret  = array("error"=>false,
                            "message"=>"Login succes",
                            "url"=>$userdata['url']);
      $userdata['login_admin'] = true;

      $_SESSION['userdata'] = $userdata;       
    }     


  	}
  	else {
  		$ret  = array("error"=>true,
  					  "message"=>"Username Atau Password Tidak Dikenali");
  	}
  	echo json_encode($ret);
}

function logout_admin(){
  unset($_SESSION['userdata']);
  $this->session->unset_userdata("userdata");
  redirect("login");
}

function cekusername($username){

  if(empty($username)) {

    $this->form_validation->set_message('cekusername', ' %s Harus diisi ');
    return false;
  }

  $this->db->where("username",$username);

  if($this->db->get("pengguna")->num_rows() > 0 ) {
    $this->form_validation->set_message('cekusername', ' %s Sudah digunakan');
    return false;
  }

}

function cekpassword($p1) {
  $p2 = $_POST['p2'];

  if(empty($p1) || empty($p2)) {
    $this->form_validation->set_message('cekpassword', ' Password harus diisi');
    return false;
  }

  if(  $p1 <> $p2 ) {
    $this->form_validation->set_message('cekpassword', ' Password tidak sama');
    return false;
  }


}




function logout(){
  unset($_SESSION['userdata']);
  $this->session->unset_userdata("userdata");
  redirect("login");
}

}
?>