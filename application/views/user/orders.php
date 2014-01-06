<?php $this->load->view('template/header.php'); ?>


<h3 class="page_title">Your Orders</h3>

<table class="cart_table order_table">
<tr>
	<th class="orderNumber">Order number</th>
	<th class="itemQuantity">Items &amp; quantity</th>
	<th class="customer">Customer</th>
	<th class="orderValue">Order value</th>
	<th class="orderStatus">Order status</th>
</tr>
<?php 
	foreach ($orders as $order) { 
		$orderValue = 0;
?>
<tr>
	<td valign="middle" align="center" >#ORN-<?php echo $order->order_id; ?></td>
	<td>

		<table width="100%" class="innerTable">
		<?php foreach ($order->items as $k => $item) { ?>
			<tr>
				<td width="3%">&bull;</td>
				<td><?php echo substr($item->title, 0, 50); ?> </td>
				<td width="18%">: <?php echo $item->unit; ?> x <?php echo $item->price; ?></td>
			</tr>
			<?php $orderValue += $item->unit * $item->price; ?>
		<?php } ?>
		</table>
	 </td>
	<td><?php echo $order->full_name; ?><br/>
		<?php echo $order->address; ?>,
		<?php echo $order->city; ?>,
		<?php echo $order->state; ?>,
		<?php echo $order->country; ?>,
		Phone: <?php echo $order->phone; ?>,
		Email: <?php echo $order->email; ?>
	</td>
	<td align="center" >Rs. <?php echo $orderValue; ?></td>
	<td align="center" ><?php echo $order->status ; ?></td>
</tr>
<?php } ?>


</table>


<script type="text/javascript">
	
function changeOrderStatus (obj, orderId) {
	var status = $(obj).val();
	$.post(
		'<?php echo site_url(); ?>/admin/changeOrderStatus',
		{
			order_id : orderId,
			order_status : status,
			cacheBuster : Math.random() 
		},function (resp) {
			console.log(resp);
			if(resp.status == 'ok'){
				alert('Order status updated.');
			} else {
				alert('An unexpected error occurred please try again.');
			}
		},
		'json'
	);
}

</script>

<?php $this->load->view('template/footer.php'); ?>