<?php
		
	function updateItem($data) {
?>
		<form method="post">
			Item Name:
			<input type="text" name="item_name" value="<?php echo $data['item_name']; ?>">
			<br>
			Item Price:
			<input type="text" name="item_price" id="" value="<?php echo $data['item_price']; ?>">
			<br>
			Status:
			<?php
				if($data['item_status']) {
			?>
				<input type="radio" name="item_status" checked value="1">Available
				&nbsp;&nbsp;
				<input type="radio" name="item_status" id="" value="0">Out of Stock
			<?php } else { ?>
				<input type="radio" name="item_status" value="1">Available
				&nbsp;&nbsp;
				<input type="radio" name="item_status" checked id="" value="0">Out of Stock
			<?php } ?>
			<br><br>
			<input type="hidden" name="item_id" value="<?php echo $data['item_id']; ?>">
			<input type="submit" value="Update Item" name="update_item">		
		</form>

		<a href = 'view_item.php'> click here to go back</a>

<?php
	
	}


	$id = $_GET['id'];

	if(isset($id)) {
		include 'dbconn.php';

		$sql = "SELECT * FROM item WHERE item_id = $id";
		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_array($result);

		updateItem($row);

		mysqli_close($conn);
	}

	if(isset($_POST['update_item'])) {
		include 'dbconn.php';

		$item_id = $_POST['item_id'];
		$item_name = $_POST['item_name'];
		$item_price = $_POST['item_price'];
		$item_status = $_POST['item_status'];

		$sql = "UPDATE item SET item_name = '$item_name',
						item_price = '$item_price',
						item_status = $item_status
					WHERE item_id = $item_id";

		$result = mysqli_query($conn, $sql);

		if($result) {
			echo "item has been updated";
		} else {
			echo "error while updating";
		}
		mysqli_close($conn);
	}

?>