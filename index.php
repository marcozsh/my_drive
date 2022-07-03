<!DOCTYPE html>
<html lang="en">

<?php
include 'conection.php';
include 'header.php';
include 'buttons.php';
?>
	<body style="background-color: #181818;">
	<section class="title">
		<span>M</span>
		<span>y</span>
		&nbsp;
		<span>D</span>
		<span>r</span>
		<span>i</span>
		<span>v</span>
		<span>e</span>
		<div class="upload">
			<button class="boton" onclick="openUploadFrame()">upload</button>
  		<button class="boton" id="btnClose" onclick="closeFrame()" style="display:none">Close</button>
		</div>
	</section>
	<div class="upload-frame" id="upload-frame" style="display:none;"></div>

	<?php
	error_reporting(E_ERROR | E_PARSE);
	$sql = 'SELECT id, name, type, file_path FROM files;';
	$result = mysqli_query($conn, $sql);
	$rows_counter = 0;
	$files_rows = mysqli_num_rows($result);

	if ($files_rows >= 6) {
	?>
	<section class="content-container" style="grid-template-columns: repeat(6, 1fr);" >
<?php }
else{

	?> <section class="content-container" style="grid-template-columns: repeat(<?=$files_rows?>, 1fr);" >
<?php }
?>
	
<?php
  if ($files_rows > 0) {
  	while ($files = mysqli_fetch_object($result)) {
			$rows_counter+=1;
			switch ($files->type) {

				case 'image/jpeg':
					echo  '<div class="check-item" id="check-item" >
									<div class="item"><a href="'.$files->file_path.'" download class="item-'.$rows_counter.'">'.$jpg_image.' '.'<br><span>'.$files->name.'</span>'.'</a></div>
										<button id="btnDelete" name="btnDelete" class="delete" onclick="deleteItem('.$files->id.','."'".$files->name."'".')">delete</button></div>';
					break;

				case 'image/png':
					echo  '<div class="check-item" id="check-item">
									<div class="item"><a href="'.$files->file_path.'" download class="item-'.$rows_counter.'">'.$png_image.' '.'<br><span>'.$files->name.'</span>'.'</a></div>
										<button id="btnDelete"  name="btnDelete" class="delete" onclick="deleteItem('.$files->id.','."'".$files->name."'".')">delete</button></div>';
					break;

				case 'application/pdf':
					echo  '<div class="check-item" id="check-item">
									<div class="item"><a  href="'.$files->file_path.'" download class="item-'.$rows_counter.'">'.$pdf_image.' '.'<br><span>'.$files->name.'</span>'.'</a></div>
										<button id="btnDelete" name="btnDelete" class="delete" onclick="deleteItem('.$files->id.','."'".$files->name."'".')">delete</button></div>';
					break;
				case 'audio/wav':
					echo  '<div class="check-item" id="check-item">
									<div class="item"><a href="'.$files->file_path.'" download class="item-'.$rows_counter.'">'.$audio_image.' '.'<br><span>'.$files->name.'</span>'.'</a></div>
										<button id="btnDelete" name="btnDelete" class="delete" onclick="deleteItem('.$files->id.','."'".$files->name."'".')">delete</button></div>';
					break;

				case 'audio/mpeg':
					echo  '<div class="check-item" id="check-item" >
									<div class="item"><a href="'.$files->file_path.'" download class="item-'.$rows_counter.'">'.$audio_image.' '.'<br><span>'.$files->name.'</span>'.'</a></div>
										<button id="btnDelete" name="btnDelete" class="delete" onclick="deleteItem('.$files->id.','."'".$files->name."'".')">delete</button></div>';
					break;

				case 'video/mp4':
					echo  '<div class="check-item" id="check-item" >
									<div class="item"><a href="'.$files->file_path.'" download class="item-'.$rows_counter.'">'.$video_image.' '.'<br><span>'.$files->name.'</span>'.'</a></div>
										<button id="btnDelete" name="btnDelete" class="delete" onclick="deleteItem('.$files->id.','."'".$files->name."'".')">delete</button></div>';
					break;

				case 'application/x-zip-compressed':
					echo  '<div class="check-item" id="check-item" >
									<div class="item"><a href="'.$files->file_path.'" download class="item-'.$rows_counter.'">'.$zip_image.' '.'<br><span>'.$files->name.'</span>'.'</a></div>
										<button id="btnDelete" name="btnDelete" class="delete" onclick="deleteItem('.$files->id.','."'".$files->name."'".')">delete</button></div>';
					break;

				case 'application/octet-stream':
					echo  '<div class="check-item" id="check-item" >
									<div class="item"><a href="'.$files->file_path.'" download class="item-'.$rows_counter.'">'.$rar_image.' '.'<br><span>'.$files->name.'</span>'.'</a></div>
										<button id="btnDelete" name="btnDelete" class="delete" onclick="deleteItem('.$files->id.','."'".$files->name."'".')">delete</button></div>';
					break;

				default:
					echo  '<div class="check-item" id="check-item" >
									<div class="item"><a href="'.$files->file_path.'" download class="item-'.$rows_counter.'">'.$any_other_file_image.' '.'<br><span>'.$files->name.'</span>'.'</a></div>
									<button id="btnDelete" name="btnDelete" class="delete" onclick="deleteItem('.$files->id.','."'".$files->name."'".')">delete</button></div>';
					break;
			}
  	}
  }
	include 'command.php';
  mysqli_close($conn);
?>
	</section>
	<footer>
	</footer>
</body>

</html>
