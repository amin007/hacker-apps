<?php
# https://www.airaghi.net/en/2018/04/27/php-file-encryption-decryption
include 'test1_process.php';
?>
<html>
<head>
<title>Encrypt/Decrypt file</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- ============================================================================================ -->
<div class="container">
<div class="row">
	<div class="col-12"><h1>Utility to encrypt/decrypt a file</h1></div>
</div>
<div class="row">
	<div class="col-12"><h2>https://www.airaghi.net/en/2018/04/27/php-file-encryption-decryption</h2></div>
</div>
<?php if ($error != ''):?>
<div class="row">
	<div class="col-12 alert alert-danger" role="alert"><?php
	echo "\n\t\t" . ($error) . "\n\t"; ?></div>
</div>
<?php endif; ?>
<!-- ============================================================================================ -->
<form class="form" enctype="multipart/form-data" method="post" id="form1" name="form1" auto-complete="off">
<div class="form-row">
	<div class="form-group">
		<label for="file">File</label>
		<input type="file" name="file" id="file" placeholder="Choose a file" required class="form-control-file"/>
	</div><!-- / class="form-group" -->
</div><!-- / class="form-row" -->
<div class="form-row">
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" placeholder="Insert password" required class="form-control" />
	</div><!-- / class="form-group" -->
</div><!-- / class="form-row" -->
<div class="form-row">
	<div class="form-group">
		<label for="action">Action</label>
			<select name="action" id="action" required class="form-control">
			<option value="">-- Choose --</option>
			<option value="c">Encrypt</option>
			<option value="d">Decrypt</option>
			</select>
	</div><!-- / class="form-group" -->
</div><!-- / class="form-row" -->
<div class="form-row">
	<button type="submit" class="btn btn-primary" onclick="setTimeout('document.form1.reset();',1000)">Execute</button>
	<button type="reset" class="btn btn-reset">Reset</button>
</div><!-- / class="form-row" -->
</form>
<!-- ============================================================================================ -->
</div><!-- / class="container" -->
<!-- ============================================================================================ -->
<!-- senarai javascript
============================================================================================ -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script -->
<!-- ============================================================================================ -->
</body>
</html>