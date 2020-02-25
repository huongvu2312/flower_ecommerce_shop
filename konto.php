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
//Delete item question to Admin and delete product if they choose
if (isset($_GET['deleteid'])) {
	echo 'M&ouml;chten Sie das Konto wirklich l&ouml;schen? <a href="konto.php?yesdelete='.$_GET['deleteid'].'">Ja</a> | <a href="konto.php">Nein</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	//remove item from system and delete its picture
	//delete from database
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysqli_query($conn, "DELETE FROM user_account WHERE id = '$id_to_delete' LIMIT 1") or die (mysqli_error($conn));
	header("location: index.php");
	exit();
}

?>

<!DOCTYPE HTML>
<html lang="de">
<head>
	<title>Mein Konto</title>
	<link rel="shortcut icon" href="../style/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="style/index.css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="konto" />
	
</head>
<body>
	<?php include_once 'template_header2.php';?><br><br><br><br><br>
	<?php 
	$sql = mysqli_query($conn, "SELECT * FROM user_account WHERE username='$user' LIMIT 1");
		
	while ($row = mysqli_fetch_array($sql)) {
		$id = $row["id"];
		$vorname = $row["vorname"];
		$nachname = $row["nachname"];
		$geschlecht = $row["geschlecht"];
		$email = $row["email"];
		$passwort = $row["passwort"];
		$strasse = $row["strasse"];
		$nummer = $row["nummer"];
		$plz = $row["plz"];
		$stadt = $row["stadt"];
		}
	?>
	
	<?php
	//Change data of user
	if (isset($_POST['edit'])) {
		$vorname = mysqli_real_escape_string($conn, $_POST['vorname']);
		$nachname = mysqli_real_escape_string($conn, $_POST['nachname']);
		$geschlecht = mysqli_real_escape_string($conn, $_POST['geschlecht']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$passwort = mysqli_real_escape_string($conn, $_POST['passwort']);
		$strasse = mysqli_real_escape_string($conn, $_POST['strasse']);
		$nummer = mysqli_real_escape_string($conn, $_POST['nummer']);
		$plz = mysqli_real_escape_string($conn, $_POST['plz']);
		$stadt = mysqli_real_escape_string($conn, $_POST['stadt']);
		
		$sql = mysqli_query($conn, "UPDATE user_account SET vorname='$vorname', nachname='$nachname', geschlecht='$geschlecht', email='$email', passwort='$passwort',
									strasse='$strasse', nummer='$nummer', plz='$plz', stadt='$stadt' WHERE id='$id' ");
		header("location:konto.php");
		exit();
	}
		
	?>
	
	<div id="searchBtn" style="float: right;">
		<form action="search.php" method="GET">
	    	<input type="text" name="query" size="40" />
	    	<input type="submit" value="Suchen" />
		</form>
	</div><br><br><br><br>
	<hr color= "white" size=5px width=1000px align="center">
	<div id="slogan">MEIN KONTO</div>
	<hr color= "white" size=5px width=1000px align="center"><br>
	<div id="content">
		<center>
		<table border="0" cellspacing="0" cellpadding="6">
			<form action="konto.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
			    <tr>
			        <td width="20%" align="right">Vorname</td>
			        <td width="80%"><input name="vorname" type="text" id="vorname" value="<?php echo $vorname;?>" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Nachname</td>
			        <td width="80%"><input name="nachname" type="text" id="nachname" value="<?php echo $nachname;?>" size="64" /></td>
			    </tr>
			    <tr>
			        <td align="right">Geschlecht</td>
			        <td>
			          <select name="geschlecht" id="geschlecht" >
			        	  <option value="<?php echo $geschlecht;?>"> <?php echo $geschlecht;?> </option>
			        	  <option value="weiblich">Weiblich</option>
				          <option value="maennlich">M&auml;nnlich</option>
				          <option value="andere">Andere</option>
			          </select>
			        </td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Email</td>
			        <td width="80%"><input name="email" type="text" id="email" value="<?php echo $email;?>" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Benutzername</td>
			        <td width="80%"><input name="benutzername" type="text" id="benutzername" value="<?php echo $user;?>" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Passwort</td>
			        <td width="80%"><input name="passwort" type="password" id="passwort" value="<?php echo $passwort;?>" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Stra&szlig;e</td>
			        <td width="80%"><input name="strasse" type="text" id="strasse" value="<?php echo $strasse;?>" size="64" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Nummer</td>
			        <td width="80%"><input name="nummer" type="text" id="nummer" value="<?php echo $nummer;?>" size="12" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">PLZ</td>
			        <td width="80%"><input name="plz" type="text" id="plz" value="<?php echo $plz;?>" size="12" /></td>
			    </tr>
			    <tr>
			        <td width="20%" align="right">Stadt</td>
			        <td width="80%"><input name="stadt" type="text" id="stadt" value="<?php echo $stadt;?>" size="64" /></td>
			    </tr>
				<tr>
			        <td width="20%" align="right"></td>
			        <td width="80%">
						<input type="submit" name="edit" id="submit" value="&auml;ndern"/></a></form>
						<a href='konto.php?deleteid=<?php echo $id;?>' style="text-decoration: none;"><input type="submit" name="submit" id="submit" value="Konto l&ouml;schen"/></a>
						
			        </td>
			    </tr>
		</table>
		</center>
	</div>
	<br>
	<?php include_once 'template_footer2.php';?>
</body>
</html>
