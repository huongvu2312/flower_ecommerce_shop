<?php 
session_start();
if(!isset($_SESSION["user"])) {
	header("location: anmelden.php");
	exit();
}
//Be sure to check that this user SESSION value is in fact in the database
$userID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$user = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user"]); // filter everything but numbers and letters
$user_pass = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["user_pass"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their user_pass session var equals the database information
// Connect to the MySQL database
include "storescripts/db_connection.php";
$sql = mysqli_query($conn, "SELECT * FROM user_account WHERE id='$userID' AND username='$user' AND passwort='$user_pass' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysqli_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	echo "Ihre Anmeldungsdaten sind nicht in der Datenbank gespeichert.";
	exit();
}
?>

<?php
if (isset($_GET['log_out'])){
	unset($_SESSION['user']);
	unset($_SESSION['user_pass']);
	header('location: index.php');
}
?>

<header>
	<div id="barline">
		<a href="index2.php">Home</a>
		<a href="angebot2.php">Angebot</a>
		<a href="shop2.php">Shop</a>
		<a href="ueberVTHBlumen2.html">Ueber VTH-Blumen</a>
		<a href="kontakt2.php">Kontakt</a>
		<a class="right" href="?log_out">Abmelden</a>
		<a class="right" href="konto.php">Mein Konto</a>
		<a class="right" href="cart.php">Warenkorb</a>
	</div>
	<a href="index2.php"><img id="logo" alt="logo" src="style/logo.png" /></a><br>
</header>