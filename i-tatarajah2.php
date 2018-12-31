<?php
# namaPenuh,namaPendek,email,kataLaluan,level
//$loginMedan01 = 'namaPengguna as namaPendek,`kataLaluan`,`level`,Nama_Penuh as namaPenuh,`email`,`nohp`';
$loginMedan01 = 'namaPengguna as namaPendek,`level`,Nama_Penuh as namaPenuh,`email`,`nohp`';
define('JADUAL_LOGIN', serialize(
	array ('nama_pengguna','email|nohp','kataLaluan',$loginMedan01)
	));
