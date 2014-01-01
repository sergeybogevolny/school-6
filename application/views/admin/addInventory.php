<?php $this->load->view('template/admin_header.php'); ?>

<h3>Add Goods</h3>

<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>

<div class="">
	<form action="<?php echo link_url(); ?>admin/processChangePassword" method="POST">

		<label for="title">Item Title :</label><br/>
		<input type="text" name="title" id="title"/>
		<br/>
		<br/>
		<label for="description">Description :</label><br/>
		<textarea name="description" id="description"></textarea> 
		<br/>
		<br/>
		<label for="price">Price in Rs :</label><br/>
		<input type="text" name="price" id="price"/>
		<br/>
		<br/>
		<label for="stock">Units in stock:</label><br/>
		<select>
			<option value="0">Out of stock</option>
			<?php for ($i=1; $i < 501 ; $i++) { ?>
				<option><?php echo $i; ?></option>
			<?php } ?>
		</select>
		<br/>
		<br/>
		<label for="image">Upload image :</label><br/>
		<input type="file" name="image" id="image" />
		<br/>
		<br/>
		<input type="submit" value="Save" />
	</form>
</div>

<?php $this->load->view('template/footer.php'); ?>