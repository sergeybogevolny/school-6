<?php $this->load->view('template/header.php'); ?>


<div class="search_box">
	<form action="<?php echo link_url(). "home/search"; ?>">
		<label for="search">Search :</label>
		<input type="text" name="search" id="search"/>

		<label for="category">Categories :</label>
		<select name="category" id="category">
			<option value="">Select</option>
			<?php foreach (getBookCategories() as $categoryId => $category) { ?>
				<option value="<?php  echo $categoryId ; ?>"><?php echo $category; ?></option>
			<?php } ?>
		</select>

		<input type="submit" value="Search" />
	</form>
</div>



<?php 
if(!empty($list)){ 
	$y =0;
	foreach ($list as $item) { 
		$y++;
		if(!($y%4)){ 
?>
			<div class="books_wrapper">
		<?php } ?>

		


				<div class="book">
					<div class="book_img_wrapper">
						<table class="image_tbl">
							<tr>
								<td valign="middle" align="center">
									<img src="<?php echo base_url() , $item->image;  ?>">
								</td>
							</tr>
						</table>
					</div>
					<div class="book_name"><?php echo $item->title; ?></div>
					<div class="book_data"><?php echo substr($item->description,0,200);  ?></div>
					<span class="book_price">Rs. <?php echo $item->price; ?></span>
					<span class="book_links">
						<?php if($item->stock > 0){ ?>
							<span class='instock'>In stock</span>
							<a href="<?php echo base_url(). 'add_to_cart.php?book_id=10'; ?>">Add to cart</a>
						<?php } else { ?>
								<span class='outOfstock'>Out of Stock</span>
						<?php } ?>
						
					</span>
					<div class="clear"></div>
				</div>

		<?php if(!($y%4)){ ?>
			<div class="clear"></div>
			</div>
		<?php } ?>
	<?php } ?>
<?php } ?>

<?php $this->load->view('template/footer.php'); ?>