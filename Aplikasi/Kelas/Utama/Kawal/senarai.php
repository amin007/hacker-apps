<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Senarai extends \Aplikasi\Kitab\Kawal
{
#=================================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		//\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '<pre>$jadual = ' . $jadual . '|<br>';
		print_r($senarai); echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
	}
##------------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION) . '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location:' . URL);
		//exit;
	}
##------------------------------------------------------------------------------------------------
	public function paparHeader()
	{
		$lokasi = 'pergi/mana';
		//echo '<br>location: ' . URL . $lokasi;
		header('location:' . URL . $lokasi);//*/
	}
##------------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=431);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##------------------------------------------------------------------------------------------------
	public function index()
	{
		echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		//$this->paparJadual(); # Set pembolehubah utama

		# Pergi papar kandungan
		//$this->_folder = 'cari';
		//$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		//$this->paparKandungan($this->_folder, $fail[1], $noInclude=0);//*/
	}
##------------------------------------------------------------------------------------------------
#=================================================================================================
#-------------------------------------------------------------------------------------------------
	public function carian()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//$this->semakPembolehubah($_POST,'POST');//*/
		$cariApa = isset($_POST['cari']) ? $_POST['cari'] : null;
		# cari dalam database
		list($j, $m, $c, $s) = $this->tanya->setParam01($cariApa);
		$this->papar->senarai['produk'] = $this->tanya->cariIlham
		($j, $m, $c, $s);

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->senarai,'senarai');
		$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0);//*/
	}
#-------------------------------------------------------------------------------------------------
#=================================================================================================
}