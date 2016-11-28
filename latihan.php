<!DOCTYPE html>
<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("user");

	$query = mysql_query("select id_prov, nama_provinsi from provinsi");
?>
<html>
<head>
	<title>Latihan Ajax Amsterdam</title>
	<script type="text/javascript">
		var drz, kata, x;
		function cekid()
		{
			kata = document.getElementById("userid").value;
			if (kata.length>2)
			{
				document.getElementById("teks").innerHTML = "checking...";
				drz = buatajax();
				var url = "cekid.php"
				url = url + "?q=" + kata;
				url = url + "&sid=" + Math.random();
				drz.onreadystatechange = stateChanged_id;
				drz.open("GET", url, true);
				drz.send(null);
			}
			else
			{
				fokus1();
			}
		}
		function cekemail()
		{
			email = document.getElementById("email").value;
			if (email.length>2)
			{
				document.getElementById("teksemail").innerHTML = "checking...";
				drz = buatajax();
				var url = "cekemail.php"
				url = url + "?r=" + email;
				url = url + "&sid=" + Math.random();
				drz.onreadystatechange = stateChanged_mail;
				drz.open("GET", url, true);
				drz.send(null);
			}
			else
			{
				fokus2();
			}
		}
		function cekumur()
		{
			umur = document.getElementById("umur").value;
			if(umur.length>0)
			{ 
       			document.getElementById("teksumur").innerHTML = "checking..."; 
       			drz = buatajax(); 
        		var url="ceknum.php"; 
        		url=url+"?n="+umur; 
        		url=url+"&sid="+Math.random(); 
        		drz.onreadystatechange=stateChanged_umur; 
        		drz.open("GET",url,true); 
        		drz.send(null); 
    		}
    		else
    		{ 
        		fokus3(); 
         	} 
		}
		function cek_prov()
		{
			provinsi = document.getElementById("prov").value;
			if (provinsi.length>0)
			{
				document.getElementById("teksprovinsii").innerHTML = "checking...";
				drz = buatajax();
				var url = "cekprop.php"
				url = url + "?v=" + provinsi;
				url = url + "&sid=" + Math.random();
				drz.onreadystatechange = stateChanged_kab;
				drz.open("GET", url, true);
				drz.send(null);
			}
			else
			{
				fokus4();
			}
		}
		function buatajax()
		{
			if (window.XMLHttpRequest)
			{
				return new XMLHttpRequest();
			}
			if (window.ActiveXObject)
			{
				return new ActiveXObject("Microsoft.XMLHTTP");
			}
			return null;
		}
		function stateChanged_id()
		{
			var data;
			if (drz.readyState==4)
			{
				data = drz.responseText;
				document.getElementById("teks").innerHTML = data;
			}
		}
		function stateChanged_umur()
		{
			var data;
			if (drz.readyState==4)
			{
				data = drz.responseText;
				document.getElementById("teksumur").innerHTML = data;
			}
		}
		function stateChanged_mail()
		{
			var data;
			if (drz.readyState==4)
			{
				data = drz.responseText;
				document.getElementById("teksemail").innerHTML = data;
			}
		}
		function stateChanged_kab()
		{
			var data;
			if (drz.readyState==4)
			{
				data = drz.responseText;
				document.getElementById("teksprovinsii").innerHTML = data;
			}
		}
		function fokus()
		{
			document.getElementById("userid").focus();
		}
		function fokus2()
		{
			document.getElementById("email").focus();
		}
		function fokus3()
		{
			document.getElementById("umur").focus();
		}
		function fokus4()
		{
			document.getElementById("prov").focus();
		}
	</script>
</head>
<body style="font-family:verdana; font-size:9pt">
	<form>
		Username:
		<input type="text" name="userid" id=userid onblur=cekid()>
		<span id=teks style="color:red; font-size:8pt"></span> <br>
		Email: 
		<input type="text" name="email" id=email onblur=cekemail()>
		<span id=teksemail style="color:blue; font-size:8pt"></span><br>
		Umur:
		<input type="text" name="umur" id=umur onkeypress=cekumur()>
		<span id=teksumur style="color:blue; font-size:8pt"></span><br>
		Propinsi:
		<?php
			if (mysql_num_rows($query)>0)
			{
				echo "<select name = 'id_prov' id='prov' onchange=cek_prov()>";
				echo "<option value='0'>Pilih<br>";
				while ($row = mysql_fetch_array($query))
				{
					echo "<option value = '$row[0]'>$row[1]<br>";
				} 
				echo "</select>";
			}
		?>
		<span id = teksprovinsii style="color:red; font-size:8pt"></span> <br>
	</form>
</body>
</html>