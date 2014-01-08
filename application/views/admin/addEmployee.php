<?php $this->load->view('template/admin_header.php'); ?>

<h3>Manage Employee</h3>

<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>

<?php if(!empty($success)) { ?>
<div class="success_message"><?php echo $success; ?></div>
<?php } ?>

<div class="">
	<?php 
		if(!empty($employee->id)){ 
			$action = 'admin/editEmployee';
		} else {
			$action = 'admin/saveEmployee';
		}
	?>
	<?php echo form_open_multipart($action);?>

		<label for="name">Employee name :</label><br/>
		<input type="text" name="name" id="name" value="<?php echo !empty($employee->name) ? $employee->name: ''; ?>" />
		<br/>
		<br/>

		<label for="username">Username :</label><br/>
		<input type="text" name="username" id="username" value="<?php echo !empty($employee->username) ? $employee->username: ''; ?>" />
		<br/>
		<br/>
	

		<label for="password">Temporary password :</label><br/>
		<input type="text" name="password" id="password" />
		<br/>
		<br/>

		<input type="hidden" name="id" value="<?php echo !empty($employee->id) ? $employee->id : ''; ?>">
		<input type="submit" value="Save" />
	</form>
</div>

<?php $this->load->view('template/footer.php'); ?>