<?php include 'includes/header.php'; ?>



<h2 class="page_title">Place Order</h2>

<div class="place_order_forms"> 
<form>
	
	<fieldset>
		<legend>Login</legend>

		<label>Username</label>
		<input type="text" name="username"/><br/>

		<label>Password</label>
		<input type="password" name="password"/><br/>

		<input type="submit">
		
	</fieldset>

</form>

<br/>

<form>
	
	<fieldset>
		<legend>Or Signup</legend>

		<label>Username</label>
		<input type="text" name="username"/><br/>

		<label>Password</label>
		<input type="password" name="password"/><br/>

		<label>Confirm Password</label>
		<input type="password" name="password"/><br/>


		<label>Full Name</label>
		<input type="text" name="name"/><br/>

		<label>Country</label>
		<input type="text" name="name"/><br/>

		<label>State</label>
		<input type="text" name="name"/><br/>

		<label>City/ Town</label>
		<input type="text" name="name"/><br/>

		<label>Address</label>
		<textarea name="address"></textarea><br/>

		<label>Phone</label>
		<input type="text" name="name"/><br/>


		<input type="submit">

	</fieldset>

</form>

</div>




<a class="check_out_btn" href="<?php echo APP_URL, 'check_out.php' ; ?>">Check Out</a>

<?php include 'includes/footer.php'; ?>