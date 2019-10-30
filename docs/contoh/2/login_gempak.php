<!DOCTYPE html>
<html>
<head>
  <title>Login Gempak</title>
</head>
 
<style>
body {
  background: #9E9E9E;
}
td {
  padding: 1rem;
}
svg {
  position: absolute;
  padding: 1rem 1.2rem;
  width: 175px;
  height: 330px;
  display: none;
}
</style>
 
<body>
 
<div>
  <svg class="line line_1"><line x1="87" y1="10" x2="173" y2="10" style="stroke:rgb(255,0,0);" /></svg>
  <svg class="line line_2"><line x1="173" y1="10" x2="44" y2="114" style="stroke:rgb(255,0,0);" /></svg>
  <svg class="line line_3"><line x1="44" y1="117" x2="2" y2="62" style="stroke:rgb(255,0,0);" /></svg>
  <svg class="line line_4"><line x1="2" y1="62" x2="87" y2="10" style="stroke:rgb(255,0,0);" /></svg>
 
  <svg class="line line_5"><line x1="87" y1="218" x2="130" y2="270" style="stroke:rgb(255,0,0);" /></svg>
  <svg class="line line_6"><line x1="130" y1="270" x2="87" y2="322" style="stroke:rgb(255,0,0);" /></svg>
  <svg class="line line_7"><line x1="87" y1="322" x2="44" y2="270" style="stroke:rgb(255,0,0);" /></svg>
  <svg class="line line_8"><line x1="44" y1="270" x2="87" y2="218" style="stroke:rgb(255,0,0);" /></svg>
 
  <svg class="line line_9"><line x1="87" y1="10" x2="87" y2="218" style="stroke:rgb(255,0,0);" /></svg>
  <svg class="line line_10"><line x1="173" y1="10" x2="130" y2="270" style="stroke:rgb(255,0,0);" /></svg>
  <svg class="line line_11"><line x1="44" y1="117" x2="87" y2="322" style="stroke:rgb(255,0,0);" /></svg>
  <svg class="line line_12"><line x1="2" y1="62" x2="44" y2="270" style="stroke:rgb(255,0,0);" /></svg>
 
  <table>
    <?php
    $column = 10;
    $row = 10;
 
    for ($y=0; $y < $row; $y++) {
      echo '<tr>';
      for ($x=0; $x < $column; $x++) {
        echo '<td class="random '.$y.$x.'"></td>';
      }
      echo '</tr>';
    }
    ?>
  </table>
</div>
 
<hr>
<input type="password" value="" class="password" placeholder="Password" maxlength="8">
 
<!-- Import jquery library -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
 
<script>
$(document).ready(function()
{
	window.setInterval(function()
	{
		$(".random").each(function( index )
		{
			var random_number = Math.floor((Math.random() * 10) + 0);
			$(this).text(random_number);
		});
	}, 100);

	$('.line').hide();
	$(".password").keyup(function()
	{
		var char_length = $(this).val().length;
		var line_no = char_length - 1;

		$('.line_'+line_no).show("slow");

		if (char_length == 8)
		{
			$('.line_8').show("slow");
			$('.line_9').show("slow");
			$('.line_10').show("slow");
			$('.line_11').show("slow");
			$('.line_12').show("slow");
		}
		if (char_length < 8)
		{
			$('.line_12').hide("slow");
			$('.line_11').hide("slow");
			$('.line_10').hide("slow");
			$('.line_9').hide("slow");
			$('.line_8').hide("slow");

			var line_no = char_length + 1;
			$('.line_'+line_no).hide("slow");
		}
	});
});
</script>
 
</body>
</html>