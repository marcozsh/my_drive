<?php

error_reporting(E_ERROR | E_PARSE);
include 'conection.php';
include 'header.php';
?>

<link rel="stylesheet" href="css/upload_style.css">
<script type="text/javascript">
    
</script>
<section class="upload">
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="upload_file" method="post" enctype="multipart/form-data" style="margin-top: 130px;">
        <div class="upload-file-form">
            <div class="item-1">
                <input type="file" id="input_file" class="input-file" name="file_name" /><br /><br />
            </div>
            <div class="item-2">
                <input type="submit" class="boton" id="btnUpload" onclick="uploadItem()" name="btnUpload" role="button" value="Upload File!"/>
            </div>
            <div class="item-3" id="item-3" style="display:none;"> 
                <section class="section section-2">
                    <span class="loader loader-double"></span>
                    Loading...
                </section>
            </div>
        </div>
    </form>
<?php 
include 'upload_file.php';
?>
</section>
