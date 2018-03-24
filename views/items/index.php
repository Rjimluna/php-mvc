<table border="1">
	<tr>
		<th></th>
		<th>Item Name</th>
		<th>Item Quantity</th>
		<th>Item Price</th>
		<th>Action</th>
	</tr>
<?php $c = 1; ?>
<?php foreach($items as $item): ?>
	<tr>
		<td><?php echo $c; ?></td>
		<td><?php echo $item->itemname; ?></td>
		<td><?php echo $item->itemquantity; ?></td>
		<td><?php echo $item->itemprice; ?></td>
		<td><a href="?controller=items&action=edit&id=<?php echo $item->id; ?>">Edit</a> <a href="?controller=items&action=destroy&id=<?php echo $item->id; ?>" onclick="return confirm('are you sure?')">Delete</a></td>
	</tr>
<?php $c++; ?>
<?php endforeach; ?>
</table>