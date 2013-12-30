<?php include 'includes/header.php'; ?>



<h2 class="page_title">Shopping cart</h2>

<table class="cart_table">
	
<tr>
	<th>Image</th>
	<th>Item</th>
	<th>Quantity</th>
	<th>Price</th>
	<th></th>
</tr>

<tr>
	<td valign="middle" align="center" ><img src="<?php echo APP_URL, 'uploads/books/sample.jpeg';  ?>"></td>
	<td>Compilers : Principles, Techniques, & Tools 2 Edition (Paperback)</td>
	<td align="center" >1</td>
	<td align="center" >Rs. 250</td>
	<td align="center" ><a href="<?php echo APP_URL, 'remove_from_cart.php?book_id=10'; ?>">Remove</a></td>
</tr>

<tr>
	<td valign="middle" align="center" ><img src="<?php echo APP_URL, 'uploads/books/sample.jpeg';  ?>"></td>
	<td>Compilers : Principles, Techniques, & Tools 2 Edition (Paperback)</td>
	<td align="center" >1</td>
	<td align="center" >Rs. 250</td>
	<td align="center" ><a href="<?php echo APP_URL, 'remove_from_cart.php?book_id=10'; ?>">Remove</a></td>
</tr>
<tr>
	<td valign="middle" align="center" ><img src="<?php echo APP_URL, 'uploads/books/sample.jpeg';  ?>"></td>
	<td>Compilers : Principles, Techniques, & Tools 2 Edition (Paperback)</td>
	<td align="center" >1</td>
	<td align="center" >Rs. 250</td>
	<td align="center" ><a href="<?php echo APP_URL, 'remove_from_cart.php?book_id=10'; ?>">Remove</a></td>
</tr>
<tr>
	<td valign="middle" align="center" ><img src="<?php echo APP_URL, 'uploads/books/sample.jpeg';  ?>"></td>
	<td>Compilers : Principles, Techniques, & Tools 2 Edition (Paperback)</td>
	<td align="center" >1</td>
	<td align="center" >Rs. 250</td>
	<td align="center" ><a href="<?php echo APP_URL, 'remove_from_cart.php?book_id=10'; ?>">Remove</a></td>
</tr>
<tr>
	<td valign="middle" align="center" ><img src="<?php echo APP_URL, 'uploads/books/sample.jpeg';  ?>"></td>
	<td>Compilers : Principles, Techniques, & Tools 2 Edition (Paperback)</td>
	<td align="center" >1</td>
	<td align="center" >Rs. 250</td>
	<td align="center" ><a href="<?php echo APP_URL, 'remove_from_cart.php?book_id=10'; ?>">Remove</a></td>
</tr>

<tr class="total_row">
	<td colspan="3">Total order value : </td>
	<td colspan="2">Rs. 2000</td>
</tr>

</table>


<a class="check_out_btn" href="<?php echo APP_URL, 'check_out.php' ; ?>">Place Order</a>




<?php include 'includes/footer.php'; ?>