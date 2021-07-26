<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct() {

        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('function_helper');
		$this->load->Model('SiteModel');
		$this->load->library('pagination');
		$this->load->helper('form');
    }

	public function index()
	{
		
		$settings 	= $this->SiteModel->getSetting();
		// $pageData 	= $this->SiteModel->getPageData('Home');
		$data =  array(
			'settings' 		=> $settings,
			'controller'	=> 'Home',
		);
		$this->load->view('site_pages/index',$data);
			
	}


	
}
