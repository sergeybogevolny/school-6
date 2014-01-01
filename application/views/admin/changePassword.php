<?php $this->load->view('template/admin_header.php'); ?>

<h3>Change Password</h3>

<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>

<div class="">
	<form action="<?php echo link_url(); ?>admin/processChangePassword" method="POST">

		<label for="oldpassword">Password :</label><br/>
		<input type="password" name="oldpassword" id="oldpassword"/>
		<br/>

		<label for="password">Password :</label><br/>
		<input type="password" name="password" id="password"/>
		<br/>

		<label for="confirmPassword">Confirm password :</label><br/>
		<input type="password" name="confirmPassword" id="confirmPassword"/>
		<br/>

		<input type="submit" value="Change password" />
	</form>
</div>

<?php $this->load->view('template/footer.php'); ?>