<!DOCTYPE html>
<html>
<head>
	<title>Latihan Ajax 1</title>
	<script type="text/javascript">
		function Ajax_AmbilHalaman(uri)
		{
			var conn;
			try 
			{
				conn = new XMLHttpRequest();
			}
			catch (e)
			{
				conn = null;
			}
			if (!conn)
			{
				var msxmlhttp = new Array ('Msxml2.XMLHTTP.5.0',
					'Msxml2.XMLHTTP.4.0',
					'Msxml2.XMLHTTP.3.0',
					'Msxml2.XMLHTTP',
					'Microsoft.XMLHTTP');
				for (var i=0; i<msxmlhttp.length; i++)
				{
					try
					{
						conn = new ActiveXObject (msxmlhttp[i]);
					}
					catch (e)
					{
						conn = null;
					}
				}
			}
			if (!conn)
			{
				alert("Browser Tidak Mendukung Interface Ajax (XMLHttpRequest)!");
				return false;
			}
			conn.open("GET", uri, false);
			conn.send('\n\n');
			return conn.responseText;
		}
	</script>
</head>
<body>
	<h1>Contoh Ajax Paling Sederhana</h1>
	<div style="border:4px solid #000000;padding:5px">
		<script type="text/javascript">
			document.write(Ajax_AmbilHalaman("http://localhost/webdinamis"));
		</script>
	</div>
</body>
</html>