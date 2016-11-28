<?php
	mysql_connect("localhost","root","");
	mysql_select_db("user");

	$email = $_GET['r'];
	$mailquery = mysql_query("select email from tabeluser where email='$email'");
	
	if (mysql_num_rows($mailquery)==0)
	{
		echo "$email belum ada yang pakai";
	}
	else
	{
		echo "$email sudah ada yang pakai";
	}	
?>