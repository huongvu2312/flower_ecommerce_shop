<?php
session_start();
if(!isset($_SESSION["manager"])) {
	header("location: admin_login.php");
	exit();
}
//Be sure to check that this manager SESSION value is in fact in the database
$managerID = preg_replace('#[^0-9]#i', '', $_SESSION["id"]); // filter everything but numbers and letters
$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["manager"]); // filter everything but numbers and letters
$pass = preg_replace('#[^A-Za-z0-9]#i', '', $_SESSION["password"]); // filter everything but numbers and letters
// Run mySQL query to be sure that this person is an admin and that their password session var equals the database information
// Connect to the MySQL database
include "../storescripts/db_connection.php";
$sql = mysqli_query($conn, "SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$pass' LIMIT 1"); // query the person
// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
$existCount = mysqli_num_rows($sql); // count the row nums
if ($existCount == 0) { // evaluate the count
	echo "Your login session data is not on record in the database.";
	exit();
}
?>

<?php
if (isset($_GET['log_out'])){
	unset($_SESSION['manager']);
	unset($_SESSION['password']);
	header('location: admin_login.php');
}
?>

<header>
	<div id="barline">
		<a href="../index.php">Home</a>
		<a href="../angebot.php">Angebot</a>
		<a href="../shop.php">Shop</a>
		<a href="../ueberVTHBlumen.html">Ueber VTH-Blumen</a>
		<a href="../kontakt.php">Kontakt</a>
		<a class="right" href="?log_out">Abmelden</a>
	</div>
	<a href="index2.php"><img id="logo" alt="logo" src="../style/logo.png" /></a><br>
</header>