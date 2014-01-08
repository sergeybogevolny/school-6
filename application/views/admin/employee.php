<?php $this->load->view('template/admin_header.php'); ?>

<?php if(!empty($error)) { ?>
<div class="error_message"><?php echo $error; ?></div>
<?php } ?>

<?php if(!empty($success)) { ?>
<div class="success_message"><?php echo $success; ?></div>
<?php } ?>

<h3 class="floatLeft">Manage Employee</h3>

<a href="<?php echo link_url(); ?>admin/addEmployee" class="addInventoryBtn floatRight" >Add employee</a>
<div class="clear"></div>

<table class="cart_table order_table">
	
<tr>
	<th class="orderNumber">Delete</th>
	<th class="orderNumber">Edit</th>
	<th class="orderNumber">Employee Id</th>
	<th class="customer">Name</th>
	<th class="customer">Username</th>
</tr>

<?php if(!empty($employees)){ ?>
	<?php foreach ($employees as $employee) { ?>
		<tr>
			<td><a href="<?php echo link_url(), 'admin/deleteEmployee?id=', $employee->id; ?>" onclick="javascript:return confirm('Are you sure you want to delete?');" >Delete</a></td>
			<td><a href="<?php echo link_url(), 'admin/editEmployee?id=', $employee->id; ?>">Edit</a></td>
			<td valign="middle" align="center" ><?php echo $employee->id; ?></td>
			
			<td><?php echo $employee->name; ?></td>
			<td><?php echo $employee->username; ?></td>
		</tr>
	<?php } ?>
<?php } ?>

</table>
<?php $this->load->view('template/footer.php'); ?>