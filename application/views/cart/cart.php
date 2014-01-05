<?php $this->load->view('template/header.php'); ?>


<h3>Shopping Cart</h3>

<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>


<h2 class="page_title">Shopping cart</h2>

<table class="cart_table">
	
<tr>
	<th>Image</th>
	<th>Item</th>
	<th>Quantity</th>
	<th>Price</th>
	<th>Remove</th>
</tr>



<?php 
	$total = 0;
	if($cart){
		foreach ($cart as $Item) { 
			$total += $Item->price;
	?>
		<tr>
			<td valign="middle" align="center" ><img src="<?php echo  base_url(), $Item->image;  ?>"></td>
			<td><?php echo  $Item->title;?></td>
			<td align="center" ><input type="text" value="1" class="cart_count" onchange="" /></td>
			<td align="center" >Rs. <?php echo  $Item->price;?></td>
			<td align="center" ><a href="<?php echo site_url(), '/cart/removeFromCart?id='. $Item->item_id; ?>">Remove</a></td>
		</tr>
	<?php } ?>
<?php } else { ?>
	<tr class="total_row">
		<td colspan="5">No items in cart</td>
	</tr>
<?php } ?>


<tr class="total_row">
	<td colspan="3">Total order value : </td>
	<td colspan="2">Rs. <?php echo $total; ?></td>
</tr>

</table>


<a class="check_out_btn" href="<?php echo 'check_out.php' ; ?>">Continue shopping</a>

<a class="check_out_btn float_right" href="<?php echo 'check_out.php' ; ?>">Place Order</a>



















<?php $this->load->view('template/footer.php'); ?>
