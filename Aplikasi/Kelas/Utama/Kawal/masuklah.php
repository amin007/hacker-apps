<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Masuklah extends \Aplikasi\Kitab\Kawal
{
#===========================================================================================
	function __construct()
	{
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		//\Aplikasi\Kitab\Kebenaran::kawalKeluar();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' . __FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------
	public function index()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		$this->semakID();
		//$this->semakSiapa();

		# Pergi papar kandungan
		/*$this->_folder = 'cari';
		$fail = array('1cari','index','b_ubah');
		//echo '<br>$fail = ' . $fail[0] . '<hr>';
		$this->paparKandungan($this->_folder, $fail[1], $noInclude=0);//*/
	}
##------------------------------------------------------------------------------------------
	public function paparHeader()
	{
		$lokasi = 'pergi/mana';
		//echo '<br>location: ' . URL . $lokasi;
		header('location:' . URL . $lokasi);//*/
	}
##------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$this->_folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '<pre>$' . $jadual . '=>';
		print_r($senarai); echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
	}
##------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION) . '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location:' . URL);
		//exit;
	}
#===========================================================================================
#-------------------------------------------------------------------------------------------
	function semakID()
	{# untuk paparkan jadual sahaja
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$cincang = $this->semakCincang();
		$this->semakData($_POST['password'],$cincang);
	}
#-------------------------------------------------------------------------------------------
	function semakCincang()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		# Set pembolehubah utama
		$this->semakPembolehubah($_POST,'POST');
		# semak hash yang boleh digunakan
		$passwordAsal = $_POST['password'];
		$pisau = \Aplikasi\Kitab\RahsiaHash::cariPisau($passwordAsal);
		//$this->semakPembolehubah($pisau,'pisau');

		return $pisau['password_hash'];
	}
#-------------------------------------------------------------------------------------------
	function semakData($a,$b)
	{
		$c[] = $b;
		$c[] = '$2y$10$22GYAdTOotuNmFiMhAgJk.Qzv0I819OyZ7qZtBDRvKIwGSLlojeju';
		$c[] = '$2y$10$BUmTzUItMY5jdLvDhjFrXOFFvgVmFoKp5Gn80yRHzlfobHdt.IJou';

		foreach($c as $key => $d):
			echo (password_verify($a, $d)) ?
			'<br>' . $key . ':Password is valid!'
			:'<br>' . $key . ':Invalid password.';
		endforeach;
		#//*/
	}
#-------------------------------------------------------------------------------------------
	function semakSiapa()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# Set pembolehubah utama
		$email = $_POST['username'];
		$passwordAsal = $_POST['password'];
		$password = \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $passwordAsal);
		list($myTable, $medan, $carian) = $this->tanya->dapatPencam($email,$password);
		# mula cari $cariID dalam $myJadual
			$cariNama =
				//$this->tanya->cariSemuaData($myTable, $medan, $carian, null);
				$this->tanya->cariSql($myTable, $medan, $carian, null);
				$kira = sizeof($cariNama);//*
		# semak pembolehubah
		$this->semakPembolehubah($_POST,'POST');
		$this->semakPembolehubah($password,'password');
		$this->semakPembolehubah($cariNama,'cariNama');
		echo '<hr>$data->' . sizeof($cariNama) . '<hr>';//*/

		//$this->kunciPintu($kira, $cariNama); # pilih pintu masuk
	}
#-------------------------------------------------------------------------------------------
#===========================================================================================
}
