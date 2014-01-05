<!DOCTYPE HTML>
<html>
<head>
	<title>Books online</title>
	<link rel="stylesheet" type="text/css" href="<?php echo asset_url(), 'css/basic.css'; ?>">
	<script type="text/javascript" src="<?php echo asset_url(), 'js/jquery.js' ; ?>"></script>
</head>
<body>

<div class="wrapper">
	
	<div class="header_wrapper">
		<div class="title_box"><h1>E-commerce Management System</h1></div>
		<div class="session_box">
			<div class="cart" title="Items in shopping cart"></div>
		</div>
		<div class="clear"></div>

	</div>
	<?php if(empty($hideMenu)) { ?>
	<div class="nav">
		<ul>
			<li><a href="<?php echo link_url();?>admin/orders">Process Orders</a></li>
			<li><a href="<?php echo link_url();?>admin/inventory">Inventory Management</a></li>
			<li><a href="<?php echo link_url();?>admin/changePassword">Change Password</a></li>
			<li><a href="<?php echo link_url();?>admin/logout">Logout</a></li>
		</ul>
		<div class="clear"></div>
	</div>
	<?php } ?>

<div class="content_wrapper">
