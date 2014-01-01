<?php $this->load->view('template/admin_header.php'); ?>

<h3>Add Books</h3>

<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>

<?php if(!empty($success)) { ?>
<div class="success_message"><?php echo $success; ?></div>
<?php } ?>

<div class="">
	<?php echo form_open_multipart('admin/processAddInventory');?>

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
		<select name="stock" id="stock">
			<option value="0">Out of stock</option>
			<?php for ($i=1; $i < 501 ; $i++) { ?>
				<option><?php echo $i; ?></option>
			<?php } ?>
		</select>
		<br/>
		<br/>
		<label for="category">Category:</label><br/>
		<select name="category" id="category">
			<?php foreach (getBookCategories() as $categoryId => $category) { ?>
				<option value="<?php  echo $categoryId ; ?>"><?php echo $category; ?></option>
			<?php } ?>
		</select>
		<br/>
		<br/>
		<label for="image">Upload image (max size 2mb, 1024x768 px):</label><br/>
		<input type="file" name="userfile" id="image" />
		<br/>
		<br/>
		<input type="submit" value="Save" />
	</form>
</div>

<?php $this->load->view('template/footer.php'); ?>