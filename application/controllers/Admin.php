<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {

        parent::__construct();
		$this->load->Model('AdminModel');
		 $this->load->library('form_validation');
		//  eloquent models
		 $this->load->Model('eloquent/Admin_Model');
		 $this->load->Model('eloquent/CustomerModel');
		 $this->load->Model('eloquent/ProductModel');
		 $this->load->Model('eloquent/OrderModel');
		 $this->load->Model('eloquent/ItemModel');
		 $this->load->Model('eloquent/OrderAddressModel');
		 $this->load->Model('eloquent/PaymentModel');
		 $this->load->Model('eloquent/City_Model');
		 $this->load->Model('eloquent/Sale_coordinator_city_Model');
		 $this->load->Model('eloquent/TelecalModel');
		 $this->load->Model('eloquent/ShippedorderModel');



		 

		 
		login_check();
		 
    }
  
    public function index()
	{
		
		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();

		
		$data =  array(
			'settings' => $settings,
			'userData' => $userData
		);
        $this->load->view('admin_pages/index',$data);
	}
	// user functions
	public function Customer() 
	{
		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$data=$this->AdminModel->getTableData('e_users');
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'data'=>$data
		);
        $this->load->view('admin_pages/user/index',$data);
	}
	public function user_add()
	{		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData
			
		);
        $this->load->view('admin_pages/user/add',$data);
	}
	public function user_edit($id)
	{		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$user=CustomerModel::find($id);
		
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'user'=>$user
			
		);
        $this->load->view('admin_pages/user/edit',$data);
	}
	//end user
		// user product
		public function product() 
		{
			
			$settings = $this->AdminModel->getSetting();
			$userData = $this->session->get_userdata();
			$data=ProductModel::where('stock','>',0)->get();
			
			$data =  array(
				'settings' => $settings,
				'userData' => $userData,
				'data'=>$data
			);
			$this->load->view('admin_pages/product/index',$data);
		}
		public function product_out_of_stock() 
		{
			
			$settings = $this->AdminModel->getSetting();
			$userData = $this->session->get_userdata();
			$data=ProductModel::where('stock','=',0)->get();
			$data =  array(
				'settings' => $settings,
				'userData' => $userData,
				'data'=>$data
			);
			$this->load->view('admin_pages/product/index',$data);
		}
		public function product_add()
		{		
			$settings = $this->AdminModel->getSetting();
			$userData = $this->session->get_userdata();
			$data =  array(
				'settings' => $settings,
				'userData' => $userData
				
			);
			$this->load->view('admin_pages/product/add',$data);
		}
		public function product_edit($id)
		{		
			$settings = $this->AdminModel->getSetting();
			$userData = $this->session->get_userdata();
			$product=ProductModel::find($id);
			
			$data =  array(
				'settings' => $settings,
				'userData' => $userData,
				'product'=>$product
				
			);
			$this->load->view('admin_pages/product/edit',$data);
		}
		//end product
	
	
	
	###########end progress scor menu



    function clean($string) {
		   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		}

  


	
	public function settings()
	{
		if($this->session->role != 'Admin') redirect('Admin');

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData
		);
		
		$this->load->view('admin_pages/setting_view',$data);
	}
	public function cms_user()
	{
		if($this->session->role != 'Admin') redirect('Admin');
		$settings = $this->AdminModel->getSetting();
		$cmsUser = $this->AdminModel->getRows('e_admin',array('role'=>'Admin'));
		$userData = $this->session->get_userdata();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'cmsUser'  => $cmsUser
		);
		
		$this->load->view('admin_pages/cms_user_view',$data);
	}

	
	
	
	public function E_mail($name,$from,$to,$title,$message)
	{
  $this->email->from($from,$name);
$this->email->to($to);
 
$this->email->subject($title);
$this->email->message($message);
if($this->email->send()) 
      echo "Success";
         else 
         	echo "Fail";
	}

 public function processImg($files,$filename = 'files',$upload_path = 'assets/cms_images/')
	{
		$config['upload_path']          = $upload_path;
        $config['allowed_types']        = '*';
       // $config['max_size']             = 3000;
       // $config['max_width']            = 3000 ;
        //$config['max_height']           = 2000;
        $new_name = time().mt_rand(1,99999);
		$config['file_name'] = $new_name;
        $photos = "";
        $dataInfo = array();
      	
      	
      	$this->upload->initialize($config);
      	
      	
        if ( ! $this->upload->do_upload($filename))
        {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            exit();
            return false;
        }
        else
        {
             $data = array('upload_data' => $this->upload->data());
             return $data['upload_data']['file_name'];
        }
	}
	public function order()
	{
		// if($this->session->role != 'Admin') redirect('Admin');
		$dealer=CustomerModel::where('role','=','Dealer')->get();
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$location=City_Model::all();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'dealer'	=>$dealer,
			'location'	=>$location
		);
		
		$this->load->view('admin_pages/order_view',$data);
	}
	
	// order list
	public function orderlist()
	{
		if($this->session->role != 'Admin') redirect('Admin');

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		$orderList->with('oderDetails');
		$orderList=$orderList->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'All Order List'
		);
		
		$this->load->view('admin_pages/orderList_view',$data);
	}
	//
	public function orderaccept()
	{
		if($this->session->role != 'Admin') redirect('Admin');

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		$orderList->with('oderDetails');
		$orderList->where('stage','=',3);
		$orderList=$orderList->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'Accepted Order List'
		);
		
		$this->load->view('admin_pages/orderList_view',$data);
	}
	public function order_complete()
	{
		if($this->session->role != 'Admin') redirect('Admin');

		// $settings = $this->AdminModel->getSetting();
		// $userData = $this->session->get_userdata();
		// $orderList=OrderModel::query();
		// $orderList->with('oderDetails');
		// $orderList->where('stage','=',8);
		// $orderList=$orderList->get();
		// $data =  array(
		// 	'settings' => $settings,
		// 	'userData' => $userData,
		// 	'orderList'=>$orderList,
		// 	'heading'	=>'Complete Order List'
		// );
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=ShippedorderModel::all();
		$final=$orderList->toArray();
		foreach ($orderList as $key => $value) {
			// code...
			$ids=explode(',',$value->order_id);
		// print_r($ids);exit;
			$order_ids=array();
			foreach ($ids as $k => $v) {
				// code...
			
			$order=OrderModel::query();
			$order->where('id','=',$v);
			$order->with('oderDetails','dealer');
			$order=$order->first();
			array_push($order_ids,$order);


		    }
		    $final[$key]['order']=$order_ids;
		}
		// echo"<pre>";
		// print_r($final);exit();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$final,
			'heading'	=>'Shipped Order List'
		);
		
		$this->load->view('admin_pages/shipped_orderList_view',$data);
	}
	public function orderrejected()
	{
		if($this->session->role != 'Admin') redirect('Admin');

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		$orderList->with('oderDetails');
		$orderList->where('stage','=',0);
		$orderList=$orderList->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'Rejected Order List'
		);
		
		$this->load->view('admin_pages/orderList_view',$data);
	}
	public function orderdispatch()
	{
		if($this->session->role != 'Admin') redirect('Admin');

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		$orderList->with('oderDetails');
		$orderList->where('stage','=',6);
		$orderList=$orderList->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'orderList'=>$orderList,
			'heading'	=>'Dispatch Order List'
		);
		
		$this->load->view('admin_pages/orderList_view',$data);
	}
	// orderdetails
	public function orderdetails($id)
	{
		if($this->session->role != 'Admin') redirect('Admin');

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$orderList=OrderModel::query();
		$orderList->where('id','=',$id);
		$orderList->with('oderDetails','dealer','shipping','telecal');
		$orderList=$orderList->first();
		// print_r($orderList->dealer->toArray());exit;
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'order'=>$orderList,
			'heading'	=>'All Order List'
		);
		
		$this->load->view('admin_pages/orderdetils_view',$data);
	}
	public function dealer() 
	{
		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$data=CustomerModel::where('role','=','Dealer')->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'data'=>$data,
			'heading'	=>'Dealer List'
		);
        $this->load->view('admin_pages/dealerList',$data);
	}

	public function dealer_dashboard() 
	{
		if(empty($_GET['id'])) redirect('Admin/dealer');
		$id=$_GET['id'];

		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$user=CustomerModel::where('user_id','=',$id)->with('payment','orders')->first();
		// print_r($user->orders->toArray());exit;
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'data'=>$user,
			'heading'	=>'Dealer List'
		);
        $this->load->view('admin_pages/dealer_dashboard',$data);
	}

	public function dealer_bil()
	{
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$payment=PaymentModel::query();
		if(!empty($_GET['from'])&&!empty($_GET['to']))
  		{
  				$from=$_GET['from'];
  			   $to=$_GET['to'];
  			   $user=$_GET['user'];
  			  
  			   $payment->with('saleman','dealer');
  			   $payment->where('dealer_id','=',$user);

  			   $payment=$payment->whereDate('create_at','>=',$from)->whereDate('create_at','<=',$to)->get();
  			   // echo('<pre>');
  			   // print_r($payment->toArray());exit();
  			 // $payment=LotteryModel::with('sale_tickets')->whereDate('expire_date','>=',$from)->whereDate('expire_date','<=',$to)->get();
  	  

  		}
		$dealerList=CustomerModel::where('role','=','Dealer')->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'payment'	=>$payment,
			'deakerList'=>$dealerList,
			'heading'	=>'Dealer Report List'
		);
        $this->load->view('admin_pages/dealer_bill',$data);
	}

	public function saleman_bil()
	{
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$payment=PaymentModel::query();
		if(!empty($_GET['from'])&&!empty($_GET['to']))
  		{
  				$from=$_GET['from'];
  			   $to=$_GET['to'];
  			   $user=$_GET['user'];
  			  
  			   $payment->with('saleman','dealer');
  			   $payment->where('saleman_id','=',$user);
  			   $payment=$payment->whereDate('create_at','>=',$from)->whereDate('create_at','<=',$to)->get();
  			   // echo('<pre>');
  			   // print_r($payment->toArray());exit();
  			 // $payment=LotteryModel::with('sale_tickets')->whereDate('expire_date','>=',$from)->whereDate('expire_date','<=',$to)->get();
  	  

  		}
		$dealerList=CustomerModel::where('role','=','Salesman')->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'payment'	=>$payment,
			'deakerList'=>$dealerList,
			'heading'	=>'Saleman Report List'
		);
        $this->load->view('admin_pages/saleman_bill',$data);
	}

	// city 
	public function city() 
	{
		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$data=$this->AdminModel->getTableData('e_city');
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'data'=>$data
		);
        $this->load->view('admin_pages/city/index',$data);
	}
	public function city_add()
	{		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData
			
		);
        $this->load->view('admin_pages/city/add',$data);
	}
	public function city_edit($id)
	{		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$user=City_Model::find($id);
		
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'city'=>$user
			
		);
        $this->load->view('admin_pages/city/edit',$data);
	}
	public function assign_city($id)
	{		
		$settings = $this->AdminModel->getSetting();
		$userData = $this->session->get_userdata();
		$user=CustomerModel::find($id);
		$city=City_Model::all();
		$location=Sale_coordinator_city_Model::select('city_id')->where('user_id',$id)->get();
		$data =  array(
			'settings' => $settings,
			'userData' => $userData,
			'user'=>$user,
			'city'=>$city,
			'location'=>$location
			
		);
        $this->load->view('admin_pages/user/Addcity',$data);
	}
	
		 
	
}
