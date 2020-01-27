<?php
namespace Aplikasi\Kawal; //echo __NAMESPACE__; 
class Login extends \Aplikasi\Kitab\Kawal
{
#=================================================================================================
	function __construct()
	{
		//echo '<br>class Index extends Kawal';
		parent::__construct();
		//\Aplikasi\Kitab\Kebenaran::kawalMasuk();
		$this->_folder = huruf('kecil', namaClass($this));
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<hr>Nama function :' .__FUNCTION__ . '<hr>';
	}
##------------------------------------------------------------------------------------------------
	public function index()
	{
		# Set pemboleubah utama
		$this->papar->menuatas = 'tak';
		$this->papar->TajukBesar = 'Sila Login';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan($this->_folder, 'index');
	}
##------------------------------------------------------------------------------------------------
	public function paparKandungan($folder, $fail, $noInclude = 0)
	{	# Pergi papar kandungan
		$jenis = $this->papar->pilihTemplate($template=0);
		$this->papar->bacaTemplate(
		//$this->papar->paparTemplate(
			$folder . '/' . $fail, $jenis, $noInclude); # $noInclude=0
			//'mobile/mobile',$jenis,0); # $noInclude=0
		//*/
	}
##------------------------------------------------------------------------------------------------
	public function semakPembolehubah($senarai)
	{
		echo '<pre>$senarai:<br>';
		print_r($senarai);
		echo '</pre>|';//*/
	}
##------------------------------------------------------------------------------------------------
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
##------------------------------------------------------------------------------------------------
	function logout()
	{
		//echo '<pre>sebelum:'; print_r($_SESSION); echo '</pre>';
		\Aplikasi\Kitab\Sesi::destroy();
		header('location: ' . URL);
		//exit;
	}
#=================================================================================================
#-------------------------------------------------------------------------------------------------
	function register()
	{
		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index', 'register');
	}
#-------------------------------------------------------------------------------------------------
	function registerid()
	{
		# debug $_POST
		//echo '<pre>Test $_POST->'; print_r($_POST); echo '</pre>';

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
			//echo '<pre>$_POST='; print_r($_POST); echo '</pre>';
			//echo '<pre>$posmen='; print_r($posmen); echo '</pre>';
			//echo '<pre>$senaraiData='; print_r($senaraiData); echo '</pre>';

		# Pergi papar kandungan
		//echo '<br>location: ' . URL . $this->_folder . '/rangkabaru/selesai';
		header('location:' . URL);//*/
	}
#-------------------------------------------------------------------------------------------------
	function salah()
	{
		# debug
		//$this->tanya->dapatid($_POST['password']);
		$this->papar->mesej = 'Ada masalah pada user dan password';

		# Set pemboleubah utama
		$this->papar->sesat = 'Enjin Carian - Sesat';
		$this->papar->isi = '';

		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index', 'salah', $noInclude=1);
	}
#-------------------------------------------------------------------------------------------------
	function semakid()
	{
		# debug $_POST
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		//echo '<pre>Test $_POST->'; print_r($_POST); echo '</pre>';

		# semak data $this->tanya->ujiID(); 
		//$this->tanya->semakid();
		list($jadual, $medan, $carian, $p) = $this->loginSemak();
		$this->loginid($jadual, $medan, $carian, $p);
		//*/
	}
#-------------------------------------------------------------------------------------------------
	function login()
	{
		# Pergi papar kandungan
		//$this->semakPembolehubah($this->papar->mesej); # Semak data dulu
		$this->paparKandungan('index', 'login2', $noInclude=1);
	}
#-------------------------------------------------------------------------------------------------
	function loginSemak()
	{
		# semak data $_POST
		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_login');
		$email = bersih($_POST['username']);
		$passwordAsal = bersih($_POST['password']);
		# bentuk tatasusunan baru
		$carian[] = array('fix'=>'or(x=)', # cari x= atau %like%
			'atau'=>'WHERE', # WHERE / OR / AND
			'medan' => $medan01, # cari dalam medan apa
			'apa' => ":$medan01"); # benda yang dicari
		$p = array(":$medan01"=>$email);
		#
		return array("`$myTable`", $medan, $carian, $p);
	}
#-------------------------------------------------------------------------------------------------
	function loginid($myTable, $medan, $carian, $p)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		# mula cari $cariID dalam $myJadual
		$cariNama =
			$this->tanya->cariSemuaData($myTable, $medan, $carian, null, $p);
			//$this->tanya->cariSql($myTable, $medan, $carian, null, $p);
		$kira = sizeof($cariNama);//*/
		# semak pembolehubah
		//echo '<pre>Test $_POST->'; print_r($_POST); echo '</pre>';
		//echo '<pre>password->'; print_r($password); echo '</pre>';
		/*echo '<pre>$cariNama::'; print_r($cariNama); echo '</pre>';
		echo '<hr>$data->' . sizeof($cariNama) . '<hr>';//*/

