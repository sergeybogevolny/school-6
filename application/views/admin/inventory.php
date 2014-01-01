<?php $this->load->view('template/admin_header.php'); ?>


<h3>Manage Inventory</h3>


<table class="cart_table order_table">
	
<tr>
	<th class="orderNumber">Order number</th>
	<th class="itemQuantity">Items &amp; quantity</th>
	<th class="customer">Customer</th>
	<th class="orderValue">Order value</th>
	<th class="orderStatus">Order status</th>
</tr>

<tr>
	<td valign="middle" align="center" >10</td>
	<td>
		Book Compilers : 1 <br />
		Book Principles, Techniques : 5 <br />
		Book Tools 2 Edition (Paperback) : 1
	 </td>
	<td>C. N. Krishna Pillai, Kavanisseril house, vanmazhy pandanad P.O, Chengannur Alappuzha Kerala India</td>
	<td align="center" >Rs. 250</td>
	<td align="center" >
		<select onchange="alert(this.value);">
			<option>Order accepted</option>
			<option>Order processing</option>
			<option>Items shipped</option>
			<option>Items delivered</option>
			<option>Order canceled</option>
		</select>
	</td>
</tr>



</table>
<?php $this->load->view('template/footer.php'); ?>