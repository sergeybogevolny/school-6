<?php $this->load->view('template/header.php'); ?>



<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>


<?php //if($form != 2) { ?>
<h2>Login to continue</h2>
<div >
	<form action="<?php echo link_url(); ?>user/doLogin" method="POST">
		<label for="username">Username :</label><br/>
		<input type="text" name="username" id="username"/>
		<br/>
		<label for="password">Password :</label><br/>
		<input type="password" name="password" id="password"/>
		<br/>
		<input type="submit" value="Login" />
	</form>
</div>
<?php //} if($form != 1) { ?>

<p>
	demo username: saji<br />
		password : saji
</p>

<h2>SignUp</h2>


<form method="POST" action="<?php echo link_url(); ?>user/saveRegister">
	


		<label>Username <span class="redFont">*</span></label><br/>
		<input type="text" name="username"/><br/>

		<label>Password <span class="redFont">*</span></label><br/>
		<input type="password" name="password"/><br/>

		<label>Confirm Password <span class="redFont">*</span></label><br/>
		<input type="password" name="confirmPassword"/><br/>


		<label>Full Name <span class="redFont">*</span></label><br/>
		<input type="text" name="full_name"/><br/>

		<label>Country <span class="redFont">*</span></label><br/>
		<input readonly type="text" name="country" value="India"/><br/>

		<label>State <span class="redFont">*</span></label><br/>
		<select name="state" >
			<option >Kerala</option>
			<option >Bihar</option>
			<option >Andaman &amp; Nicobar</option>
			<option >Andhra Pradesh</option>
			<option >Arunachal Pradesh</option>
			<option >Assam</option>
			<option >Chandigarh</option>
			<option >Chhattisgarh</option>
			<option >Dadra &amp; Nagar Haveli</option>
			<option >Daman &amp; Diu</option>
			<option >Delhi</option>
			<option >Goa</option>
			<option >Gujarat</option>
			<option >Haryana</option>
			<option >Himachal Pradesh</option>
			<option >Jammu &amp; Kashmir</option>
			<option >Jharkand</option>
			<option >Karnataka</option>
			<option >Lakshadeep</option>
			<option >MadhyaPradesh</option>
			<option >Maharashtra</option>
			<option >Manipur</option>
			<option >Meghalaya</option>
			<option >Mizoram</option>
			<option >Nagaland</option>
			<option >Orissa</option>
			<option >Pondicherry</option>
			<option >Punjab</option>
			<option >Rajasthan</option>
			<option >Sikkim</option>
			<option >Tamil Nadu</option>
			<option >Tripura</option>
			<option >Uttar Pradesh</option>
			<option >Uttaranchal</option>
			<option >West Bengal</option>
		</select>

		<br/>

		<label>City/ Town <span class="redFont">*</span></label><br/>
		<input type="text" name="city"/><br/>

		<label>Address <span class="redFont">*</span></label><br/>
		<textarea name="address"></textarea><br/>

		<label>Phone <span class="redFont">*</span></label><br/>
		<input type="text" name="phone"/><br/>

		<label>Email <span class="redFont">*</span></label><br/>
		<input type="text" name="email"/><br/>

		<input type="submit" value="Sign up">



</form>
<?php //} ?>
<?php $this->load->view('template/footer.php'); ?>