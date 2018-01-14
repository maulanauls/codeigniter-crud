<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guestbook extends CI_Controller {
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
        $this->data['header'] = 'guestbook';
        $this->data['subheader'] = 'guestbook';
        $this->data['title_head'] = 'guestbook';
        //end page header
        $this->data['page'] = "guestbook";
				$this->data['data_kota'] = $this->settings->get_data_value('kota')->result();
        //content view
        $this->data['content'] = $this->load->view('back/content/v_guestbook', $this->data, true);
        //end content view
        //main content
        $this->load->view('back/layout/v_main', $this->data);
        //end main content
      } else {
        redirect('auth', 'refresh');
      }
	 }

   public function datalist(){
     if(!$this->input->is_ajax_request()) redirect(base_url('404'));
     $list = $this->settings->get_datatables('guestbook');

     $data = array();
     $i = $_POST['start'];

      foreach ($list as $list) {
           $i++;
           $row = array();
           $row[] = $i;
           $row[] = $list->name;
           $row[] = $list->email;
           $row[] = $list->telp;
           $row[] = $list->prov;
           $row[] = $list->kota;
           $row[] = $list->kecamatan;

           $edit_row = '<button class="btn btn-success btn-xs btn-labeled" type="button" href="javascript:void()" title="edit" onclick="edit_guestbook('."'".$list->id."'".')">edit<span class="btn-label btn-label-right"><i class="fa fa-gear"></i></button>';

           $delete_row = '<button class="btn btn-outline btn btn-danger btn-xs btn-labeled" type="button"  href="javascript:void()" title="delete" onclick="delete_guestbook('."'".$list->id."'".')">delete<span class="btn-label btn-label-right"><i class="fa fa-trash"></i></button>';

           $row[] = $edit_row .' '. $delete_row;
           $data[] = $row;
       }

       $output = array(
           "draw" => $_POST['draw'],
           "recordsTotal" => $this->settings->count_all('guestbook'),
           "recordsFiltered" => $this->settings->count_filtered('guestbook'),
           "data" => $data,
       );
       echo json_encode($output);
   }

   public function edit($id) {
 		if(!$this->input->is_ajax_request()) redirect(base_url('404')); // check form parsing
 		$data = $this->settings->get_data('guestbook',$id)->row();
 		echo json_encode($data);
 	 }

   public function delete($id) {
     if(!$this->input->is_ajax_request()) redirect(base_url('404'));
     $this->settings->delete($id, 'guestbook'); //delete guestbook
     // true json if successfull delete
     echo json_encode(array("status" => TRUE));
   }

   public function add(){
		 if(!$this->input->is_ajax_request()) redirect(base_url('404')); // check form parsing
     $this->validate('add');
     $data = $this->data_save('add');
        if ($this->form_validation->run() == TRUE) {
            $this->settings->save('guestbook',$data);
        }
        echo json_encode(array("status" => TRUE));
   }

   public function update(){
		 if(!$this->input->is_ajax_request()) redirect(base_url('404')); // check form parsing
     $this->validate('update');
     $data = $this->data_save('update');
   		 if ($this->form_validation->run() == TRUE) {
  			$this->settings->update(array('id' => $this->input->post('id')), $data, 'guestbook');
   		 }
 			 echo json_encode(array("status" => TRUE));
   }

   public function data_save($val){
       if($val=="add"){
         $Array = array(
           'name' => $this->input->post('name'),
           'email' => $this->input->post('email'),
           'telp' => $this->input->post('telp'),
           'kota' => $this->input->post('kota'),
           'prov' => $this->input->post('prov'),
           'kota' => $this->input->post('kota'),
           'kecamatan' => $this->input->post('kecamatan')
         );
       } else {
         $Array = array(
           'name' => $this->input->post('name'),
           'email' => $this->input->post('email'),
           'telp' => $this->input->post('telp'),
           'kota' => $this->input->post('kota'),
           'prov' => $this->input->post('prov'),
           'kota' => $this->input->post('kota'),
           'kecamatan' => $this->input->post('kecamatan')
         );
       }

       return $Array;
   }

   private function validate($val){
       $data = array();
       $data['error_string'] = array();
       $data['inputerror'] = array();
       $data['error_id'] = array();
       $data['status'] = TRUE;

           $this->form_validation->set_rules('name', 'name', 'trim|required');
           $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
           $this->form_validation->set_rules('telp', 'telp', 'trim|required');
           $this->form_validation->set_rules('prov', 'province', 'trim|required');
           $this->form_validation->set_rules('kota', 'city', 'trim|required');
           $this->form_validation->set_rules('kecamatan', 'district', 'trim|required');
           $this->form_validation->set_error_delimiters('', '');
           $this->form_validation->run();

           if(form_error('name')!= '')
           {
             $data['inputerror'][] = 'name';
             $data['error_id'][] = 'name';
             $data['error_string'][]  = form_error('name');
             $data['status'] = FALSE;
           }
           if(form_error('email')!= '')
           {
             $data['inputerror'][] = 'email';
             $data['error_id'][] = 'email';
             $data['error_string'][]  = form_error('email');
             $data['status'] = FALSE;
           }
           if(form_error('telp')!= '')
           {
             $data['inputerror'][] = 'telp';
             $data['error_id'][] = 'telp';
             $data['error_string'][]  = form_error('telp');
             $data['status'] = FALSE;
           }
           if(form_error('prov')!= '')
           {
             $data['inputerror'][] = 'prov';
             $data['error_id'][] = 'prov';
             $data['error_string'][]  = form_error('prov');
             $data['status'] = FALSE;
           }

           if(form_error('kota')!= '')
           {
             $data['inputerror'][] = 'kota';
             $data['error_id'][] = 'kota';
             $data['error_string'][]  = form_error('kota');
             $data['status'] = FALSE;
           }

					 if(form_error('kecamatan')!= '')
           {
             $data['inputerror'][] = 'kecamatan';
             $data['error_id'][] = 'kecamatan';
             $data['error_string'][]  = form_error('kecamatan');
             $data['status'] = FALSE;
           }

					 if ($this->input->post('prov')=="" && $this->input->post('kota')==""){
				 			 $data['inputerror'][] = 'kota';
				 			 $string = 'province must be filled ! before input city';
				 			 $result = str_replace(array('</p>', '<p>'),'',$string);
	             $data['error_string'][] = $result;
							 $data['error_id'][] = 'kota';
	             $data['status'] = FALSE;
				 		}

						if ($this->input->post('kota')=="" && $this->input->post('kecamatan')==""){
 				 			 $data['inputerror'][] = 'kecamatan';
 				 			 $string = 'city must be filled ! before input district';
 				 			 $result = str_replace(array('</p>', '<p>'),'',$string);
 	             $data['error_string'][] = $result;
 							 $data['error_id'][] = 'kecamatan';
 	             $data['status'] = FALSE;
 				 		}

        if($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
   }


}
