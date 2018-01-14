<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	protected $data; // global variabel data

	function __construct() {
  		parent::__construct();
  		$this->load->library('session'); // load library session
  		$this->load->library('table'); // load library table
  		$this->load->model('m_settings','settings'); // load model database
	}

  function index(){
      if (!$this->session->userdata('id')) {
        // redirect them to the login page
        redirect('auth', 'refresh');
      } elseif(!empty($this->session->userdata('id'))) {
        //user id check after login successfully
        $userid = $this->session->userdata('id');
        $this->data['header'] = 'dashboard';
        $this->data['subheader'] = 'dashboard';
        $this->data['title_head'] = 'dashboard';
        //end page header
        $this->data['page'] = "dashboard";
      	$this->data['data_kota'] = $this->settings->get_data_value('kota')->result();
        //content view
        $this->data['content'] = $this->load->view('back/content/v_dashboard', $this->data, true);
        //end content view
        //main content
        $this->load->view('back/layout/v_main', $this->data);
        //end main content
      } else {
        redirect('auth', 'refresh');
      }
	 }

	 function list_kecamatan($id){
		 $data = $this->settings->get_data_kecamatan('kecamatan', $id)->result();
		 echo json_encode($data);
	 }

   //-- check session --//
   public function checksession()
   {
       if(!empty($this->session->userdata('id')))
       {
           echo json_encode(array("session" => TRUE));
       }
       else
       {
           echo json_encode(array("session" => FALSE));
       }

   }

}
