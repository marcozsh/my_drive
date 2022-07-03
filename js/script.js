const upload_frame = document.getElementById('upload-frame');
const close_frame = document.getElementById('btnClose');

const sleep = (time) => {
	return new Promise((resolve) => setTimeout(resolve, time));
};
const sweetAlert = (icon, message, reload = false) => {
	Swal.fire({
		icon: icon,
		title: 'Atention!',
		text: message,
	}).then(()=>{
		if(reload){
			window.location.reload();
		}
	});
	
};

const uploadItem = () => {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				//sweetAlert('ok',xhttp.responseText);
			};
		};
		xhttp.open('POST', 'command.php?cmd=upload', true);
		xhttp.send();
		document.getElementById('item-3').style.display = 'block';
};

const deleteItem = (id, file_path) => {
	//delete a item
	Swal.fire({
		title: 'Are you sure?',
		text: "You won't be able to revert this!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!',
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					sweetAlert('sucess', xhttp.responseText, true);
				}
			};
			xhttp.open(
				'POST',
				'command.php?cmd=delete&id=' + id + '&file_name=' + file_path,
				true,
			);
			xhttp.send();
		}
	});
};

const openUploadFrame = () => {
	//open upload frame
	upload_frame.style.display = 'block';
	close_frame.style.display = 'inline-block';
	upload_frame.innerHTML =
		'<iframe src="upload.php" title="Upload a file" width="800px" height="400px" style="border:0px;"></iframe>';
};

const closeFrame = () => {
	//close upload frame
	upload_frame.style.display = 'none';
	close_frame.style.display = 'none';
	document.location.reload(true);
};


