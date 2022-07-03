<?php
$script = '<script src="js/script.js"></script>';
if (filter_input(INPUT_POST, 'btnUpload')) {
	$file_name = $_FILES['file_name']['name'];
	$file_type = $_FILES['file_name']['type'];
	$file_temp = $_FILES['file_name']['tmp_name'];
	$file_path = 'files/' . $file_name;

	if ($file_name == '') {
		echo "$script <script> sweetAlert('warning','You must select a file!')</script>";
	} else {
		$binary_file = file_get_contents($file_temp);
		file_put_contents($file_path, $binary_file);

		$sql = 'INSERT INTO files (name, type, file_path) VALUES (?, ?, ?)';

		$stmt = mysqli_prepare($conn, $sql);

		$stmt->bind_param('sss', $file_name, $file_type, $file_path);

		if (mysqli_stmt_execute($stmt)) {
			echo "$script <script> sweetAlert('sucess','File saved!') </script>";
		} else {
			echo "$script <script> sweetAlert('error','Upload failed')</script>";
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
}
?>