		$this->kunciPintu($kira, $cariNama); # pilih pintu masuk
	}
#-------------------------------------------------------------------------------------------------
	function kunciPintu($kira, $data)
	{
		if ($kira == 1) 
		{	# login berjaya
			\Aplikasi\Kitab\Sesi::init(); # setkan $_SESSION utk 
			# namaPenuh,namaPendek,email,kataLaluan,level 
			\Aplikasi\Kitab\Sesi::set('be18_namaPendek', $data[0]['namaPendek']);
			\Aplikasi\Kitab\Sesi::set('be18_namaPenuh', $data[0]['namaPenuh']);
			\Aplikasi\Kitab\Sesi::set('be18_email', $data[0]['email']);
			\Aplikasi\Kitab\Sesi::set('be18_levelPengguna', $data[0]['level']);
			\Aplikasi\Kitab\Sesi::set('be18_loggedIn', true);
			//echo '<hr>Berjaya';
			$this->levelPengguna($kira, $data, $data[0]['level']);
		} 
		else # login gagal
		{	echo '<hr>Tidak Berjaya';
			header('location:' . URL . 'login/salah');
		}//*/
	}
#-------------------------------------------------------------------------------------------------
	function levelPengguna($kira, $data, $level)
	{
		//header('location:' . URL . 'ruangtamu');
		if ($level == 'kawal')
			header('location:' . URL . 'ruangtamu');
		elseif ($level == 'fe')
			header('location:' . URL . 'ruangtamu');
		elseif ($level == 'pegawai')
			header('location:' . URL . 'ruangtamu');
		elseif($level == 'pegawai2')
			header('location:' . URL . 'homeadmin');
		else
			header('location:' . URL . ''); //*/
	}
#-------------------------------------------------------------------------------------------------
#=================================================================================================
#-------------------------------------------------------------------------------------------------
	public function carian()
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		$this->semakPembolehubah($_POST,'POST');//*/
		//$this->debugKandunganPaparan();//*/
	}
#-------------------------------------------------------------------------------------------------
	public function caridaa($cariApa = null)
	{
		# Set pemboleubah utama
		echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		$this->papar->TajukBesar = 'Cari Pengguna Sistem';
		list($jadual, $medan, $carian, $susun) = $this->tanya->setParam01($cariApa);
		$this->papar->senarai = $this->tanya->//cariSql
			cariIlham
			($jadual, $medan, $carian, $susun);//*/

		# Pergi papar kandungan
		$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->paparKandungan($this->_folder, 'caridaa');
	}
#-------------------------------------------------------------------------------------------------
	public function cari02($cariApa = null)
	{
		# Set pemboleubah utama
		echo '<hr>Nama class :' . __METHOD__ . '<hr>';
		$this->papar->TajukBesar = 'Cari Pengguna Sistem';
		$p[':namaPengguna'] = $cariApa;
		list($jadual, $medan, $carian, $susun) = $this->tanya->setParam01($cariApa);
		$this->papar->senarai = $this->tanya->//cariSql
			cariIlham02
			($jadual, $medan, $carian, $susun, $p);//*/

		# Pergi papar kandungan
		$this->semakPembolehubah($this->papar->senarai); # Semak data dulu
		//$this->paparKandungan($this->_folder, 'caridaa');
	}
#-------------------------------------------------------------------------------------------------
#=================================================================================================
}