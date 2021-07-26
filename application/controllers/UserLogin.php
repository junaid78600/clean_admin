<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("function_helper");
		$this->load->model('AdminModel');
		 $this->load->Model('eloquent/CustomerModel');

	
    }

	public function index()
	{	

		if(isset($this->session->userdata['userLoggedIn']) && $this->session->userdata['userLoggedIn'] == 'yes')
		{
			redirect('user');
		}
		else
		{
			$data['settings'] = $this->AdminModel->getSetting();
			$this->load->view('user_pages/login_view',$data);
		}

	}
	public function authenticate_login()
	{
		$username     = $this->input->post('email');
		$pass         = md5($this->input->post('password'));
		$userData 	  = CustomerModel::where(['email'=>$username,'password'=>$pass,'status'=>'Active'])->first();
		// print_r();exit;
		if($userData)
		{	
			$userData=$userData->toArray();
			$this->session->set_userdata('userLoggedIn','yes');
			$this->session->set_userdata('role', 'User');

			$this->session->set_userdata('log_in',uniqid());
		
			$this->session->set_userdata($userData);
		 	// print_r($this->session->get_userdata());
		 	
		 	redirect('User/index');
		}
		else
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'info', 
				'details' => " Incorrect username or password"
				));
			 	redirect('user/login');
		}
			
			
	

	}



	public function logout() 

	{

		/*echo '<pre>';

		  print_r($this->session);

		  exit;*/

		$session_data = array(

				'logged_in'	        => '',	
				'set_currency'		=> '',

				'user_id'      		=> '',

				'username'       	=> '',

				'user_pass'       	=> '',

				'_config:protected' => '',

				);

              

		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('userLoggedIn');

		$this->session->unset_userdata('user_data', $session_data);
		session_destroy();



		redirect('user/login');

	}



}

