<?php
	$id = $_GET['id'];

	if(isset($id)) {
		include 'dbconn.php';

		//$sql = "DELETE FROM item WHERE item_id = $id";
		$sql = "UPDATE item SET view_status = 0 WHERE item_id = $id";
		$result = mysqli_query($conn, $sql);

		if($result)
			echo "item has been deleted";
		else
			echo "error while deleting";

		mysqli_close($conn);
	}

?>

<a href = 'view_item.php'> click here to go back</a>