<?php $this->load->view('template/admin_header.php'); ?>


<h3>Admin login</h3>

<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>


<div class="">
	<form action="<?php echo link_url(); ?>admin/login" method="POST">
		<label for="username">Username :</label><br/>
		<input type="text" name="username" id="username"/>
		<br/>
		<label for="password">Password :</label><br/>
		<input type="password" name="password" id="password"/>
		<br/>
		<input type="submit" value="Login" />
	</form>
</div>

<?php $this->load->view('template/footer.php'); ?>
