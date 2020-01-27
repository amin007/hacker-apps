<?php
# namaPenuh,namaPendek,email,kataLaluan,level
$loginMedan01 = 'namaPengguna as namaPendek,`kataRahsia`,`level`,Nama_Penuh as namaPenuh,`email`,`nohp`';
//$loginMedan01 = 'namaPengguna as namaPendek,`kataLaluan`,`kataRahsia`,`level`,Nama_Penuh as namaPenuh,`email`,`nohp`';
//$loginMedan01 = 'namaPengguna as namaPendek,`level`,Nama_Penuh as namaPenuh,`email`,`nohp`';
define('JADUAL_LOGIN', serialize(
	//array ('nama_pengguna','email|nohp','kataLaluan',$loginMedan01)
	array ('nama_pengguna','email','kataLaluan',$loginMedan01)
	));
