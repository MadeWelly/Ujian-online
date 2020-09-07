<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('uploadfile/di_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />
<button type="submit" value="">Upload</button>
<!-- <input type="submit" value="upload" /> -->

</form>

</body>
</html