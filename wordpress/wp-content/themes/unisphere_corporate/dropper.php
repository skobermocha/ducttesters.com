<div class="dropbox" style="height:18px;" align="left">

<?php
if ($_POST) {
    require 'DropboxUploader.php';


    try {
        // Rename uploaded file to reflect original name
        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK)
            throw new Exception('File was not uploaded from your computer.');

        $tmpDir = uniqid('/tmp/DropboxUploader-');
        if (!mkdir($tmpDir))
            throw new Exception('Cannot create temporary directory!');

        if ($_FILES['file']['name'] === "")
            throw new Exception('File name not supplied by the browser.');

        $tmpFile = $tmpDir.'/'.str_replace("/\0", '_', $_FILES['file']['name']);
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $tmpFile))
            throw new Exception('Cannot rename uploaded file!');

        // Enter your Dropbox account credentials here
		$uploader = new DropboxUploader('jeremiah@ducttesters.com', 'ducttesters');
        $uploader->upload($tmpFile, $_POST['dest']);

        
	$to ="jeremiah@ducttesters.com";
	$subject = "A file was uploaded from DuctTesters.com";
	$body = "The file uploaded was named: " . $_FILES['file'];
	$headers = "From: DuctTesters[donotreply@ducttesters.com]\n";
	mail($to,$subject,$body,$headers);

	echo '<span style="color: green;font-weight:bold;line-height:15px;">File was successfully uploaded!</span>';
    } catch(Exception $e) {
        echo '<span style="color: red;font-weight:bold;line-height:15px;">Error: ' . htmlspecialchars($e->getMessage()) . '</span>';
    }

    // Clean up
    if (isset($tmpFile) && file_exists($tmpFile))
        unlink($tmpFile);

    if (isset($tmpDir) && file_exists($tmpDir))
        rmdir($tmpDir);
}
?>
</div>
<div id="dropbox">

		<h5 style="text-align:left">Choose File</h5>
		<form method="POST" enctype="multipart/form-data">
		<input type="file" name="file" class="dbinput" />
		<input type="submit" value="Send Files!" class="dbbutton"/>
		<input style="display:none" type="text" name="dest" value="Website Upload" />
		</form>

</div>