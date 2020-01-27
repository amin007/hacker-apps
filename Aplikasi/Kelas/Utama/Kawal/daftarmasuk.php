<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Daftarmasuk extends \Aplikasi\Kitab\Kawal
{
#==================================================================================================
	function __construct()
	{
		//echo '<br>class Index extends Kawal';
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}
##-------------------------------------------------------------------------------------------------
	public function index()
	{
		# Set pemboleubah utama
		$this->papar->menuatas = 'tak';
		$this->papar->TajukBesar = 'Sila Login';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan($this->_folder, 'index');
	}
##-------------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude = 0)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##-------------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
##-------------------------------------------------------------------------------------------------
	public function debugData($senarai,$jadual,$p='0')
	{
		# untuk kesan masalah dalam tatasusunan biasa
		if(!isset($senarai)):
			echo '<pre>$' . $jadual . '=> tidak wujud</pre><hr>';
		elseif(empty($senarai)):
			echo '<pre>$' . $jadual . '=> tidak ada nilai</pre><hr>';
		else:
			$jadual .= is_array($senarai) ? ' =><br>' : ' = ';
			echo '<pre>$' . $jadual;
			if($p == '0') print_r($senarai);
			if($p == '1') var_export($senarai);
			echo '</pre><hr>';//*/
		endif;
		//$this->debugData($ujian,'ujian',0);
		#http://php.net/manual/en/function.var-export.php
		#http://php.net/manual/en/function.print-r.php
	}
##-------------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		$this->debugData($_SESSION,'_SESSION : sebelum ');
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#==================================================================================================
#--------------------------------------------------------------------------------------------------
	function register()
	{
		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index', 'register');
	}
#--------------------------------------------------------------------------------------------------
	function registerid()
	{
		# Set pemboleubah utama
		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_login');
		$senarai = array($myTable);
		# Bentuk tatasusunan
		$posmen = $this->tanya->semakPOST($myTable, $senarai, $_POST);
		$senaraiData = $this->tanya->ubahPosmen($posmen, $myTable);
		# sql insert
		//$this->tanya->tambahSqlBanyakNilai($myTable, $medan, $senaraiData);
		$this->tanya->tambahBanyakNilai($myTable, $medan, $senaraiData);
		//$this->log_sql($myTable, $medan, $senaraiData);
		# Semak data
			$this->debugData($_POST,'_POST');
			$this->debugData($posmen,'posmen');
			$this->debugData($senaraiData,'senaraiData');

		# Pergi papar kandungan
		//echo '<br>location: ' . URL . $this->_folder . '/rangkabaru/selesai';
		header('location:' . URL);//*/
	}
#--------------------------------------------------------------------------------------------------
#==================================================================================================
}