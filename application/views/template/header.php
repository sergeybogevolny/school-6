<?php 

$user = $this->session->userdata('userId');
$cartItemCount = $this->session->userdata('cart');
$cartItemCount = $cartItemCount ? count($cartItemCount) : 0;
?>
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
	<div class="admin_link"><a href="<?php echo link_url();?>admin">Admin login</a></div>
		<div class="title_box">
			<img class="site_logo" src="<?php echo asset_url(); ?>img/book.jpg" /><h1>Online Book Shop</h1>
		</div>

		<div class="session_box">
			<a href="<?php echo link_url();?>cart">
				<div class="cart" title="Items in shopping cart">
					<div class="cart_items">Cart: <?php echo $cartItemCount; ?></div>
					<img class="cart_img" src="<?php echo asset_url(), 'img/cart_icon.png'; ?>" />
					<div class="clear"></div>
				</div>
			</a>
		</div>
		<div class="clear"></div>
	</div>


	<div class="nav">
		<ul>
			<li><a href="<?php echo link_url();?>">Home</a></li>
			<li><a href="<?php echo link_url();?>home/search?category=1">Academic and Professional</a></li>
			<li><a href="<?php echo link_url();?>home/search?category=2">Biographies &amp; Autobiographies</a></li>
			<li><a href="<?php echo link_url();?>home/search?category=3">Business, Investing and Management</a></li>
			<li><a href="<?php echo link_url();?>cart">Shopping Cart</a></li>
			<?php if(empty($user)){ ?>
				<li><a href="<?php echo link_url();?>user/login">Login</a></li>
			<?php } else { ?>
				<li><a href="<?php echo link_url();?>user/orders">My orders</a></li>
				<li><a href="<?php echo link_url();?>user/logout">Logout</a></li>
			<?php } ?>
		</ul>
		<div class="clear"></div>
	</div>

<div class="content_wrapper">