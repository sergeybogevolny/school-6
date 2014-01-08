<?php $this->load->view('template/admin_header.php'); ?>

<h3>Manage Inventory</h3>

<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>

<?php if(!empty($success)) { ?>
<div class="success_message"><?php echo $success; ?></div>
<?php } ?>

<div class="">
	<?php 
		if(!empty($item->item_id)){ 
			$action = 'admin/editInventory';
		} else {
			$action = 'admin/processAddInventory';
		}
	?>
	<?php echo form_open_multipart($action);?>

		<label for="title">Item Title :</label><br/>
		<input type="text" name="title" id="title" value="<?php echo !empty($item->title) ? $item->title: ''; ?>" />
		<br/>
		<br/>


		<label for="description">Description :</label><br/>
		<textarea name="description" id="description"><?php echo !empty($item->description) ? $item->description : ''; ?></textarea> 
		<br/>
		<br/>


		<label for="price">Price in Rs :</label><br/>
		<input type="text" name="price" id="price" value="<?php echo !empty($item->price) ? $item->price : ''; ?>"/>
		<br/>
		<br/>


		<label for="stock">Units in stock:</label><br/>
		<select name="stock" id="stock">
			<option value="0">Out of stock</option>
			<?php for ($i=1; $i < 501 ; $i++) { ?>
				<?php $stSelected = ($i == $item->stock) ? 'selected="selected"': ''; ?>
				<option <?php  echo $stSelected ; ?> ><?php echo $i; ?></option>
			<?php } ?>
		</select>
		<br/>
		<br/>


		<label for="category">Category:</label><br/>
		<select name="category" id="category">
			<?php foreach (getBookCategories() as $categoryId => $category) { ?>
				<?php $catSelected = ($categoryId == $item->category) ? 'selected="selected"': ''; ?>
				<option <?php  echo $catSelected ; ?> value="<?php  echo $categoryId ; ?>"><?php echo $category; ?></option>
			<?php } ?>
		</select>
		<br/>
		<br/>
		<?php if(!empty($item->item_id)){ ?>
			<input type="hidden" name="item_id" value="<?php echo $item->item_id; ?>" />
		<?php } else { ?>
			<label for="image">Upload image (max size 2mb, 1024x768 px):</label><br/>
			<input type="file" name="userfile" id="image" />
		<?php } ?>
		<br/>
		<br/>


		<input type="submit" value="Save" />
	</form>
</div>

<?php $this->load->view('template/footer.php'); ?>