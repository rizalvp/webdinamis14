<?php
	$link = mysql_connect("localhost","root","");
	mysql_select_db("user");
	
	$prov = $_GET['v'];

	$query = mysql_query("SELECT kota_kab.id_kab, kota_kab.nama_kab 
		from kota_kab, provinsi 
		where provinsi.id_prov= provinsi.id_prov and provinsi.id_prov = $prov");

	if (mysql_num_rows($query)>0)
	{
		echo "<select>";
		while ($row = mysql_fetch_array($query))
		{
			echo "<option value = '$row[0]'>$row[1]<br>";
		}
		echo "</select>";
	}
	else
	{
		echo "Provinsi $prov tidak ada.";
	}
?>