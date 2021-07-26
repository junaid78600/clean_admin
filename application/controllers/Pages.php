<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct() {

        parent::__construct();
		$this->load->helper('url');
		$this->load->helper('function_helper');
		$this->load->Model('SiteModel');
		$this->load->library('pagination');
    }
    public function _remap($page,$para = array())
    {
    	$this->subPages($page,$para);
    }
	public function index()
	{
		echo "pages cotnroller index";
	}	
	public function subPages($page,$para)
	{
		if ($page == 'gallery' || $page == 'Gallery')
		{
			$settings = $this->SiteModel->getSetting();
			$pageData = $this->SiteModel->getPageData('gallery');
			$content = $this->SiteModel->getOrderBy('e_gallery','tdate','desc');
			$data =  array(
				'settings' => $settings,
				'pageData' => $pageData,
				'controller'=> 'Pages',
				'content'   => $content,
				'gallery_cat'=>$this->SiteModel->getRows('e_gallery_cat')
			);
			
			$this->load->view('site_pages/gallery',$data);
		}
		
		elseif ($page == 'contact-us')
		{
			$this->load->helper('captcha');
			if (isset($_SESSION['captcha'])) {
				$file = $_SERVER['DOCUMENT_ROOT'].'/'.CMS_PATH.'assets/captcha/'.$this->session->captcha['filename'];
				if (file_exists($file))unlink($file);
			}
			$values = array(
					'word' => '',   //Generate alternate word by default. You can also set your word.
					'word_length' => 7,  // To set length of captcha word.
					'img_path' => 'assets/captcha/',   // Create  folder "images" in root directory, and give path.
					'img_url' => base_url() .'assets/captcha/',  // To store captcha images in "images" folder.

					// Font path is used font library, which will stored  in system/fonts/texb.ttf.
					'font_path' => base_url() . 'system/fonts/texb.ttf',
					'img_width' => '260',  //Set image width.
					'img_height' => 57,   // Set image height.
					'expiration' => 3600   // This will automatically expire images in given time.
					);
					// "create_captcha" is function of "captcha helper", this will set array in helper library.
					$captcha = create_captcha($values);
					$_SESSION['captchaWord'] = $captcha['word'];
					$_SESSION['captcha'] = $captcha;
			$settings = $this->SiteModel->getSetting();
			$pageData = $this->SiteModel->getPageData($page);
			
			if ($pageData)
			{
				$data =  array(
				'settings' => $settings,
				'pageData' => $pageData,
				'controller'=> 'Pages',
				'currentPage'=>$page,
				'captcha'	=>$captcha['image']
				
				);
				
				$this->load->view('site_pages/contact_us_view',$data);
			}

		}
		
		else
		{
			
			

			$settings = $this->SiteModel->getSetting();
			$pageData = $this->SiteModel->getPageData($page);
			if ($pageData)
			{
				$data =  array(
				'settings' => $settings,
				'pageData' => $pageData,
				'controller'=> 'Pages',
				
				);
				
				$this->load->view('site_pages/dynamic_view',$data);
			}
			else
			{
				$data =  array(
				'settings' => $settings,
				'pageData' => $pageData,
				'controller'=> 'Pages',
				);
				
				$this->load->view('site_pages/404',$data);
			}

			
		}

	}
}
