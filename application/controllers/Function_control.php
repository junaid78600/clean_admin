<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Function_control extends CI_Controller {

	public function __construct() {

        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('function_helper');
		$this->load->Model('AdminModel');
		$this->load->library('image_lib');
		$this->load->library('upload');
		login_check();
		$this->load->helper('security');
    }

	public function index()
	{
	  echo "Nothing to show. Function_control";
	}
	///////////////////cms related function /////////////////////

	/////////////////////--------------////////////////////

	public function getView()
	{
		extract($_POST);
		switch ($viewType) 
		{
			case 'editCmsUser':
				$data2 = $this->AdminModel->getRow('e_admin',array('userid'=>$id));
				if ($data2)
				{
					$data = array(
						'viewType'	=> $viewType,
						'data'		=> $data2
					);
					$this->load->view('called_views/admin_views',$data);
				}
				else
				echo "No record found in databae";
				break;
			case 'editMenu':
				$data2 = $this->AdminModel->getRow('e_menu',array('menuid'=>$id));
				if ($data2)
				{
					$data = array(
						'viewType'	=> $viewType,
						'data'		=> $data2
					);
					$this->load->view('called_views/admin_views',$data);
				}
				else
				echo "No record found in databae";
				break;
			case 'editSlider':
				$data2 = $this->AdminModel->getRow('e_slider',array('id'=>$id));
				if ($data2)
				{
					$data = array(
						'viewType'	=> $viewType,
						'data'		=> $data2
					);
					$this->load->view('called_views/admin_views',$data);
				}
				else
				echo "No record found in databae";
				break;
				case 'editproduct':
				$data2 = $this->AdminModel->getRow('e_product',array('id'=>$id));
				if ($data2)
				{
					$data = array(
						'viewType'	=> $viewType,
						'data'		=> $data2
					);
					$this->load->view('called_views/admin_views',$data);
				}
				else
				echo "No record found in databae";
				break;
			default:
				echo "No view defined";
				break;
		}
	}
	###############generic for getView para by post : tableName,key,value and viewType
	public function getView2()
	{
		extract($_POST);
		$data2 = $this->AdminModel->getRow($tableName,array($key => $id));
		if ($data2)
		{
			$data = array(
						'viewType'	=> $viewType,
						'data'		=> $data2,
						'tableName' => $tableName,
						'key'		=> $key,
						'id'		=> $id
					);
			$this->load->view('called_views/admin_views',$data);
		}
	}
	##########
	public function reviewApprove()
	{
		$review_id = $this->input->post('review_id');
		$data['approved'] = 'yes';
		if ($this->AdminModel->updateRow('e_reviews',array('review_id'=>$review_id),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
			echo 'successfully';
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}
	public function saveNameSlug()
	{
		$data = $_POST;
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image' => $photo);
		}
		
		
		$tableName = $data['tableName'];
		unset($data['tableName']);
		if (isset($_POST['password']))
		{
			$password = $this->input->post('password');
			if(empty($password)) unset($data['password']);
			else $data['password'] = md5($password);
		}
		
		$data['slug'] = $this->clean($this->input->post($this->input->post('name_field')));


		//   echo "<pre>";
		//  print_r($data);
		// echo $tableName;

		if ($this->AdminModel->insertData($tableName,$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}
	public function updateNameSlug()
	{
		$index 		= $_POST['keyIndex'];
		$tableName 	= $_POST['tableName'];
		$id = $this->input->post($index);
		$data = $_POST;
		unset($data['keyIndex']);
		unset($data['tableName']);

		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$this->deleteImage($tableName,$index,$id,'image','assets/cms_images/');
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image'=>$photo);
		}
		if (isset($_POST['password']))
		{
			$password = $this->input->post('password');
			if(empty($password)) unset($data['password']);
			else $data['password'] = md5($password);
		}
		$data['slug'] = $this->clean($this->input->post($this->input->post('name_field')));
		// $data['slug'] = $this->clean($this->input->post('name'));


		// echo "<pre>";
		// print_r($data);
		
		if ($this->AdminModel->updateRow($tableName,array($index=>$id),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query updateSimple)"
				));

	}
	
	
	public function saveFile()
	{
		$data = $_POST;
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$photo =  $this->processFile($_FILES);
			
			$data = $data + array('file' => $photo);
		}
		
		
		$tableName = $data['tableName'];
		unset($data['tableName']);
		
		//   echo "<pre>";
		//  print_r($data);
		// echo $tableName;

		if ($this->AdminModel->insertData($tableName,$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
			echo 'successfully';
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}
	############loaded for new version sdg



	//////////////////


	protected function reload()
	{
		echo "<script>location.reload()</script>";
	}
	public function updateHomeData()
	{

		$data = $_POST;
		if (isset($_FILES) && !empty($_FILES['sec1_image']['name']))
		{
			$photo =  $this->processImg($_FILES,'sec1_image');
			$this->create_thumbnail($photo);
			$this->deleteImage('e_homedata','id','1','sec1_image','assets/cms_images/');
			$data = $data + array('sec1_image' => $photo);
		}

		if (isset($_FILES) && !empty($_FILES['sec2_image']['name']))
		{
			$photo =  $this->processImg($_FILES,'sec2_image');
			$this->create_thumbnail($photo);
			$this->deleteImage('e_homedata','id','1','sec2_image','assets/cms_images/');
			$data = $data + array('sec2_image' => $photo);
		}
		if (isset($_FILES) && !empty($_FILES['sec1_image2']['name']))
		{
			$photo =  $this->processImg($_FILES,'sec1_image2');
			$this->create_thumbnail($photo);
			$this->deleteImage('e_homedata','id','1','sec1_image2','assets/cms_images/');
			$data = $data + array('sec1_image2' => $photo);
		}

	
		
		if ($this->AdminModel->updateRow('e_homedata',array('id'=>'1'),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
			echo 'successfully';
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}
	################generic save and update
	public function saveSimple()
	{
		$data = $_POST;
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image' => $photo);
		}
		if (isset($_POST['slug'])) {
			if($this->input->post('slug') == '')
				$data['slug'] = 'product-'.time();
			else
				$data['slug'] = $this->clean2($this->input->post('slug'));
		}
		
		$tableName = $data['tableName'];
		unset($data['tableName']);
		if (isset($_POST['password']))
		{
			$password = $this->input->post('password');
			if(empty($password)) unset($data['password']);
			else $data['password'] = md5($password);
		}
		
		//   echo "<pre>";
		//  print_r($data);
		// echo $tableName;

		if ($this->AdminModel->insertData($tableName,$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
			echo 'successfully';
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}
	public function updateSimple()
	{
		$index 		= $_POST['keyIndex'];
		$tableName 	= $_POST['tableName'];
		$id = $this->input->post($index);
		$data = $_POST;
		unset($data['keyIndex']);
		unset($data['tableName']);
		if (isset($_POST['slug'])) {
			if($this->input->post('slug') == '')
				$data['slug'] = 'product-'.time();
			else
				$data['slug'] = $this->clean2($this->input->post('slug'));
		}

		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$this->deleteImage($tableName,$index,$id,'image','assets/cms_images/');
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image'=>$photo);
		}
		if (isset($_POST['password']))
		{
			$password = $this->input->post('password');
			if(empty($password) || $password == 'fk0001') unset($data['password']);
			else $data['password'] = md5($password);
		}

		// echo "<pre>";
		// print_r($data);
		
		if ($this->AdminModel->updateRow($tableName,array($index=>$id),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query updateSimple)"
				));

	}



	###############update setting#########
	public function updateChecklist()
	{
		$data = array();
		$id = $this->input->post('id');

		$checklist = $this->input->post('checklist');
		$data['checklist'] = implode(',', $checklist);
		
		
		
		if ($this->AdminModel->updateRow('e_settings',array('id'=>$id),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query updateSetting)"
				));
	}
	public function updateSetting()
	{
		$id = $this->input->post('id');
		$data = $_POST;
		
		
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$this->deleteImage('e_settings','id',$id,'image','assets/cms_images/');
			$photo =  $this->processImg($_FILES);
			//$this->create_thumbnail($photo);
			$data = $data + array('image'=>$photo);
		}
		if (isset($_FILES) && !empty($_FILES['icon_available']['name']))
		{
			$photo =  $this->processImg($_FILES,'icon_available');
			if($photo != "")
				$this->deleteImage('e_settings','id',$id,'icon_available','assets/cms_images/');
			$data = $data + array('icon_available'=>$photo);
		}
		if (isset($_FILES) && !empty($_FILES['icon_tour']['name']))
		{
			$photo =  $this->processImg($_FILES,'icon_tour');
			if($photo != "")
				$this->deleteImage('e_settings','id',$id,'icon_tour','assets/cms_images/');
			$data = $data + array('icon_tour'=>$photo);
		}

		
		// if (isset($_FILES) && !empty($_FILES['files2']['name']))
		// {
		// 	$this->deleteImage('e_settings','id',$id,'icon','assets/cms_images/');
		// 	$photo2 =  $this->processImg($_FILES,'files2');
		// 	$data = $data + array('icon'=>$photo2);
		// }

		// echo "<pre>";
		// print_r($data);
		
		if ($this->AdminModel->updateRow('e_settings',array('id'=>$id),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query updateSetting)"
				));
	}
	############cms_user_view
	public function saveCmsUser()
	{
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
		}
		else
			$photo = "";

		$duties_arr = $this->input->post('duties[]');
		$duties = implode(',', $duties_arr);
		
		$data = array(
			'name'		 => $this->input->post('name'),
			'username'	 => $this->input->post('username'),
			'password' 	 => md5($this->input->post('password')),
			'email'		 => $this->input->post('email'),
			'role'		 => $this->input->post('role'),
			'status'	 => $this->input->post('status'),
			'duties'	 => $duties,
			'image'	 => $photo
		);
		if ($this->AdminModel->insertData('e_admin',$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));

	}

	public function updateCmsUser()
	{
		$userid = $this->input->post('userid');
		$duties_arr = $this->input->post('duties[]');
		$duties = implode(',', $duties_arr);
		
		$data = array(
				'name'		 => $this->input->post('name'),
				'username'	 => $this->input->post('username'),
				'email'		 => $this->input->post('email'),
				'role'		 => $this->input->post('role'),
				'status'	 => $this->input->post('status'),
				'duties'	 => $duties
			);

		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$this->deleteImage('e_admin','userid',$userid,'image','assets/cms_images/');
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image'=>$photo);
		}

		$password = $this->input->post('password');
		if($password != 'fk0001' && !empty($password))
		{
			$data = $data + array('password'=>md5($password));
		}
		
		if ($this->AdminModel->updateRow('e_admin',array('userid'=>$userid),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query updateCmsUser)"
				));

	}

	######################saving slider
	public function saveSlider()
	{
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
		}
		else
			$photo = "";
		$data = $_POST;

		$data = $data + array('image' => $photo);
		  //echo "<pre>";
		 //print_r($data);
		if (isset($_FILES) && !empty($_FILES['files2']['name']))
		{
			$photo =  $this->processImg($_FILES,'files2');
			$data['sub_image'] = $photo;
			$this->create_thumbnail($photo);
		}

		$data = $this->security->xss_clean($data);
		if ($this->AdminModel->insertData('e_slider',$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}
	public function updateSlider()
	{
		$id = $this->input->post('id');
		$data = $_POST;
		
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$this->deleteImage('e_slider','id',$id,'image','assets/cms_images/');
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image'=>$photo);
		}

		// echo "<pre>";
		// print_r($data);
		
		if ($this->AdminModel->updateRow('e_slider',array('id'=>$id),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query updateCmsUser)"
				));

	}
	

	##########################change product  dispaly
	private function show_alert($string = 'Action Failed',$alert_type = 'info'){
		echo "<div class='alert alert-".$alert_type."'>".$string."</div>";
	}

	
	#########################get Option add product
	//add product page for getting sub cat while selecting cat
	public function getCitiesOption()
	{
		$data = array('province_id'=>$this->input->post('province_id'));
		return getOption('e_cities','city_id','city_name','',$data);

	}
	#####################clean slug
	 function clean($string) {
		   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		}
	function clean2($string) {
		   $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.

		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		}
	######################saving Video
	public function saveVideo()
	{
		$data = $_POST;
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			 $video =  $this->processVideo($_FILES);
			 $data = $data + array('video' => $video);
			//$this->create_thumbnail($photo);
		}

		 //  echo "<pre>";
		 // print_r($data);

		if ($this->AdminModel->insertData('e_videos',$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}
	
	######################saving cateogires gb
	public function saveCategory()
	{		
		$data = $_POST;
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
		}
		else
			$photo = "";
		$slug = $this->input->post('slug');
		$data['slug'] = $this->clean($slug);

		$parent_id = $this->input->post('parent_id');
		if (!$parent_id)
			$level = 0;
		else
			$level = 1;
		
		$data = $data + array('image' => $photo, 'level'=>$level);
		// echo "<pre>";
		// print_r($data);
		if ($this->AdminModel->insertData('e_category',$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}

	public function updateCategory()
	{
		$cat_id = $this->input->post('cat_id');
		
		$parent_id = $this->input->post('parent_id');
		if ($parent_id != '0') $level = 1;
		else $level = 0;

		$duties_arr = $this->input->post('position[]');
		if (!empty($duties_arr)) 
			$position = implode(',', $duties_arr);
		else
			$position = "";
		
		$data = $_POST;
		$slug = $this->input->post('slug');
		$data['slug'] = $this->clean($slug);
		unset($data['position']);
		$data = $data + array('position' => $position,'level'=>$level);

		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$this->deleteImage('e_category','cat_id',$cat_id,'image','assets/cms_images/');
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image'=>$photo);
		}
		if (isset($_FILES) && $_FILES['files2']['error'][0] == 0 && !empty($_FILES['files2']['name']))
		{	
			$this->deleteImage('e_category','cat_id',$cat_id,'icon','assets/cms_images/cat_icon/');
			$photo2 =  $this->processImg($_FILES,'files2','assets/cms_images/cat_icon/');
			$data['icon'] = $photo2;
			
		}
		if (isset($_FILES) && $_FILES['banner']['error'][0] == 0 && !empty($_FILES['banner']['name']))
		{	
			$this->deleteImage('e_category','cat_id',$cat_id,'banner','assets/cms_images/');
			$banner =  $this->processImg($_FILES,'banner','assets/cms_images/');
			$data['banner'] = $banner;
			
		}
		if (isset($_FILES) && $_FILES['featured_banner']['error'][0] == 0 && !empty($_FILES['featured_banner']['name']))
		{	
			$this->deleteImage('e_category','cat_id',$cat_id,'featured_banner','assets/cms_images/');
			$featured_banner =  $this->processImg($_FILES,'featured_banner','assets/cms_images/');
			$data['featured_banner'] = $featured_banner;
			
		}

		// echo "<pre>";
		// print_r($data);
		
		if ($this->AdminModel->updateRow('e_category',array('cat_id'=>$cat_id),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query updateCmsUser)"
				));

	}

	###################### saving menu
	public function saveMenu()
	{		
		$data = $_POST;
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
		}
		else
			$photo = "";

		if (isset($_FILES) && $_FILES['files2']['error'][0] == 0)
		{	
			$photo2 =  $this->processMultipleIamges($_FILES,'files2');
			$data = $data + array('image2'=>$photo2);	
		}

	
		$parent_id = $this->input->post('parent_id');
		if (!$parent_id) {
			$level = 0;
		}
		elseif (is_numeric($parent_id) && $parent_id)
		{
			$level = 1;
		}
		else
		{
			$level = 2;
			$parent_id = substr($parent_id, 4);
			$data['parent_id'] = $parent_id;
		} 
		

		//echo $parent_id;
		// if ($parent_id != '0') $level = 1;
		// else $level = 0;
		$slug = $this->input->post('slug');
		if(empty($slug)) $slug = time().rand(1,666);
		$data['slug'] = $this->clean($slug);

		$duties_arr = $this->input->post('position[]');
		if (!empty($duties_arr)) 
			$position = implode(',', $duties_arr);
		else
			$position = "";
		
		
		
		unset($data['position']);
		$data = $data + array('image' => $photo,
								'position' => $position,
								'level'=>$level);
		 // echo "<pre>";
		 // print_r($data);

		if ($this->AdminModel->insertData('e_menu',$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}

	public function updateMenu()
	{
		$menuid = $this->input->post('menuid');
		
		$parent_id = $this->input->post('parent_id');
		if ($parent_id != '0') $level = 1;
		else $level = 0;

		$duties_arr = $this->input->post('position[]');
		if (!empty($duties_arr)) 
			$position = implode(',', $duties_arr);
		else
			$position = "";
		
		
		$data = $_POST;
		$parent_id = $this->input->post('parent_id');
		if (!$parent_id) {
			$level = 0;
		}
		elseif (is_numeric($parent_id) && $parent_id)
		{
			$level = 1;
		}
		else
		{
			$level = 2;
			$parent_id = substr($parent_id, 4);
			$data['parent_id'] = $parent_id;
		} 
		$slug = $this->input->post('slug');
		if(empty($slug)) $slug = time().rand(1,666);
		$data['slug'] = $this->clean($slug);
		
		unset($data['position']);
		$data = $data + array('position' => $position,'level'=>$level);

		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$this->deleteImage('e_menu','menuid',$menuid,'image','assets/cms_images/');
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image'=>$photo);
		}
		if (isset($_FILES) && $_FILES['files2']['error'][0] == 0)
		{	
			$this->deleteMultipleImage('e_menu','menuid',$menuid,'image2','assets/cms_images/');
			$photo =  $this->processMultipleIamges($_FILES,'files2');
			$data = $data + array('image2'=>$photo);
		}

		// echo "<pre>";
		// print_r($data);
		
		if ($this->AdminModel->updateRow('e_menu',array('menuid'=>$menuid),$data))
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed(@query updateCmsUser)"
				));

	}

	
	//////////////// GENERIC Function for delete row//////////////
	public function deleteImage($tableName,$key,$value,$fieldName,$filePath)
	{
		 $filename = $this->AdminModel->getField($tableName,array($key=>$value),$fieldName);
		if (!empty($filename) && $filename != '0') 
		{
			$image = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.$filePath.$filename;
			$image_thumbnail = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.$filePath.'thumbnail/'.$filename;
			if (file_exists($image)) unlink($image);
			if (file_exists($image_thumbnail)) unlink($image_thumbnail);
		}
	}
	public function deleteMultipleImage($tableName,$key,$value,$fieldName,$filePath)
	{
		 $filename = $this->AdminModel->getField($tableName,array($key=>$value),$fieldName);
		if (!empty($filename) && $filename != '0') 
		{
			$images = explode(';', $filename);
			foreach ($images as $file)
			{
				$image = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.$filePath.$file;
				//$image_thumbnail = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.$filePath.'thumbnail/'.$file;
				if (file_exists($image)) unlink($image);
				//if (file_exists($image_thumbnail)) unlink($image_thumbnail);
			}
			
		}
	}
	 public function processImg($files,$filename = 'files',$upload_path = 'assets/cms_images/')
	{
		$config['upload_path']          = $upload_path;
        $config['allowed_types']        = '*';
        $config['max_size']             = 3000;
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
	 public function processVideo($files,$filename = 'files',$upload_path = 'assets/cms_images/')
	{
		$config['upload_path']          = $upload_path;
        $config['allowed_types']        = 'mp4';
        $config['max_size']             = 102400;
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
            // print_r($error);
            // exit();
            // return false;
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
                //print_r($error);
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
   	 public function processFile($files,$filename = 'files',$upload_path = "assets/lib/uploads",$allowed_types = "docx|doc|pdf|txt")
	{
		$config['upload_path']          = $upload_path;
        $config['allowed_types']        = $allowed_types;
        $config['max_size']             = 20000;
       // $config['max_width']            = 3000 ;
        //$config['max_height']           = 2000;
        $new_name = time().mt_rand(1,999000); 
		$config['file_name'] = $new_name;
        $photos = "";
        $dataInfo = array();
      	$this->upload->initialize($config);
      	// $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload($filename))
        {
            $error = array('error' => $this->upload->display_errors());
             //print_r($error);
             //exit();
            //return false;
        }
        else
        {
             $data = array('upload_data' => $this->upload->data());
             return $data['upload_data']['file_name'];
        }
	}



	public function deleteSimple()
	{
		if (isset($_POST['tableName']) && isset($_POST['key']) && isset($_POST['value']))
		{
			if (!empty($_POST['tableName']) && !empty($_POST['key']) && !empty($_POST['value']))
			{
				
				$this->AdminModel->delRow($_POST['tableName'],array($_POST['key']=>$_POST['value']));
				$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success."
				));
				echo show_flash_data();
			}
			else
			{
				$this->session->set_flashdata('alert_data', array(
				'type' => 'warning', 
				'details' => " Developer Error! Empty Parameter"
				));
				echo show_flash_data();
			}
		}
		else
			{
				$this->session->set_flashdata('alert_data', array(
				'type' => 'warning', 
				'details' => " Developer Error! Empty Parameter"
				));
				echo show_flash_data();
			}
	}
	public function deleteRecord()
	{

		if (isset($_POST['tableName']) && isset($_POST['key']) && isset($_POST['value']))
		{
			if (!empty($_POST['tableName']) && !empty($_POST['key']) && !empty($_POST['value']))
			{
				if (isset($_POST['file']) && !empty($_POST['file']))
				{
					 $this->deleteImage($_POST['tableName'],$_POST['key'],$_POST['value'],$_POST['file'],$_POST['file_path']);
				}
				$this->AdminModel->delRow($_POST['tableName'],array($_POST['key']=>$_POST['value']));
				$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success."
				));
				echo show_flash_data();
			}
			else
			{
				$this->session->set_flashdata('alert_data', array(
				'type' => 'warning', 
				'details' => " Developer Error! Empty Parameter"
				));
				echo show_flash_data();
			}
		}
		else
		{
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Developer Error: Parameter Missing"
				));
			echo show_flash_data();
		}
		
	}

	public function saveUser()
	{
		$data = $_POST;
		if (isset($_FILES) && !empty($_FILES['files']['name']))
		{
			$photo =  $this->processImg($_FILES);
			$this->create_thumbnail($photo);
			$data = $data + array('image' => $photo);
		}
		if (isset($_POST['slug'])) {
			if($this->input->post('slug') == '')
				$data['slug'] = 'product-'.time();
			else
				$data['slug'] = $this->clean2($this->input->post('slug'));
		}
		
		$tableName = $data['tableName'];
		unset($data['tableName']);
		if (isset($_POST['password']))
		{
			$password = $this->input->post('password');
			if(empty($password)) unset($data['password']);
			else $data['password'] = md5($password);
		}
		
		//   echo "<pre>";
		//  print_r($data);
		// echo $tableName;

		if ($id=$this->AdminModel->insertReturn($tableName,$data))
		{
			$this->AdminModel->insertReturn('e_sale_wallet',array('saler_id'=>$id));
			$this->session->set_flashdata('alert_data', array(
				'type' => 'success', 
				'details' => "Action Success"
				));
			echo 'successfully';
		}
		else
			$this->session->set_flashdata('alert_data', array(
				'type' => 'danger', 
				'details' => "Action Failed"
				));
	}

	
}
