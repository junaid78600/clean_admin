<?php  
$CI =& get_instance();

if (empty($pageData))
{
	$pageTitle = $metaKeyword = $description = $settings['siteName'];
}
else
{
	$pageTitle = $pageData['pagetitle'];
	$metaKeyword = $pageData['keywords'];
	$description = $pageData['discription'];
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?=$pageTitle?></title>
<meta property="og:url"                content="<?php echo base_url() ?>" />
<meta property="og:type"               content="" />
<meta property="og:title"              content="<?=$pageTitle?>" />
<meta property="og:description"        content="<?=$description?>" />
<meta property="og:image"              content="<?=base_url().'assets/cms_images/'.$settings['image']?>" />

	<meta name="author" content="<?=$metaKeyword?>" />
	<meta name="description" content="<?=$description?>" />
	
	<link rel="shortcut icon" href="<?=base_url().'assets/cms_images/'.$settings['icon']?>" type="image/x-icon" />

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php echo base_url().'assets/site_assets/' ?>css/theme.css">
	<!-- <link rel="stylesheet" href="<?php echo base_url().'assets/site_assets/' ?>css/theme-books.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo base_url().'assets/site_assets/' ?>css/anotherfont-books.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,500,600,700" rel="stylesheet">
</head>
</head>
<body>
<div id="loader-wrapper">
	<div id="loader">
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
		<div class="dot"></div>
	</div>
</div>