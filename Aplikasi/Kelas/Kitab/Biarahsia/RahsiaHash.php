<?php
namespace Aplikasi\Kitab; //echo __NAMESPACE__;
class RahsiaHash
{
#=============================================================================================
	/**
	 * @param string $algo The algorithm (md5, sha1, whirlpool, etc)
	 * @param string $data The data to encode
	 * @param string $salt The salt (This should be the same throughout the system probably)
	 * @return string The hashed/salted data
	 */
	public static function create($algo, $data, $salt)
	{
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);

		return hash_final($context);
	}
#---------------------------------------------------------------------------------------------
	public static function rahsia($algo, $data)
	{
		$context = hash_init($algo);
		hash_update($context, $data);

		return hash_final($context);
	}
#---------------------------------------------------------------------------------------------
	public static function cincang($data, $numAlgo = 12, $arrOptions = array())
	{
		if (function_exists('password_hash')) 
		{# php >= 5.5
			$cincang = password_hash($data, $numAlgo, $arrOptions);
		}
		else
		{
			$garam = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);
			$garam = base64_encode($garam);
			$garam = str_replace('+', '.', $garam);
			$cincang = crypt($data, '$2y$18$' . $garam . '$');
		}

		return $cincang;
	}
#---------------------------------------------------------------------------------------------
	public static function sahkan($data, $cincang)
	{
		if (function_exists('password_verify'))
		{# php >= 5.5
			$pisau = password_verify($data, $cincang);
		}
		else
		{
			$lumat = crypt($data, $cincang);
			$pisau = $cincang == $lumat;
		}

		return $pisau;
	}
#---------------------------------------------------------------------------------------------
	public static function cariPisau($password)
	{
		$i = 5;
		#http://php.net/manual/en/function.str-shuffle.php
		$pisau['str_shuffle'] = str_shuffle($password);
		#http://php.net/manual/en/function.random-int.php
		$pisau['random_int'] = random_int($min = 0, $max = $i);
		#http://php.net/manual/en/function.random-bytes.php
		$pisau['random_bytes'] = random_bytes($i);
		#http://php.net/manual/en/function.openssl-random-pseudo-bytes.php
		$pisau['openssl_random_pseudo_bytes'] = openssl_random_pseudo_bytes($i, $password);
		#http://php.net/manual/en/function.crypt.php
		$pisau['crypt'] = crypt($password);
		#http://php.net/manual/en/function.uniqid.php
		$pisau['uniqid'] = uniqid();
		#http://php.net/manual/en/function.mt-rand.php
		$pisau['mt_rand'] = mt_rand();
		#http://php.net/manual/en/function.mt-srand.php
		$pisau['mt_srand'] = mt_srand();
		#http://php.net/manual/en/function.password-hash.php

		return $pisau;//*/
	}
#---------------------------------------------------------------------------------------------
#=============================================================================================
}