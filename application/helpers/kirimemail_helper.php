<?php 

	function sendmaildaftar($data) {
		$ci =& get_instance();
		$pesan = $ci->load->view('email/daftar', $data,true);
		$ci->load->library('email');
		$config = array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'pmbutsumbawa@gmail.com',
		    'smtp_pass' => 'Blackshadow@@66',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8'
		);
		$ci->email->initialize($config);
		$ci->email->set_mailtype("html");
		$ci->email->set_newline("\r\n");		 
		$ci->email->to($data['tujuan']);
		$ci->email->from('pmbutsumbawa@gmail.com','PMB UTS');
		$ci->email->subject($data['subjek']);
		$ci->email->message($pesan);

		//Send email
		$ci->email->send();
	}


	function sendmailpermohonan($data) {
		$ci =& get_instance();
		$pesan = $ci->load->view('email/permohonan', $data,true);
		$ci->load->library('email');
		$config = array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'dukcapilonline.ksb@gmail.com',
		    'smtp_pass' => 'Rahasia1q2w#E$R',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8'
		);
		$ci->email->initialize($config);
		$ci->email->set_mailtype("html");
		$ci->email->set_newline("\r\n");		 
		$ci->email->to($data['tujuan']);
		$ci->email->from('dukcapilonline.ksb@gmail.com','DUKCAPIL Sumbawa Barat');
		$ci->email->subject($data['subjek']);
		$ci->email->message($pesan);

		//Send email
		$ci->email->send();
	}

	function sendmailstatus($data) {
		$ci =& get_instance();
		$pesan = $ci->load->view('email/status', $data,true);
		$ci->load->library('email');
		$config = array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://smtp.gmail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'dukcapilonline.ksb@gmail.com',
		    'smtp_pass' => 'Rahasia1q2w#E$R',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8'
		);
		$ci->email->initialize($config);
		$ci->email->set_mailtype("html");
		$ci->email->set_newline("\r\n");		 
		$ci->email->to($data['tujuan']);
		$ci->email->from('dukcapilonline.ksb@gmail.com','DUKCAPIL Sumbawa Barat');
		$ci->email->subject($data['subjek']);
		$ci->email->message($pesan);

		//Send email
		$ci->email->send();
	}

function kirimemail($tujuan,$subjek,$pesan,$debug=false){
		$CI =& get_instance();

		$username = "taujago@gmail.com";
		$sender_email = "taujago@zahiraccounting.com";
		$user_password = "T0z4QX015EII5ARyOIDkyQ";
		$subject = $subjek;
		$message = $pesan;
		$config['protocol'] = 'smtp';
		// SMTP Server Address for Gmail.
		$config['smtp_host'] = 'smtp.mandrillapp.com';
		// SMTP Port - the port that you is required
		$config['smtp_port'] = "587";
		// SMTP Username like. (abc@gmail.com)
		$config['smtp_user'] = $username;
		// SMTP Password like (abc***##)
		$config['smtp_pass'] = $user_password;


		$config['mailtype'] = 'html';
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";


		// Load email library and passing configured values to email library
		$CI->load->library('email', $config);
		// Sender email address
		$CI->email->from($sender_email, $username);
		// Receiver email address.for single email
		//$CI->email->to($receiver_email);
		//send multiple email
		$CI->email->to($tujuan);
		// Subject of email
		$CI->email->subject($subject);
		// Message in email
		$CI->email->message($message);
		// It returns boolean TRUE or FALSE based on success or failure
		$send = $CI->email->send(); 
		echo  ($debug==true)?$CI->email->print_debugger():"";
	}

