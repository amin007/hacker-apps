<?php
$mencari = URL . 'senarai/cari01';
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
//echo '<pre class="bg-secondary text-white">$senarai='; print_r($this->senarai); echo '</pre>';

echo "\n" . '<!-- h1> Ini Template Biasa </h1 -->';
foreach ($this->senarai as $myTable => $row)
{
	if ( count($row)==0 ) echo '';
	else
	{
		$tajukjadual = '<span class="badge badge-success">' . $myTable . '</span>'
		. "\r" . '<span class="badge">' . count($row) . '</span>';
		//paparTajuk($tajukjadual,$row);
		pilihJadual($tajukjadual,$row);
	}# if ( count($row)==0 )
}

function paparTajuk($tajukjadual, $row)
{
#-------------------------------------------------------------------------------------------------
	echo "\n" . '<h3>' . $tajukjadual . '</h3>';
#-------------------------------------------------------------------------------------------------
}

function pilihJadual($tajukjadual, $row)
{
#-------------------------------------------------------------------------------------------------
	echo "\n" . '<!-- Jadual $myTable ########################################### -->';
	echo "\n" . '<table border="1" class="excel" id="example">';
	echo "\n" . '<h3>' . $tajukjadual . '</h3>';
	$printed_headers = false; # mula bina jadual
	#-----------------------------------------------------------------
	for ($kira=0; $kira < count($row); $kira++)
	{
		if ( !$printed_headers ) # papar tajuk medan sekali sahaja:
		{
			echo '<thead><tr><th>#</th>' . "\n";
			foreach ( array_keys($row[$kira]) as $tajuk )
			{
				echo '<th>' . $tajuk . '</th>' . "\n";
			}
			echo '</tr></thead>' . "\n";
			$printed_headers = true;
		}
	# papar data $row ------------------------------------------------
		echo '<tr><td align="center">' . ($kira+1) . '</td>';
		foreach ( $row[$kira] as $key=>$data )
		{
			echo '<td>' . $data . '</td>';
		}
		echo '</tr>' . "\n";
	}#-----------------------------------------------------------------
	echo '</table>' . "\n"
	. '<!-- Jadual $myTable ########################################### -->';
#-------------------------------------------------------------------------------------------------
}