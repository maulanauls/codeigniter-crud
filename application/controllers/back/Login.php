<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	protected $data; // global variabel data

	function __construct() {
  		parent::__construct();
  		$this->load->library('session'); // load library session
  		$this->load->library('table'); // load library table
  		$this->load->model('m_settings','settings'); // load model database
	}

  function index(){
    if(isset($_POST['submit'])){
      $email = str_replace("'","''",$_POST['email']); // email for login ID
      $password = md5(str_replace("'","''",$_POST['password'])); // password for login
      if (empty(str_replace("'","''",$_POST['password'])) && empty($email)){
          $data['error_message'] = 'e-mail and password <p> must be filled'; // e-mail check it if empty fill be validation
          $this->load->view('back/login_v',$data); // login view
      } else {
        if (!empty($email)){ //check email
          if (!empty(str_replace("'","''",$_POST['password']))){ // check password
          $query = $this->db->query("SELECT * FROM user WHERE email='". $email ."' and password ='". $password ."'"); // check query in databases
          $data['user_data'] = $query->result_array();


          if (count(($query->result_array()))>0){ // get data array from table user for insert to session array
              $data_session_array = array(
                'id'			=> $data['user_data'][0]['id'],
                'name'			=> $data['user_data'][0]['name'],
                'name_file'		=> $data['user_data'][0]['name_file'],
                'user_name'		=> $data['user_data'][0]['username'],
                'email'			=> $data['user_data'][0]['email']
              );
              $temporer = $this->session->set_userdata($data_session_array); // session array
              redirect('back/auth/index');
          } else {
            $data['error_message'] = 'user account <p> not found'; // if account not found
            $this->load->view('back/login_v',$data);
          }
          } else {
            $data['error_message'] = 'user name and password <p> must be filled'; // password and username empty
            $this->load->view('back/login_v',$data);
          }
          } else {
            $data['error_message'] = 'user name and password <p> must be filled'; // password and username empty
            $this->load->view('back/login_v',$data);
          }
      }
      } else {
        $this->load->view('back/login_v');
      }
  }

  function logout(){
  		$data_session_array = array(
    			'id'				=> '',
    			'name'				=> '',
    			'name_file'		=> '',
    			'user_name'			=> '',
    			'email'				=> ''
  		);
  		$this->session->set_userdata($data_session_array);
  		redirect(base_url());
	 }
 }
