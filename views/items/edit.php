<form action="?controller=items&action=update" method="post">
	<input type="hidden" name="id" value="<?php echo $item->id; ?>"><br />
	Item Name<br />
	<input type="text" name="itemname" value="<?php echo $item->itemname; ?>"><br />
	Item Quantity<br />
	<input type="text" name="itemquantity" value="<?php echo $item->itemquantity; ?>"><br />
	Item Price<br />
	<input type="text" name="itemprice" value="<?php echo $item->itemprice; ?>"><br />
	<input type="Submit" value="Update">

</form>