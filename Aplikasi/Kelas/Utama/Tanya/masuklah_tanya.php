<?php
namespace Aplikasi\Tanya; //echo __NAMESPACE__;
class Masuklah_Tanya extends \Aplikasi\Kitab\Tanya
{
#===========================================================================================
#------------------------------------------------------------------------------------------#
	public function __construct()
	{
		parent::__construct();
	}
#------------------------------------------------------------------------------------------#
	public function semakPembolehubah($senarai,$jadual)
	{
		echo '<pre>$' . $jadual . '=>';
		print_r($senarai); echo '</pre>';//*/
		//$this->semakPembolehubah($ujian,'ujian');
	}
#------------------------------------------------------------------------------------------#
	function dapatPencam($email,$password)
	{
		# semak data $_POST
		list($myTable, $medan01, $medan02, $medan) = dpt_senarai('jadual_login');
		# semak database
			$carian[] = array('fix'=>'or(x=)', # cari x= atau %like%
				'atau'=>'WHERE', # WHERE / OR / AND
				'medan' => $medan01, # cari dalam medan apa
				'apa' => $email); # benda yang dicari
			/*$carian[] = array('fix'=>'like', # cari x= atau %like%
				'atau'=>'AND', # WHERE / OR / AND
				'medan' => $medan02, # cari dalam medan apa
				'apa' => $password); # benda yang dicari//*/

		return array("`$myTable`", $medan, $carian);
	}
#------------------------------------------------------------------------------------------#
#===========================================================================================
}