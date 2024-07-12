
<a href = 'add_item.php'>Add item</a>
<br><br>
<?php
	
	include 'dbconn.php';

	$sql = "SELECT * FROM item WHERE view_status = 1";

	$result = mysqli_query($conn, $sql);

	$ctr = 1;
	while ($row = mysqli_fetch_assoc($result)) {
		echo $ctr++ . ") ";
		// echo $row['item_id'] . " ";
		echo $row['item_name'] . " ";
		echo $row['item_price'] . " ";

		if($row['item_status']) {
			echo "available";
		} else {
			echo "out of stock";
		}

		echo " <a href = 'edit_item.php?id=" . $row['item_id'] . "'>EDIT</a>";
		echo " | ";
		echo " <a href = 'delete_item.php?id=" . $row['item_id'] . "'>DELETE</a>";
		echo "<br>";
	}

	mysqli_close($conn);

?>