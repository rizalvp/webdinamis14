<?php
	$input = $_GET['n'];
	if (is_numeric($input))
	{
		echo "Angka";
	}
	else
	{
		echo "Bukan Angka";
	}
?>