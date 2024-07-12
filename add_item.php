<form method="post">
	Item Name:
	<input type="text" name="item_name">
	<br>
	Item Price:
	<input type="text" name="item_price" id="">
	<br>
	Status:
	<input type="radio" name="item_status" id="" value="1">Available
	&nbsp;&nbsp;
	<input type="radio" name="item_status" id="" value="0">Out of Stock
	<br><br>
	<input type="submit" value="Add Item" name="add_item">
</form>

<a href="view_item.php">view items</a>
<?php

	if(isset($_POST['add_item'])) {

		include 'dbconn.php';

		$item_name = $_POST['item_name'];
		$item_price = $_POST['item_price'];
		$item_status = $_POST['item_status'];

		$sql = "INSERT INTO item(item_name, item_price, item_status, view_status)
					VALUES('$item_name', '$item_price', $item_status, 1)";

		$result = mysqli_query($conn, $sql);

		if($result) {
			echo "item has been added";
		} else {
			echo "error while adding item";
		}

		mysqli_close($conn);
	}

?>