<?php $this->load->view('site_layout/top');?>
<?php $this->load->view('site_layout/header');?>
<?php if($pageData['image'] == "") $image = base_url().'assets/lib/about.jpg';
        else $image = base_url().'assets/cms_images/'.$pageData['image'] ?>
   <div class="tt-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="<?php echo base_url() ?>">Home</a></li>
            <li><a href="">Pages</a></li>
            <li><?php echo $pageData['name'] ?></li>
        </ul>
    </div>
</div>
<div id="tt-pageContent">
    <div class="container-indent">
        <div class="container container-fluid-custom-mobile-padding">
            <h1 class="tt-title-subpages noborder"><?php echo $pageData['heading'] ?></h1>
            <p><?php echo $pageData['details'] ?></p>
        </div>
    </div>
</div>



<?php $this->load->view('site_layout/footer');?>