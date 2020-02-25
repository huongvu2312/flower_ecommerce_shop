<?php 
	header('Content-Type: text/html; charset=UTF-8');  
?>

<?php
session_start();
if(isset($_SESSION["user"])) {
	header("location: index2.php");
	exit();
}
?>

<?php
$falsenoti = "";

// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["user_pass"])) {
	$user = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $user_pass = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_pass"]); // filter everything but numbers and letters
    // Connect to the MySQL database  
    include "storescripts/db_connection.php";
    $sql = mysqli_query($conn, "SELECT id FROM user_account WHERE username='$user' AND passwort='$user_pass' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysqli_num_rows($sql); // count the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysqli_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["user"] = $user;
		 $_SESSION["user_pass"] = $user_pass;
		 header("location: index2.php");
         exit();
    } else {
		$falsenoti = 'Benutzername oder Passwort sind ung&uuml;ltig.';
	}
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>Anmelden</title>
	<link rel="shortcut icon" href="style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="Anmelden" />	
	<link rel="stylesheet" type="text/css" href="style/index.css" media="screen" />
	
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
	<div id="slogan">ANMELDEN</div>
	<hr color= "white" size=5px width=1000px align="center"><br><br>
	<div id="content">
		<h1>Melden Sie sich mit Ihren Zugangsdaten an.</h1>
		<?php echo $falsenoti; ?><br>
		<form id="form1" name="form1" method="post" action="anmelden.php">
			Benutzername: <br /><input name="username" type="text" id="username" size="40" /><br /><br />
			Passwort:<br /><input name="user_pass" type="password" id="user_pass" size="40" /><br /><br />
			<input type="submit" name="button" id="button" value="Anmelden" />			       
      	</form><br>
		<a href="registrieren.php" style="color: white;">Kein Kundenkonto? Zur Registrierung</a>
		<br><br>
	</div>
	<?php include_once 'template_footer.php';?>
</body>
</html>
