<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Senarai_Tanya extends \Aplikasi\Kitab\Tanya
{
#=================================================================================================
##----------------------------------------------------------------------------------------------##
	public function __construct()
	{
		parent::__construct();
	}
##----------------------------------------------------------------------------------------------##
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '<pre>$jadual = ' . $jadual . '|<br>';
		print_r($senarai); echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
	}
##----------------------------------------------------------------------------------------------##
#=================================================================================================
#------------------------------------------------------------------------------------------------#
	function setParam01($cariApa)
	{
		//echo '<hr>Nama class :' . __METHOD__ . '()<hr>';
		//list($idUser,$namaPendek) = $this->tanyaDataSesi();
		$j = 'nama_pengguna';#jadual
		$m = 'no,namaPengguna,Nama_Penuh';#medan
		$c = $s = null;#carian dan susun
		# semak database
		$c[] = array('fix' => '%like%', # cari x= / %like% / xlike
			'atau' => 'WHERE', # WHERE / OR / AND
			'medan' => 'namaPengguna', # cari dalam medan apa
			'apa' => $cariApa); # benda yang dicari//*/
		# data carian
		$p[':namaPengguna'] = null;
		return array($j, $m, $c, $s, $p); # pulangkan nilai
	}
#------------------------------------------------------------------------------------------------#
#=================================================================================================
}