<?php echo "\n"; ?><!-- Footer
================================================== -->
<nav class="navbar navbar-light">
	<span class="label label-info bg-secondary text-white">&copy; Hak Cipta Terperihara 2019. Theme <?php
$theme = ( !isset($pilih) ) ? 'Asal Bootstrap Twitter' : $pilih;
echo $theme = (isset($theme)) ? $theme : null; ?> </span>
	<span class="label label-info bg-secondary text-white">PHP version: <?php print phpversion(); ?></span>
</nav>
<!-- footer class="footer">
	<div class="container">
		<span class="label label-info">
		&copy; Hak Cipta Terperihara 2019. Theme <?php
$theme = ( !isset($pilih) ) ? 'Asal Bootstrap Twitter' : $pilih;
echo $theme = (isset($theme)) ? $theme : null; ?><br>
		PHP version: <?php print phpversion(); ?><br>
		</span>
	</div>
</footer -->
<?php echo "\n"; require 'jquery.php'; ?>
</body>
</html>