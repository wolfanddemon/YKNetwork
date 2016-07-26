<?php
/**
 * This is just an example of how a file could be processed from the
 * upload script. It should be tailored to your own requirements.
 */
$this_path = str_replace('admin/upload.php', '', str_replace('\\', '/', __FILE__));
$whitelist = array('jpg', 'jpeg', 'png', 'gif');
$name      = null;
$error     = 'No file uploaded.';
if (isset($_FILES)) {
	if (isset($_FILES['file'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
		$name     = basename($_FILES['file']['name']);
		$error    = $_FILES['file']['error'];
		$img_url=$this_path.'images/';
		if ($error === UPLOAD_ERR_OK) {
			$extension = pathinfo($name, PATHINFO_EXTENSION);

			if (!in_array($extension, $whitelist)) {
				$error = 'Invalid file type uploaded.';
			} else {

				move_uploaded_file($tmp_name,$img_url.$name);
			}
		}
	}
}

echo json_encode(array(
	'name'  => $name,
	'error' => $error,
	'img_url'=>'images/'.$name
));
die();
