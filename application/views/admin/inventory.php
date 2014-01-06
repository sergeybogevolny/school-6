<?php $this->load->view('template/admin_header.php'); ?>


<h3 class="floatLeft">Manage Inventory</h3>

<a href="<?php echo link_url(); ?>admin/addInventory" class="addInventoryBtn floatRight" >Add Books</a>
<div class="clear"></div>

<table class="cart_table order_table">
	
<tr>
	<th class="orderNumber">Item Id</th>
	<th width="10%">Image</th>
	<th class="customer">Title</th>
	<th>Description</th>
	<th>Category</th>
	<th class="orderValue">Unit price</th>
	<th>Stock</th>
</tr>

<?php if(!empty($inventory)){ ?>
	<?php foreach ($inventory as $item) { ?>
		<tr>
			<td valign="middle" align="center" ><?php echo $item->item_id; ?></td>
			<td><img src="<?php echo base_url().$item->image; ?>" /></td>
			<td><?php echo $item->title; ?></td>
			<td><?php echo substr($item->description,0,200); ?></td>
			<td><?php echo getBookCategories($item->category); ?></td>
			<td align="center" >Rs. <?php echo $item->price; ?></td>
			<td align="center" ><?php echo $item->stock; ?></td>
		</tr>
	<?php } ?>
<?php } ?>

</table>
<?php $this->load->view('template/footer.php'); ?>