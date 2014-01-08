
<?php if(empty($isAdmin)){ ?>

<?php $this->load->view('template/header.php'); ?>
<?php } else { ?>
<?php $this->load->view('template/admin_header.php'); ?>
<?php } ?>


<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>

<?php if(empty($isAdmin)){ ?>
<h2 class="page_title">You order is confirmed, thank you for shopping with us.</h2>
<?php } ?>
<h3>Order Reference Number: #ORN-<?php echo $order['order']->order_id; ?></h3>

<div class="Address_1">
	<h3>Shipping address:</h3>
	<p>
		<strong><?php echo $customer->full_name; ?></strong></br>
		<?php echo $customer->address; ?></br>
		<?php echo $customer->city; ?></br>
		<?php echo $customer->state; ?></br>
		<?php echo $customer->country; ?>
		Phone: <?php echo $customer->phone; ?></br>
		Email: <?php echo $customer->email; ?>
	</p>
</div>


<div class="Address_2">
	<h3>Billing address:</h3>
	<p>
		<strong><?php echo $customer->full_name; ?></strong></br>
		<?php echo $customer->address; ?></br>
		<?php echo $customer->city; ?></br>
		<?php echo $customer->state; ?></br>
		<?php echo $customer->country; ?>
		Phone: <?php echo $customer->phone; ?></br>
		Email: <?php echo $customer->email; ?>
	</p>
</div>
<div class="clear"></div>


<h3>Payment method : Cash on delivery</h3>
<table class="cart_table" style="margin-bottom: 20px;">
	
<tr>
	<th width="7%">Item Id</th>
	<th>Item</th>
	<th width="10%">Quantity</th>
	<th width="10%">Price</th>
	<th width="10%">Subtotal</th>
</tr>



<?php 
	$total = 0;
	if($order['order_item']){
		foreach ($order['order_item'] as $Item) { 
			$total += $Item->price * $Item->unit;
?>
		<tr>
			<td valign="middle" align="center" >#BK<?php echo $Item->item_id; ?></td>
			<td><?php echo  $Item->title;?></td>
			<td align="center" ><?php echo  $Item->unit;?></td>
			<td align="center" >Rs. <?php echo  $Item->price;?></td>
			<td align="center" >Rs. <?php echo  $Item->price * $Item->unit;?></td>
		</tr>
	<?php } ?>
<?php } else { ?>
	<tr class="total_row">
		<td colspan="5">No items in cart</td>
	</tr>
<?php } ?>


<tr class="total_row">
	<td colspan="4" align="right">Total order value : </td>
	<td colspan="1" align="center">Rs. <?php echo $total; ?></td>
</tr>

</table>



<a class="check_out_btn float_right" href="<?php echo site_url(); ?>">Back to Home</a>

<div class="clear"></div>

<?php $this->load->view('template/footer.php'); ?>
