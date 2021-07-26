<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppApi extends CI_Controller {

	public function __construct() {

        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('function_helper');
		$this->load->Model('AdminModel');
		$this->load->Model('SiteModel');
		$this->load->library('image_lib');
		$this->load->library('upload');

				//  eloquent models
		 $this->load->Model('eloquent/Admin_Model');
		 $this->load->Model('eloquent/CustomerModel');
		 $this->load->Model('eloquent/ProductModel');
		 $this->load->Model('eloquent/OrderModel');
		 $this->load->Model('eloquent/ItemModel');
		 $this->load->Model('eloquent/PaymentModel');
		 $this->load->Model('eloquent/OrderAddressModel');
		 $this->load->Model('eloquent/Sale_coordinator_city_Model');
		 $this->load->Model('eloquent/City_Model');
		 





		
		
    }
    public function index()
	{
		echo "what are you doing here. GOTO";
		
	}

    public function E_mail($name='kayani',$from='kayaniqaisar@gmail.com',$to='kayaniqaisar@gmail.com',$title='test',$message='hi kayani')
	{
			 $settings = $this->SiteModel->getSetting();
		$data=array('settings'=>$settings,'message'=>$message);
		 $message = $this->load->view('admin_pages/email_view',$data, true);
        
        
        $config = Array(        
                'protocol' => 'smtp',
               'smtp_host' => 'kayanibrother.com',
                'smtp_port' => 587,
                 'smtp_user' => 'jb@kayanibrother.com',
                 'smtp_pass' => 'K?_y_XA^oe#c',
                'smtp_timeout' => '4',
                'mailtype'  => 'html', 
                'charset'   => 'utf-8',
                'wordwrap' => TRUE
            );
 
        
        
        
$this->load->library('email',$config);
$this->email->initialize($config);
// $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
// $this->email->set_header('Content-type', 'text/html');
$this->email->set_newline("\r\n");
  $this->email->from($from,$name);
$this->email->to($to);
 
$this->email->subject($title);
$this->email->message($message);
if($this->email->send()) 
    //   echo "Success";
    return true;
         else 
         	return false;
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

		public function processMultipleIamges($files,$filename = 'files',$thumbnail = FALSE)
	{
		$config['upload_path']          = "assets/cms_images/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
       // $config['max_width']            = 3000 ;
        //$config['max_height']           = 2000;
        
        $photos = array();
        $dataInfo = array();
        // echo "<pre>";
        // print_r($_FILES);
       
        
        $cpt = count($_FILES[$filename]['name']);
        for($i=0; $i<$cpt; $i++)
        {   
   			$new_name = time().rand(9,99999);
			$config['file_name'] = $new_name;       
            $_FILES[$filename]['name']= $files[$filename]['name'][$i];
            $_FILES[$filename]['type']= $files[$filename]['type'][$i];
            $_FILES[$filename]['tmp_name']= $files[$filename]['tmp_name'][$i];
            $_FILES[$filename]['error']= $files[$filename]['error'][$i];
            $_FILES[$filename]['size']= $files[$filename]['size'][$i];  

            $this->upload->initialize($config);
            // $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload($filename))
            {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);
            }
            else
            {  
                $dataInfo = array('upload_data' => $this->upload->data());
                $photos[] = $dataInfo['upload_data']['file_name'];
               
            }

            
        }
        if($thumbnail) $this->create_thumbnail($photos,TRUE);
        return implode(';',$photos );
	}
	 public function create_thumbnail($filename,$multi_images = FALSE)
   	{
   		
   		$target_path = $_SERVER['DOCUMENT_ROOT'] . '/'.CMS_PATH.'assets/cms_images/thumbnail';
      	$config = array(
          'image_library' => 'gd2',
          'source_image'  => '',
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '',
          'width' => 150,
          'height' => 150
      );
      if ($multi_images)
      {
      	foreach ($filename as $file)
      	{
      		 $source_path = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.'assets/cms_images/'.$file;
      		$config['source_image'] = $source_path; 
      		 $this->image_lib->initialize($config);
		      if (!$this->image_lib->resize())
		          echo $this->image_lib->display_errors();
      	}
      }
      else
      {
 		$source_path = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.'assets/cms_images/'.$filename;
      	$config['source_image'] = $source_path;
      	$this->image_lib->initialize($config);
		if (!$this->image_lib->resize())
		     echo $this->image_lib->display_errors();
		      
      }
      $this->image_lib->clear();
   	}


	public function login()
	{
	    
	 if ($this->input->server('REQUEST_METHOD') == 'POST')
	 {
	     $password = $this->input->post('password');
	     $email   = $this->input->post('email');
	     $res = $this->AdminModel->getRow('e_users',array('email'=>$email,'password'=>md5($password),'role'=>'Salesman'));
	      if($res && $res['status']=='In-Active'){
	         $appData = array(
	             'status' => 2,
	             'message' => 'Current user In Active ',
	             'data'=>(object)array()
	             );
	     }
	     else if($res){
	         $appData = array(
	             'status' => 1,
	             'message' => 'Logged in successfully',
	             'data'=>$res
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'Incorrect Credentials',
	             'data'=> (object) array()
	             );
	     } 
	     echo json_encode($appData);
	 }
	
	  
	}
	public function signup()
	{
	    
	     if ($this->input->server('REQUEST_METHOD') == 'POST')
	 {
	     $data['email'] = $this->input->post('email');
	     $data['name']   = $this->input->post('name');
	     $data['phone']   = $this->input->post('phone');
	     $data['password']   = md5($this->input->post('password'));
	     $data['role']='Salesman';
	     $number_check = $this->AdminModel->getRow('e_users',array('phone'=>$data['phone']));
	     if($number_check){
	          $appData = array(
	             'status' => 0,
	             'message' => 'Number already exist',
	             'data'=> (object) array()
	             );
	             echo json_encode($appData);
	             exit();
	     }
	    if($data['email'] != "")
	    {
	        $email_check = $this->AdminModel->getRow('e_users',array('email'=>$data['email']));
	        if($email_check){
	            $appData = array(
	             'status' => 0,
	             'message' => 'Email already exist',
	             'data'=> (object) array()
	             );
	             echo json_encode($appData);
	             exit();
	        }
	    }
	   $user_id = $this->AdminModel->insertReturn('e_users',$data);
	     if($user_id){
	         $user = $this->AdminModel->getRow('e_users',array('user_id'=>$user_id));
	         $appData = array(
	             'status' => 1,
	             'message' => 'Registeration  successfully',
	             'data'=>$user
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'Registration failed',
	             'data'=> (object) array()
	             );
	     } 
	     echo json_encode($appData);
	 }
	}
	
	

   	public function update_profile()
	{
	    
	 if ($this->input->server('REQUEST_METHOD') == 'POST')
	 {
	     $id= $this->input->post('user_id');
	     $data=$_POST;
	    unset($data['user_id']);
	    if(empty($id)){
	          $appData = array(
	             'status' => 0,
	             'message' => 'User ID not  Post',
	             'data'=> (object) array()
	             );
	             echo json_encode($appData);
	             exit();
	     }
	     
	     if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			// $this->deleteImage('e_settings','id',$id,'icon','assets/cms_images/');
			 $photo2 =  $this->processImg($_FILES);
			 
			 if($photo2):
			 $this->create_thumbnail($photo2);
			$data = $data + array('image'=>$photo2);
			endif;

		}

		if (isset($_POST['password']))
		{
			$password = $this->input->post('password');
			if(empty($password)) unset($data['password']);
			else $data['password'] = md5($password);
		}

	     $res=$this->AdminModel->updateRow('e_users',array('user_id'=>$id),$data);
	     if($res){
	     	$data=$this->AdminModel->getRow('e_users',array('user_id'=>$id));
	         $appData = array(
	             'status' => 1,
	             'message' => 'successfully update ',
	             'data'=>$data
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'action fail',
	             'data'=> (object) array()
	             );
	     } 
	     echo json_encode($appData);
	 }
	
	  
	}

	// get product
	public function getProduct()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'GET')
	 {
		$product=ProductModel::where('status','=','Active')->get();
		// $data=array('data'=>$product);
		if($product->count()>0){
	     	$data=$product;
	         $appData = array(
	             'status' => 1,
	             'message' => 'successfully update ',
	             'data'=>$data
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'action fail',
	             'data'=> (object) array()
	             );
	     } 
		echo json_encode($appData);
	}

	}
	public function getDealer()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'GET')
	 {
		$Dealer=CustomerModel::where('role','=','Dealer')->get();
		// $data=array('data'=>$product);
		if($Dealer->count()>0){
	     	$data=$Dealer;
	         $appData = array(
	             'status' => 1,
	             'message' => 'successfully update ',
	             'data'=>$data
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'action fail',
	             'data'=> (object) array()
	             );
	     } 
		echo json_encode($appData);
	}

	}

	public function placeOrder()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'POST')
	 {
		
	 	$today = date("Ymd");
	   $dealer=$this->input->post('dealer_id');
	   $user_id=$this->input->post('user_id');
	   $role='Salesman';
	   $total_order_price=$this->input->post('total_price');
       $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
       $unique = $today . $rand;
	   $order=new OrderModel();
		$order->order_no=$unique;
		   $order->create_at=date('Y-m-d  g:i:s:A');
		   $order->total_order_price=$total_order_price;
		   $order->type=$role;
		   $order->status='Pending';
		   $order->user_id=$user_id;
		   $order->order_by=$dealer;
		   $order->location_id=$this->input->post('location_id');
		  
		// $data=array('data'=>$product);
		if( $order->save()){
	     	
	         $appData = array(
	             'status' => 1,
	             'message' => 'order successfully  ',
	             'order_id'=>$order->id
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'action fail',
	             'data'=> (object) array()
	             );
	     } 
		echo json_encode($appData);
	}

	}
	public function placeItem()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'POST')
	 {
		
	 	
	   $order_id=$this->input->post('order_id');
	   $value=$_POST;
	   $item=array(
				'order_id'=>$order_id,
				'item_id'=>$value['item_id'],
				'product_name'=>$value['item_name'],
				'price'    =>$value['price'],
				'qty'    =>$value['qty'],
			);
			// print_r($item);exit();
			
		  
		// $data=array('data'=>$product);
		if(ItemModel::create($item)){
	     	
	         $appData = array(
	             'status' => 1,
	             'message' => 'item successfully  ',
	             
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'action fail',
	             'data'=> (object) array()
	             );
	     } 
		echo json_encode($appData);
	}

	}

	public function addPayment()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'POST')
	 {
		
	 	$payment=new PaymentModel();
	   $payment->dealer_id=$this->input->post('dealer_id');
	   $payment->saleman_id=$this->input->post('user_id');
	   $payment->amount=$this->input->post('amount');
	   $payment->type=$this->input->post('type');
	   $payment->create_at=date('Y-m-d  g:i:s:A');
	   
			// print_r($item);exit();
			
		  
		// $data=array('data'=>$product);
		if($payment->save()){
	     	
	         $appData = array(
	             'status' => 1,
	             'message' => 'item successfully  ',
	             
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'action fail',
	             'data'=> (object) array()
	             );
	     } 
		echo json_encode($appData);
	}

	}
	public function orderlist()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'POST')
	 {
		
	   $user_id=$this->input->post('user_id');
	   $order=OrderModel::where('user_id','=',$user_id)->with('oderDetails','dealer','shipping')->get();
	   
			// print_r($item);exit();
			
		  
		// $data=array('data'=>$product);
		if($order->count()){
	     	
	         $appData = array(
	             'status' => 1,
	             'message' => 'item successfully  ',
	             'data'	=>$order
	             
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'action fail',
	             'data'=> (object) array()
	             );
	     } 
		echo json_encode($appData);
	}

	}
	
	public function forgetpassword()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'POST')
	 {
		
	   $user_id=$this->input->post('email');

	   $check=CustomerModel::where('email','=',$user_id)->first();
	   
			// print_r($item);exit();
			
		 
		// $data=array('data'=>$product);
		if($check->count()){
			$data=$this->AdminModel->getSetting();

			$message=$rand = strtoupper(substr(uniqid(sha1(time())),0,4));	
			$this->E_mail($data['siteName'],$data['email'],$check->email,'Password Reset',$message);
	     	$check->password=md5($message);
	     	$check->save();
	         $appData = array(
	             'status' => 1,
	             'message' => 'item successfully  ',
	             'data'	=>$check
	             
	             );
	     }
	     else
	     {
	         $appData = array(
	             'status' => 0,
	             'message' => 'action fail',
	             'data'=> (object) array()
	             );
	     } 
		echo json_encode($appData);
	}

	}




	
	


	public function getSettings()
	{
		# code...
		if($this->input->server('REQUEST_METHOD')=='GET'):

			$data=$this->AdminModel->getSetting();	
			 $appData = array(
	             'status' => 1,
	             'message' => 'acction successfully',
	             'data'	=>$data
	             );

		echo json_encode($appData);	
		endif;
	}
	public function getLocation()
	{
		# code...
		if($this->input->server('REQUEST_METHOD')=='GET'):

			$data=City_Model::all();	
			 $appData = array(
	             'status' => 1,
	             'message' => 'acction successfully',
	             'data'	=>$data
	             );

		echo json_encode($appData);	
		endif;
	}
	

	
	
	
	
}
