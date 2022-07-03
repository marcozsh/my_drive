<?php

error_reporting(E_ERROR | E_PARSE);
include 'conection.php';
include 'upload_file.php';

$file_id = $_REQUEST['id'];
$file_name = $_REQUEST['file_name'];
$cmd = $_REQUEST['cmd'];
switch ($cmd) {
	case 'upload':
		$sql = 'SELECT * FROM files ORDER BY id DESC LIMIT 1;'; 

		$stmt = mysqli_prepare($conn, $sql);

		if (mysqli_stmt_execute($stmt)) {
			echo '';
		} else {
			echo 'delete failed';
		}

		mysqli_stmt_close($stmt);
		mysqli_close($conn);
		break;

	case 'delete':
		$sql = 'DELETE FROM files WHERE id = ' . $file_id;

		$stmt = mysqli_prepare($conn, $sql);

		if (mysqli_stmt_execute($stmt)) {
			unlink('files/' . $file_name);
			echo 'file deleted';
		} else {
			echo 'delete failed';
		}

		mysqli_stmt_close($stmt);
		mysqli_close($conn);

		break;
}

?>
