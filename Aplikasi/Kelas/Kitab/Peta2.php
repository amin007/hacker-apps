<?php
/* Ini class untuk
 * 1. capai fungsi $this->parseURL() dan masukkan dalam $url
 * 2. cari controller => kawal
 * 3. cari method => fungsi
 * 4. masukkan tatasusunan dalam params jika ada
 * 5. jalankan controller & method, serta kirim params jika ada
 */
namespace Aplikasi\Kitab;//echo __NAMESPACE__;
class Peta2
{
#==========================================================================================
#------------------------------------------------------------------------------------------
	protected $params = [];
#------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai,$jadual,$p='0')
	{
		echo '<pre>$' . $jadual . '=><br>';
		if($p == '0') print_r($senarai);
		if($p == '1') var_export($senarai);
		if($p == '2') var_dump($senarai);
		echo '</pre><hr>';//*/
		//$this->semakPembolehubah($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
#------------------------------------------------------------------------------------------
	public function parseURL()
	{
		//$this->semakPembolehubah($_GET,'_GET');
		if( isset($_GET['url']) )
		{
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
#------------------------------------------------------------------------------------------
	public function __construct()
	{
		# 1. capai fungsi $this->parseURL() dan masukkan dalam $url
		$url = $this->parseURL();
		list($url,$Url) = $this->semakURL($url);
		//$this->debugData($url,$Url);#semak untuk masa depan

		# 2. cari controller => kawal
		list($url,$kawal) = $this->semakKawal($url,$Url);
		//$this->semakPembolehubah($url,'url selepas class');

		# 3. cari method => fungsi
		list($url,$kawal) = $this->semakMethod($url,$kawal);
		//$this->semakPembolehubah($url,'url selepas method');

		# 4. masukkan tatasusunan dalam params jika ada
		if(!empty($url)) $this->params = array_values($url);

		# 5. jalankan controller & method, serta kirim params jika ada
		call_user_func_array([$this->kawal,$this->method], $this->params);
	}
#------------------------------------------------------------------------------------------
	private function debugData($url, $Url = null)
	{
		$this->semakPembolehubah($url,'x0');
		# semak $url
		if($url == '') echo '$url kosong daa<hr>';
		else echo '$url adalah tatasusunan<hr>';
		# semak $Url
		if($Url == null) echo '$Url kosong daa<hr>';
		else
		{
			$this->semakPembolehubah($Url,'Url adalah tatasusunan ');
		}
		# mungkin akan sambung nota lagi
	}
#------------------------------------------------------------------------------------------
	function semakURL($url)
	{
		# semak sama ada $url[0] kosong * jika ya : $url[0] == 'index';
		$url[0] = (empty($url[0])) ? 'index' : $url[0];
		$Url[0] = '\\Aplikasi\Kawal\\' . huruf('Besar', $url[0]);

		return array($url,$Url);
	}
#------------------------------------------------------------------------------------------
	function semakKawal($url,$Url)
	{
		$namaClass = $url[0];
		if( file_exists(KAWAL . '/' . $url[0] . '.php') )
		{
			$kawal = $Url[0];
			//echo 'lokasi fail:' . KAWAL . '/' . $url[0] . '.php<hr>';
			//echo 'nama class:' . $this->kawal . '<hr>';
			require_once KAWAL . '/' . $url[0] . '.php';
			unset($url[0]);
		}
		else $this->sesat();
		$this->kawal = new $kawal;# nilai default adalah index
		$this->kawal->jemaahTaskil02($namaClass);

		return array($url,null);
	}
#------------------------------------------------------------------------------------------
	function semakMethod($url,$kawal=null)
	{
		# jika $url[1] tak disetkan, bagi $method='index'
		$method = (isset($url[1])) ? $url[1] : 'index';

		if( isset($method) )
		{
			if( method_exists($this->kawal, $method) )
			{
				$this->method = $method;# nilai default adalah index
				//echo 'nama method:' . $method . '<hr>';
				unset($url[1]);
			}
			else $this->sesatMethod01();
		}
		else $this->sesatMethod02();

		return array($url,$kawal);
	}
#------------------------------------------------------------------------------------------
#==========================================================================================
#------------------------------------------------------------------------------------------
### masuk fungsi campak ke pangkal jalan jika sesat
	#--------------------------------------------------------------------------------------
	function sesat()
	{
		$kawal = new \Aplikasi\Kawal\Sesat();
		$kawal->index('Fail Kawal tidak wujud'); exit();
		//return false;
	}
	#--------------------------------------------------------------------------------------
	function sesatMethod01()
	{
		echo '<hr>Nama class :' . __METHOD__ . '<hr>'; exit();
	}
	#--------------------------------------------------------------------------------------
	function sesatMethod02()
	{
		echo '<hr>Nama class :' . __METHOD__ . '<hr>';
	}
	#--------------------------------------------------------------------------------------
###
#------------------------------------------------------------------------------------------
#==========================================================================================
}