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
$falsenoti = "";
// Parse the form data and add user item to the system
if (isset($_POST['benutzername'])) {
	
	$vorname = mysqli_real_escape_string($conn, $_POST['vorname']);
	$nachname = mysqli_real_escape_string($conn, $_POST['nachname']);
	$geschlecht = mysqli_real_escape_string($conn, $_POST['geschlecht']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$benutzername = mysqli_real_escape_string($conn, $_POST['benutzername']);
	$passwort = mysqli_real_escape_string($conn, $_POST['passwort']);
	$strasse = mysqli_real_escape_string($conn, $_POST['strasse']);
	$nummer = mysqli_real_escape_string($conn, $_POST['nummer']);
	$plz = mysqli_real_escape_string($conn, $_POST['plz']);
	$stadt = mysqli_real_escape_string($conn, $_POST['stadt']);
	
	// See if that product name is an identical match to another product in the system
	$sql = mysqli_query($conn, "SELECT id FROM user_account WHERE username='$benutzername' LIMIT 1");
	$userMatch = mysqli_num_rows($sql); // count the output amount
    if ($userMatch > 0) {
    	$falsenoti = 'Es existiert bereits ein Benutzerkonto. Bitte melden Sie sich mit den zugeh&ouml;rigen Benutzerdaten an.';
	}
	else {
	// Add this product into the database now
	$sql = mysqli_query($conn, "INSERT INTO user_account (vorname, nachname, geschlecht, email, username, passwort, strasse, nummer, plz, stadt, date_added) 
        VALUES('$vorname','$nachname','$geschlecht', '$email', '$benutzername', '$passwort', '$strasse', '$nummer', '$plz', '$stadt', now())") or die (mysqli_error($conn));
    header("location: anmelden.php");
	exit();
	}
}
?>

<!DOCTYPE HTML>
<html lang="de">
<head>
	<title>Registrieren</title>
	<link rel="shortcut icon" href="../style/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style/index.css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="registrieren" />
	
</head>
<body>
	<?php include_once 'template_header.php';?><br><br><br><br><br>
	<div id="searchBtn" style="float: right;">
		<form action="search.php" method="GET">
	    	<input type="text" name="query" size="40" />
	    	<input type="submit" value="Suchen" />
		</form>
	</div><br><br><br><br>
	<hr color= "white" size=5px width=1000px align="center">
	<div id="slogan">REGISTRIEREN</div>
	<hr color= "white" size=5px width=1000px align="center"><br>
	<?php echo $falsenoti; ?><br><br>
	<div id="content" align="center">
	
			<form action="registrieren.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
			    <table border="0" cellspacing="0" cellpadding="6">
			    <tr>
			        <td width="20%" align="right">Vorname</td>
			        <td width="80%"><input name="vorname" type="text" id="vorname" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Nachname</td>
			        <td width="80%"><input name="nachname" type="text" id="nachname" size="64" /></td>
			    </tr>
			    <tr>
			        <td align="right">Geschlecht</td>
			        <td>
			          <select name="geschlecht" id="geschlecht">
			        	  <option value="weiblich">Weiblich</option>
				          <option value="maennlich">M&auml;nnlich</option>
				          <option value="andere">Andere</option>
			          </select>
			        </td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Email</td>
			        <td width="80%"><input name="email" type="text" id="email" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Benutzername</td>
			        <td width="80%"><input name="benutzername" type="text" id="benutzername" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Passwort</td>
			        <td width="80%"><input name="passwort" type="password" id="passwort" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Stra&szlig;e</td>
			        <td width="80%"><input name="strasse" type="text" id="strasse" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Nummer</td>
			        <td width="80%"><input name="nummer" type="text" id="nummer" size="12" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">PLZ</td>
			        <td width="80%"><input name="plz" type="text" id="plz" size="12" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Stadt</td>
			        <td width="80%"><input name="stadt" type="text" id="stadt" size="64" /></td>
			    </tr>
			    <tr>
			        <td align="right"></td>
			        <td><input type="submit" name="submit" id="submit" value="Registrieren"/></td>
			    </tr>
			    </table>
			</form>
	
	</div>
	<br>
	<?php include_once 'template_footer.php';?>
</body>
</html>
