<?php
# https://aesencryption.net/
# text to encrypt
$inputText = "My text to encrypt";
$inputKey = "My text to encrypt";
$blockSize = 256;
# check version of php
if (version_compare(phpversion(), '5', '>='))
{
	include 'Aes7.php';
	$aes = new Aes7($inputText, $inputKey, $blockSize);
}
else
{
	include 'Aes5.php';
	$aes = new Aes5($inputText, $inputKey, $blockSize);
}
# encrypt
$enc = $aes->encrypt();
$aes->setData($enc);
# decrypt
$dec=$aes->decrypt();
# debug
echo "https://aesencryption.net<br>";
echo "After encryption: $enc<br>";
echo "After decryption: $dec<br>";