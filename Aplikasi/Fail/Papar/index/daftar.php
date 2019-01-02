<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<title>Register Template Bootstrap</title>
<!-- TODC Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
<style>
.bd-placeholder-img {
	font-size: 1.125rem;
	text-anchor: middle;
}

@media (min-width: 768px)
{
	.bd-placeholder-img-lg {font-size: 3.5rem;}
}
</style>
<!-- Custom styles for this template -->
<style>
html,
body{ height: 100%; }
body{
	display: -ms-flexbox;
	display: flex;
	-ms-flex-align: center;
	align-items: center;
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
}
.form-signin
{
	width: 100%;
	max-width: 330px;
	padding: 15px;
	margin: auto;
}
.form-signin .checkbox { font-weight: 400; }
.form-signin .form-control
{
	position: relative;
	box-sizing: border-box;
	height: auto;
	padding: 10px;
	font-size: 16px;
}
.form-signin .form-control:focus{ z-index: 2; }
.form-signin input[type="text"]
{
	margin-bottom: -1px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
}
.form-signin input[type="password"]
{
	margin-bottom: 10px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
}
</style>
<style>
/*
class="btn btn-primary"
class="btn btn-secondary"
class="btn btn-success"
class="btn btn-danger"
class="btn btn-warning"
class="btn btn-info"
class="btn btn-light"
class="btn btn-dark"
class="btn btn-link"
*/
</style>
</head>
<body class="text-center">
<form class="form-signin" method="POST" action="masuklah">
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
<li class="nav-item">
	<a class="nav-link active" id="masuklah-tab" data-toggle="tab" href="#masuklah" role="tab" aria-controls="Masuklah" aria-selected="true">Masuklah</a>
</li>
<li class="nav-item">
	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
</li>
</ul>
<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="masuklah" role="tabpanel" aria-labelledby="home-tab">
	<!--*********************************************************************************************************************************************** -->
		<h1 class="h3 mb-3 font-weight-normal">Daftar Masuk</h1>
		<label for="inputText" class="sr-only">Email address / Handphone</label>
		<input type="text" name="username" id="inputText" class="form-control" placeholder="Email address / Handphone" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		<div class="checkbox mb-3"><label><input type="checkbox" value="remember-me">
			Ingat Daku Dalam Doamu
		</label></div>
		<input type="submit" value="Masuklah" class="btn btn-lg btn-primary btn-block">
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	<!--*********************************************************************************************************************************************** -->
	</div><!-- / class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" -->
	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	<!--*********************************************************************************************************************************************** -->
		<h1 class="h3 mb-3 font-weight-normal">Borang Biodata</h1>
		<?php 
		$senaraiInput = array('text|namaPengguna','password|kataLaluan','password|ulangKataLaluan',
			'text|Nama_Penuh','text|email','text|nohp');
		foreach($senaraiInput as $key):
		list($type,$name) = explode('|',$key); ?>
		<label for="inputText" class="sr-only"><?php echo $name ?></label>
		<input type="<?php echo $type ?>" name="biodata[<?php echo $name ?>]" id="inputText" class="form-control"
		placeholder="<?php echo $name ?>" required autofocus><?php
		endforeach; ?>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		<div class="checkbox mb-3"><label><input type="checkbox" value="remember-me">
			Ingat Daku Dalam Doamu
		</label></div>
		<input type="submit" value="Simpan" class="btn btn-lg btn-dark btn-block">
		<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	<!--*********************************************************************************************************************************************** -->
	</div><!-- / class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
</form>
<!--  letak skrip js di bawah ini
======================================================================================================= -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>