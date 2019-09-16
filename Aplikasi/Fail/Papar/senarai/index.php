<?php
$mencari = URL . 'senarai/carian';
$butangHantar = 'cari produk';
?>
<div class="container">
<form method="POST" action="<?=$mencari?>" class="form-inline" autocomplete="off">
	<?php //echo $mencari . '<br>' . "\r" ?>
	<div class="input-group">
		<input type="text" name="cari" class="form-control rounded" autofocus
		placeholder="Contoh : produk"
		id="inputString" onkeyup="lookup(this.value);" onblur="fill();">
		<div class="input-group-append" id="button-addon4">
			<input type="submit" class="btn btn-outline-secondary rounded" value="<?=$butangHantar?>">
		</div>
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="suggestionsBox" id="suggestions" style="display: none; " >
		<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
	</div>
</form>
</div><!-- / class="container" -->
<br>
<?php
# untuk kod baru
echo '<pre class="bg-secondary text-white">$senarai='; print_r($this->senarai); echo '</pre>';
