<?php
header('Content-Type: text/html; charset=UTF-8');
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>Verwaltungsbereich</title>
	<link rel="shortcut icon" href="../style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="verwaltungsbereich" />	
	<link rel="stylesheet" type="text/css" href="../style/index.css" media="screen" />
</head>
<body>
	<?php include_once 'template_header3.php';?><br><br><br><br><br>
	<?php include '../storescripts/db_connection.php';?>
	<hr color= "white" size=5px width=1000px align="center">
	<div id="slogan">VERWALTUNGSBEREICH</div>
	<hr color= "white" size=5px width=1000px align="center"><br><br>
	<div id="content" align="left">
		<h1>Willkommen Administrator, was m&ouml;chten Sie tun?</h1><br>
		<ul>
			<li><a class="white" href="inventory_list.php">Produktdaten steuern</a></li><br>
			<li><a class="white" href="user_list.php">Benutzerdaten steuern</a></li>
		</ul>
	</div><br><br>
			
	<?php include_once '../template_footer.php';?>		
</body>
</html>
