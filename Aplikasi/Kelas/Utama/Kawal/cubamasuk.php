<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__;
class Cubamasuk extends \Aplikasi\Kitab\Kawal
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
		$this->pintuMasuk(); # Set pembolehubah utama

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
		echo '<pre>$jadual = ' . $jadual . '|<br>';
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
	function pintuMasuk()
	{
		echo '<hr>Nama class :' . __METHOD__ . '()<hr>';

		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_login');
		$email = isset($_POST['username']) ? $_POST['username'] : null;
		$passwordAsal = isset($_POST['password']) ? $_POST['password'] : null;
		$password = \Aplikasi\Kitab\RahsiaHash::rahsia('md5', $passwordAsal);
		# semak database
			$carian[] = array('fix'=>'or(x=)', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medan01, # cari dalam medan apa
				'apa' => $email); # benda yang dicari
			$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => $medan02, # cari dalam medan apa
				'apa' => $password); # benda yang dicari
		# mula cari $cariID dalam $myJadual
			$cariNama =
				$this->tanya->cariSemuaData("`$myTable`", $medan, $carian, null);
				//$this->tanya->cariSql("`$myTable`", $medan, $carian, null);
				//$kira = sizeof($cariNama);//*/
		# semak pembolehubah
		$this->semakPembolehubah($_POST,'_POST');
		//$this->semakPembolehubah($carian,'carian');
		$this->semakPembolehubah($cariNama,'cariNama');
		echo '<hr>$data->' . sizeof($cariNama) . '<hr>';//*/

	}
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#===========================================================================================
}