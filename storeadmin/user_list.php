<?php
	//Error Reporting
	error_reporting(E_ALL);
	ini_set('display_errors','1');
	include "../storescripts/db_connection.php";
	
	header('Content-Type: text/html; charset=UTF-8');
?>

<?php 
//Delete item question to Admin and delete user if they choose
if (isset($_GET['deleteid'])) {
	echo 'M&ouml;chten Sie den Benutzer mit ID '.$_GET['deleteid'].' wirklich l&ouml;schen? <a href="user_list.php?yesdelete='.$_GET['deleteid'].'">Ja</a> | <a href="user_list.php">Nein</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	//remove item from system and delete its picture
	//delete from database
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysqli_query($conn, "DELETE FROM user_account WHERE id = '$id_to_delete' LIMIT 1") or die (mysqli_error($conn));
	header("location: user_list.php");
	exit();
}
?>

<?php
//This block grabs the whole list for viewing
$user_list="";
$sql = mysqli_query($conn, "SELECT * FROM user_account ORDER BY date_added DESC");
$userCount = mysqli_num_rows($sql); //count the output amount
if($userCount > 0) {
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
		$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
		$user_list="$user_list $date_added - $id - $vorname - $nachname- $geschlecht- $email- $passwort - $strasse - $nummer - $plz - $stadt &nbsp;&nbsp;&nbsp; <a class='white' href='user_list.php?deleteid=$id'>L&ouml;schen</a><br/>";
	}
} else {
	$user_list = "Sie haben noch keine Benutzerdaten.";
}
?>

<!DOCTYPE HTML>
<html lang="de">
<head>
	<title>Bestandsaufnahme</title>
	<link rel="shortcut icon" href="../style/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../style/index.css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="VTH-Blumen Bestandsaufnahme" />
</head>
<body>
	<?php include_once 'template_header3.php';?><br><br><br><br>
	<div id="content" align="left">
		<h1>Benutzerdaten</h1><br>
		<?php echo $user_list; ?>
		<br><br><a class="white" href="index.php">Zur&uuml;ck</a>
	</div><br><br>
	<br><?php include_once '../template_footer.php';?>
</body>
</html>
