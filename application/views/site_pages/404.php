<?php $this->load->view('site_layout/top');?>
<?php $this->load->view('site_layout/header');?>
   <div id="content">
		<div class="content-page">
			<div class="container">
				<div class="bread-crumb radius">
					<a href="#">Home</a> <span>404</span>
				</div>
				<div class="content-404">
					<img src="<?php echo base_url().'assets/lib/404.png' ?>" alt="" />
				</div>
			</div>
		</div>
	</div>
	
<?php $this->load->view('site_layout/footer');?>