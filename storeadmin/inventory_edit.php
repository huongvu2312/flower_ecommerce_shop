<?php
header('Content-Type: text/html; charset=UTF-8');
?>

<?php
//Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors','1');
include "../storescripts/db_connection.php";
?>

<!DOCTYPE HTML>
<html lang="de">
<head>
	<title>Bestandsaufnahme &auml;ndern</title>
	<link rel="shortcut icon" href="../style/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="../style/index.css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="VTH-Blumen Online Shop" />
</head>
<body>
	<?php include_once 'template_header3.php';?><br><br><br><br>
	<?php 
	//Gather this product's full info for inserting automatically into the edit form below on page
	if (isset($_GET['pid'])) {
		$targetID = $_GET['pid'];
		$sql = mysqli_query($conn, "SELECT * FROM products WHERE id = '$targetID' LIMIT 1");
		$productCount = mysqli_num_rows($sql); //count the output amount
		if($productCount > 0) {
			while ($row = mysqli_fetch_array($sql)) {
				$product_name = $row["product_name"];
				$price = $row["price"];
				$category = $row["category"];
				$detail = $row["detail"];
				$date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));		
			}
		} else {
			echo "Es gibt kein Produkt mit diesem ID.";
			exit();
		}
	}
	?>

	<?php 
	// Parse the form data and add inventory item to the system
	if (isset($_POST['edit'])) {
		$pid = mysqli_real_escape_string($conn, $_POST['thisID']);
		$product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
		$price = mysqli_real_escape_string($conn, $_POST['price']);
		$category = mysqli_real_escape_string($conn, $_POST['category']);
		$detail = mysqli_real_escape_string($conn, $_POST['detail']);
		
		if ($_FILES['image']['tmp_name'] != ""){
			// Place image in the folder
			$newname = "$pid.jpg";
			move_uploaded_file( $_FILES['image']['tmp_name'], "../inventory_images/$newname");
			$sql = mysqli_query($conn, "UPDATE products SET product_name = '$product_name', price = '$price', category = '$category', detail = '$detail' WHERE id='$pid' ");
		}
		else{
			$sql = mysqli_query($conn, "UPDATE products SET product_name = '$product_name', price = '$price', category = '$category', detail = '$detail' WHERE id='$pid' ");
		}
		header("location: inventory_edit.php?pid=$pid");
		exit();
	}
	?>
	
	<div id="content">
			<div align="center">
				<h2>Bestandsaufnahme &auml;ndern</h2>
				<form action="inventory_edit.php?pid=<?php echo $targetID; ?>" enctype="multipart/form-data" name="myForm" id="myform" method="post">
			    <table border="0" cellspacing="0" cellpadding="6">
			      <tr>
			        <td width="20%" align="right">Produktname</td>
			        <td width="80%"><label>
			          <input name="product_name" type="text" id="product_name" size="64" value="<?php echo $product_name;?>" />
			        </label></td>
			      </tr>
			      <tr>
			        <td align="right">Produktpreis</td>
			        <td><label>
			          <input name="price" type="text" id="price" size="12" value="<?php echo $price;?>" /> EURO inkl. MwSt. inkl. Versandkosten
			        </label></td>
			      </tr>
			      <tr>
			        <td align="right">Kategory</td>
			        <td><label>
			          <select name="category" id="category">
			          	  <option value="<?php echo $category;?>"> <?php echo $category;?> </option>
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
			        <td><label>
			          <textarea name="detail" id="detail" cols="64" rows="5" > <?php echo $detail;?> </textarea>
			        </label></td>
			      </tr>
			      <tr>
			        <td align="right">Produktbild</td>
			        <td><label>
			          <input type="file" name="image" id="image" />
			        </label></td>
			      </tr>
			      <tr>
			        <td align="right"></td>
			        <td><label>
			          <input name="thisID" type="hidden" value="<?php echo $targetID;?>">
			          <input type="submit" name="edit" id="submit" value="&auml;ndern"/>
			        </label></td>
			      </tr>
			    </table>
			    </form>
			<br>
			<a class="white" href="inventory_list.php">Ver&auml;nderung ist komplett? Zur&uuml;ck</a><br><br><br>
			</div>
		</div>
		
	<br><?php include_once '../template_footer.php';?>
</body>
</html>
