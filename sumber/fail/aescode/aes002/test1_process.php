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
function jenisAlgorithmDaa()
{
	$ciphers             = openssl_get_cipher_methods();
	$ciphers_and_aliases = openssl_get_cipher_methods(true);
	$cipher_aliases      = array_diff($ciphers_and_aliases, $ciphers);

	//ECB mode should be avoided
	$ciphers = array_filter( $ciphers, function($n) { return stripos($n,"ecb")===FALSE; } );

	//At least as early as Aug 2016, Openssl declared the following weak: RC2, RC4, DES, 3DES, MD5 based
	$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"des")===FALSE; } );
	$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"rc2")===FALSE; } );
	$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"rc4")===FALSE; } );
	$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"md5")===FALSE; } );
	$cipher_aliases = array_filter($cipher_aliases,function($c) { return stripos($c,"des")===FALSE; } );
	$cipher_aliases = array_filter($cipher_aliases,function($c) { return stripos($c,"rc2")===FALSE; } );

	//print_r($ciphers);
	//print_r($cipher_aliases);
	#
	return array($ciphers,$cipher_aliases);
}
#--------------------------------------------------------------------------------------------------
	function debugValue($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		echo '</pre><hr>';//*/
		//debugValue($ujian,'ujian',0);
		//$this->debugValue($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
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