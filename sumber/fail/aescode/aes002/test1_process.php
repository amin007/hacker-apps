<?php
# https://www.airaghi.net/en/2018/04/27/php-file-encryption-decryption
#--------------------------------------------------------------------------------------------------
function setPencam()
{
	$pass = isset($_POST['password']) && $_POST['password']!='' ? $_POST['password'] : null;
	$action = isset($_POST['action'])
		&& in_array($_POST['action'],array('c','d')) ? $_POST['action'] : null;
	$file = isset($_FILES) && isset($_FILES['file'])
		&& $_FILES['file']['error'] == UPLOAD_ERR_OK ? $_FILES['file'] : null;

	return array($pass,$action,$file);
}
#--------------------------------------------------------------------------------------------------
function processFile($error,$pass,$action,$file)
{
	if ($error === '')
	{
	#----------------------------------------------------------------------------------------------
		$contenuto = '';
		$nomefile  = '';# tak pasti pencam ini untuk apa daa

		$contenuto = file_get_contents($file['tmp_name']);
		$filename  = $file['name'];
		//$ext = '.crypto';
		$ext = '.crypto';
	#----------------------------------------------------------------------------------------------
		list($contenuto,$filename) = actionFile($action,$contenuto,$filename,$pass,$ext);
	#----------------------------------------------------------------------------------------------
		if ($contenuto === false)
		{
			$error .= 'Errors occurred while encrypting/decrypting the file';
		}
	#----------------------------------------------------------------------------------------------
		downloadFile($error,$contenuto,$filename);
		//database($contenuto,$filename);
	#----------------------------------------------------------------------------------------------
	}
}
#--------------------------------------------------------------------------------------------------
function actionFile($action,$contenuto,$filename,$pass,$ext='.crypto')
{
	switch($action)
	{
		case 'c':
			$contenuto = openssl_encrypt($contenuto, ALGORITHM, $pass, 0, IV);
			$filename  = $filename . $ext;
			break;
		case 'd':
			$contenuto = openssl_decrypt($contenuto, ALGORITHM, $pass, 0, IV);
			$filename  = preg_replace('#\.crypto$#','',$filename);
			//$filename  = preg_replace("#\$ext".'$#','',$filename);
			break;
	}
	#
	return array($contenuto,$filename);
}
#--------------------------------------------------------------------------------------------------
function downloadFile($error,$contenuto,$filename)
{
	if ($error === '')
	{
		header("Pragma: public");
		header("Pragma: no-cache");
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Expires: 0");
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename=\"" . $filename . "\";");
		$size = strlen($contenuto);
		header("Content-Length: " . $size);
		echo $contenuto;
		die;
	}
	#
}
#--------------------------------------------------------------------------------------------------
//$ALGORITHM = 'AES-128-CBC';
//$IV    = '12dasdq3g5b2434b';
define('ALGORITHM', 'AES-128-CBC');
define('IV', 'abc123def456ghi7');// 16 digit sahaja
$error = '';

if (isset($_POST) && isset($_POST['action']))
{
	list($pass,$action,$file) = setPencam();
	if ($pass === null) { $error .= 'Invalid Password<br>'; }
	if ($action === null) { $error .= 'Invalid Action<br>';  }
	if ($file === null) { $error .= 'Errors occurred while elaborating the file<br>'; }
	processFile($error,$pass,$action,$file);
}
#--------------------------------------------------------------------------------------------------