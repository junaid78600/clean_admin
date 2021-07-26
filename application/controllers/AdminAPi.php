<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAPi extends CI_Controller {

	public function __construct() {

        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('function_helper');
		$this->load->Model('SiteModel');
		$this->load->library('pagination');
		$this->load->helper('form');
		$this->load->library('image_lib');
		$this->load->library('upload');
		// eloquest
		 $this->load->Model('eloquent/Admin_Model');
		 $this->load->Model('eloquent/CustomerModel');
		 $this->load->Model('eloquent/ProductModel');
		 $this->load->Model('eloquent/OrderModel');
		 $this->load->Model('eloquent/ItemModel');
		 $this->load->Model('eloquent/OrderStatusModel');
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
	public function getProduct()
	{
		$product=ProductModel::where('status','=','Active')->get();
		// $data=array('data'=>$product);
		echo json_encode($product);
	}
	public function changeorderStatus()
    {
        # code...
      $type=$this->input->post('type');
      $order_id=$this->input->post('order_id');
      $order=OrderModel::findorfail($order_id);
      $orderStatus=new OrderStatusModel();
      
      if ($type==1) {
        # code...
        $orderStatus->stage=$order->stage;
        $orderStatus->order_id=$order->id;
        $orderStatus->change_by=$this->session->name.'-'.$this->session->role;
        $orderStatus->user_id=$this->session->userid;
        $orderStatus->type=$this->session->role;
        $orderStatus->status='Accepted';
        $orderStatus->created_at=date('Y-m-d  g:i:s:A');
        $orderStatus->save();
        // order
        $order->status="Processing";
        $order->stage=$order->stage+1;
        $order->save();
      } else if($type==0) {
        $orderStatus->stage=$order->stage;
        $orderStatus->order_id=$order->id;
        $orderStatus->change_by=$this->session->name.'-'.$this->session->role;
        $orderStatus->user_id=$this->session->userid;
        $orderStatus->type=$this->session->role;
        $orderStatus->status='Rejected';
        $orderStatus->created_at=date('Y-m-d  g:i:s:A');
        $orderStatus->save();
        // order
        $order->status="Rejected";
        $order->stage=0;
        $order->save();
      }
      
    }


	
}
