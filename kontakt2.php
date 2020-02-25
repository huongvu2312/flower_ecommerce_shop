<?php 
	header('Content-Type: text/html; charset=UTF-8');  
?>

<?php
//Error Reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
include "storescripts/db_connection.php";
?>

<?php 
// Parse the form data and add user item to the system
if (isset($_POST['kontakt_name'])) {
	
	$kontakt_name = mysqli_real_escape_string($conn, $_POST['kontakt_name']);
	$kontakt_mail = mysqli_real_escape_string($conn, $_POST['kontakt_mail']);
	$bestellnummer = mysqli_real_escape_string($conn, $_POST['bestellnummer']);
	$anfrage = mysqli_real_escape_string($conn, $_POST['anfrage']);
	
	// Add this product into the database now
	$sql = mysqli_query($conn, "INSERT INTO contact (name, email, bestellnummer, anfrage, date_added) 
        VALUES('$kontakt_name','$kontakt_mail','$bestellnummer', '$anfrage', now())") or die (mysqli_error($conn));
    header("location: kontakt2.php");
	exit();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>Kontakt</title>
	<link rel="shortcut icon" href="style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="Kontakt" />	
	<link rel="stylesheet" type="text/css" href="style/kontakt.css" media="screen" />
	
</head>
<body>
	<?php include_once 'template_header2.php';?><br><br><br><br><br>
	<div id="searchBtn" style="float: right;">
		<form action="search2.php" method="GET">
	    	<input type="text" name="query" size="40" />
	    	<input type="submit" value="Suchen" />
		</form>
	</div><br><br><br><br>
	<hr color= "white" size=5px width=1000px align="center">
	<div id="slogan">KONTAKT</div>
	<hr color= "white" size=5px width=1000px align="center"><br><br>
	<div id="content">
		Bestell-Hotline: 0152 0104 3645<br>
		(14ct/min aus dem dt. Festnetz; Mobilfunkh&ouml;chstpreis 42ct/min)<br><br>
		So sind wir pers&ouml;nlich erreichbar (h&auml;ufig sogar noch fr&uuml;her bzw. l&auml;nger):<br>
		Montag bis Freitag von 6:30 bis 22:00 Uhr<br>
		Samstag von 6:30 bis 18:00 Uhr<br>
		Sonntag von 10:00 bis 18:00 Uhr<br><br>
		
		Sind gerade alle Leitungen belegt oder au&szlig;erhalb dieser Zeiten k&ouml;nnen Sie uns eine Nachricht auf Band sprechen, wir rufen Sie schnellstm&ouml;glich zur&uuml;ck.<br><br>
		VTH-Blumen<br>
		Birkenallee 50<br>
		15745 Wildau<br>
		Telephone: +49152 0104 3645<br><br>
		<a class="email" href="mailto:info@vthblumen.de"><img src="style/mail.png" alt="mail" width=13px height=10px> <b>info@vthblumen.de</b></a><br>
		<a class="email" href="https://www.facebook.com/vuthuhuong2312"><img src="style/facebook.png" alt="facebook" width=15px height=15px> <b>facebook.com/vuthuhuong2312</b></a><br/><br/>
		
		<h2>Kontaktformular</h2>
		<form action="kontakt2.php" enctype="multipart/form-data" name="myForm" id="myform" method="post"><table>
			<tr>
				<td>Ihr Name:</td>
				<td><input class="kontakt" type="text" name="kontakt_name" value="<?php echo $user;?>" size="64" /></td>
			</tr>
			<tr>
				<td>Ihre E-Mail-Adresse:</td>
				<td><input class="kontakt" type="email" name="kontakt_mail" size="64" /></td>
			</tr>
			<tr>
				<td>Ihre Bestellnummer:</td>
				<td><input class="kontakt" type="number" min="1" name="bestellnummer" size="64" /></td>
			</tr>
			<tr>
				<td>Ihre Anfrage:</td>
				<td><textarea class="kontakt" name="anfrage" ></textarea></td>
			</tr>
			<tr class="button">
				<td></td>
				<td><button class="kontakt" type="submit">Ansenden</button>
				<button class="kontakt" type="reset">L&ouml;sen</button>
				</td>
			</tr>
		</table></form><br><br>
		Vertrauensgarantie:<br><br>
		Ihre Daten werden nicht weitergegeben und nur f&uuml;r die Beantwortung Ihrer Fragen verwendet.<br>
		Bitte beachten Sie hierzu auch unsere <a class="email" href="datenschutz2.html"><b>Datenschutzerkl&auml;rung</b></a> und dass Sie der Verwendung dieser hier angegeben Daten jederzeit widersprechen k&ouml;nnen.
	</div><br>
	<?php include_once 'template_footer2.php';?>
</body>
</html>
