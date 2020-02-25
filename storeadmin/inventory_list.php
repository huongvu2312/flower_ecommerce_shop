<?php
	//Error Reporting
	error_reporting(E_ALL);
	ini_set('display_errors','1');
	include "../storescripts/db_connection.php";
	
	header('Content-Type: text/html; charset=UTF-8');
?>

<?php 
//Delete item question to Admin and delete product if they choose
if (isset($_GET['deleteid'])) {
	echo 'M&ouml;chten Sie das Produkt mit ID '.$_GET['deleteid'].' wirklich l&ouml;schen? <a href="inventory_list.php?yesdelete='.$_GET['deleteid'].'">Ja</a> | <a href="inventory_list.php">Nein</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	//remove item from system and delete its picture
	//delete from database
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysqli_query($conn, "DELETE FROM products WHERE id = '$id_to_delete' LIMIT 1") or die (mysqli_error($conn));
	//unlink the image from server
	//remove the pic
	$pic_to_delete = ("../inventory_images/$id_to_delete.jpg");
	if(file_exists($pic_to_delete)){
		unlink($pic_to_delete);
	}	
	header("location: inventory_list.php");
	exit();
}
?>

<?php 
// Parse the form data and add inventory item to the system
if (isset($_POST['product_name'])) {
	
	$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
	$price = mysqli_real_escape_string($conn, $_POST['price']);
	$category = mysqli_real_escape_string($conn, $_POST['category']);
	$detail = mysqli_real_escape_string($conn, $_POST['detail']);
	
	// See if that product name is an identical match to another product in the system
	$sql = mysqli_query($conn, "SELECT id FROM products WHERE product_name='$product_name' and category='$category' LIMIT 1");
	$productMatch = mysqli_num_rows($sql); // count the output amount
    if ($productMatch > 0) {
		echo 'Sie haben versucht einen doppelten "Produktnamen" in Datenbank zu legen <a href="inventory_list.php">Noch mal versuchen</a>';
		exit();
	}
	// Add this product into the database now
	$sql = mysqli_query($conn, "INSERT INTO products (product_name, price, category, detail, date_added) 
        VALUES('$product_name','$price','$category', '$detail',now())") or die (mysqli_error($conn));
    $pid = mysqli_insert_id($conn);
	// Place image in the folder 
	$newname = "$pid.jpg";
	move_uploaded_file( $_FILES['image']['tmp_name'], "../inventory_images/$newname");
	header("location: inventory_list.php");
	exit();
}
?>

<?php
//This block grabs the whole list for viewing
$product_list="";
$sql = mysqli_query($conn, "SELECT * FROM products ORDER BY date_added DESC");
$productCount = mysqli_num_rows($sql); //count the output amount
if($productCount > 0) {
	while ($row = mysqli_fetch_array($sql)) {
		$id = $row["id"];
		$product_name = $row["product_name"];
		$category = $row["category"];
		$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
		$product_list="$product_list $date_added - $id - $product_name - $category &nbsp;&nbsp;&nbsp; <a class='white' href='inventory_edit.php?pid=$id'>&Auml;ndern</a> &bull; <a class='white' href='inventory_list.php?deleteid=$id'>L&ouml;schen</a><br/>";
	}
} else {
	$product_list = "Sie haben noch keine Produkte in Ihrem Shop gelistet.";
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
	<div id="content">
		<div align="left">
			<h1>Bestandsaufnahme</h1>
			<?php echo $product_list; ?>
		</div><br><br>
		<div align="center">
			<h2>Neues Produkt hinzuf&uuml;gen</h2>
			<form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
			<table border="0" cellspacing="0" cellpadding="6">
				<tr>
			        <td width="20%" align="right">Produktname</td>
			        <td width="80%"><label><input name="product_name" type="text" id="product_name" size="64" />
			        </label></td>
			    </tr>
			    <tr>
			        <td align="right">Produktpreis</td>
			        <td><label><input name="price" type="text" id="price" size="12" /> EURO inkl. MwSt. inkl. Versandkosten</label></td>
			    </tr>
			    <tr>
			        <td align="right">Kategory</td>
			        <td><label>
			          <select name="category" id="category">
			        	  <option value="angebot">Angebot</option>
				          <option value="kranz">Kranz</option>
				          <option value="blumenstraeusse">Blumenstraeusse</option>
				          <option value="adventsgesteck">Adventsgesteck</option>
				          <option value="amaryllis">Amaryllis</option>
				          <option value="rosen">Rosen</option>
				          <option value="dekoration">Dekoration</option>			
			          </select>
			        </label></td>
			    </tr>
			    <tr>
			        <td align="right">Beschreibung</td>
			        <td><label><textarea name="detail" id="detail" cols="64" rows="5"></textarea></label></td>
			    </tr>
			    <tr>
			        <td align="right">Produktbild</td>
			        <td><label><input type="file" name="image" id="image" /></label></td>
			    </tr>
			    <tr>
			        <td align="right"></td>
			        <td><label><input type="submit" name="submit" id="submit" value="hinf&uuml;gen" /></label></td>
			    </tr>
			</table>
			</form>
		</div>
		<div align="left">
			<br><br><a class="white" href="index.php">Zur&uuml;ck</a>
		</div>
	</div>		
	<br><?php include_once '../template_footer.php';?>
</body>
</html>
