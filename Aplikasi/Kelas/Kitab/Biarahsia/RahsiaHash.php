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
	public static function cincang($data)
	{
		#https://www.php.net/manual/en/function.password-hash.php
		if (function_exists('password_hash'))
		{# php >= 5.5
			//$numAlgo = PASSWORD_DEFAULT;
			//$numAlgo = PASSWORD_ARGON2I; php7.2.0
			//$numAlgo = PASSWORD_ARGON2ID; php7.3.0
			$numAlgo = PASSWORD_BCRYPT;
			$options = array('cost' => 12);
			$cincang = password_hash($data, $numAlgo, $options);
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
		$min = 0; $i = 5; $garam = 'garamJenama2Apa?';
		#http://php.net/manual/en/function.str-shuffle.php
		$pisau['str_shuffle'] = str_shuffle($password);
		#http://php.net/manual/en/function.random-int.php
		$pisau['random_int'] = random_int($min,$max=$i);
		#http://php.net/manual/en/function.random-bytes.php
		$pisau['random_bytes'] = random_bytes($i);
		#http://php.net/manual/en/function.openssl-random-pseudo-bytes.php
		$pisau['openssl_random_pseudo_bytes'] = openssl_random_pseudo_bytes($i,$password);
		#http://php.net/manual/en/function.crypt.php
		$pisau['crypt'] = crypt($password,$garam);
		#http://php.net/manual/en/function.uniqid.php
		$pisau['uniqid'] = uniqid();
		#http://php.net/manual/en/function.mt-rand.php
		$pisau['mt_rand'] = mt_rand();
		#http://php.net/manual/en/function.mt-srand.php
		$pisau['mt_srand'] = mt_srand();
		#http://php.net/manual/en/function.sodium-crypto-pwhash-str.php
		//$pisau['sodium_crypto_pwhash_str'] = sodium_crypto_pwhash_str($password,$min,$i);
		#http://php.net/manual/en/function.password-hash.php
		$pisau['password_hash'] = password_hash($password,PASSWORD_DEFAULT);
		$options = ['cost' => 12];
		$pisau['password_hash_bcrypt'] = password_hash($password,PASSWORD_BCRYPT,$options);
		#php 7.2.0 : Support for Argon2i passwords using PASSWORD_ARGON2I was added.
		//$pisau['password_hash_argon21'] = password_hash($password,PASSWORD_ARGON2I);
		#php 7.3.0 : Support for Argon2id passwords using PASSWORD_ARGON2ID was added.
		//$pisau['password_hash_argon21'] = password_hash($password,PASSWORD_ARGON2ID);
		#define
		//$pisau['PASSWORD_DEFAULT'] = PASSWORD_DEFAULT;
		//$pisau['PASSWORD_BCRYPT'] = PASSWORD_BCRYPT;
		//$pisau['CRYPT_DEV_URANDOM'] = CRYPT_DEV_URANDOM;
		#http://php.net/manual/en/refs.crypto.php
		#//*/
		return $pisau;
	}
#---------------------------------------------------------------------------------------------
#=============================================================================================
}