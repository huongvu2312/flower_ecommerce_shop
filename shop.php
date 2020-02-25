<?php 
	header('Content-Type: text/html; charset=UTF-8');  
?>

<?php
	include 'storescripts/db_connection.php';
	
	$dynamicList1="";
	$dynamicList2="";
	$dynamicList3="";
	$dynamicList4="";
	$dynamicList5="";
	$dynamicList6="";
	$dynamicList7="";
	
	$sql1 = mysqli_query($conn, "SELECT * FROM products WHERE category='Angebot' ORDER BY date_added DESC");
	$sql2 = mysqli_query($conn, "SELECT * FROM products WHERE category='Kranz' ORDER BY date_added DESC");
	$sql3 = mysqli_query($conn, "SELECT * FROM products WHERE category='Blumenstraeusse' ORDER BY date_added DESC");
	$sql4 = mysqli_query($conn, "SELECT * FROM products WHERE category='Adventsgesteck' ORDER BY date_added DESC");
	$sql5 = mysqli_query($conn, "SELECT * FROM products WHERE category='Amaryllis' ORDER BY date_added DESC");
	$sql6 = mysqli_query($conn, "SELECT * FROM products WHERE category='Rosen' ORDER BY date_added DESC");
	$sql7 = mysqli_query($conn, "SELECT * FROM products WHERE category='Dekoration' ORDER BY date_added DESC");
	
	//Angebot
	$productCount1 = mysqli_num_rows($sql1); //count the output amount
	if($productCount1 > 0) {
		while ($row1 = mysqli_fetch_array($sql1)) {
			$id1 = $row1["id"];
			$product_name1 = $row1["product_name"];
			$price1 = $row1["price"];
			$category1 = $row1["category"];
			$detail1 = $row1["detail"];
			$date_added1 = strftime("%b %d, %Y", strtotime($row1["date_added"]));
			$dynamicList1=''.$dynamicList1.'
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
				<tr>
										
				<td width="20%" valign="top" align="center">
			    	<img src="inventory_images/'.$id1.'.jpg" width="80%" height="80%" alt="'.$product_name1.'" /><br />
			    	<a href="inventory_images/'.$id1.'.jpg" style="text-decoration: none; color: white;"><b>Bild ansehen</b></a>
			    </td>
			    
			    <td width="80%" valign="top" align="left">
			   		<h3>'.$product_name1.'</h3>
			    	<p>
			    		'.$price1.' EURO inkl. MwSt. inkl. Versandkosten<br>
			    		Kategory: '.$category1.' <br><br>
			    		'.$detail1.'
			    	</p>
			    	<p>
				    	<form id="form1" name="form1" method="post" action="anmelden.php">
		        			<input type="hidden" name="pid" id="pid" value="'.$id1.'" />
		        			<input type="submit" name="button" id="button" value="In den Warenkorb" />
	      				</form>
      				</p>
			    </td>
				</tr>
			</table><br>';
		}
	} else {
		$dynamicList1 = "Wir haben noch keine Produkte in unserem Shop.";
	}
	
	//Kranz
	$productCount2 = mysqli_num_rows($sql2); //count the output amount
	if($productCount2 > 0) {
		while ($row2 = mysqli_fetch_array($sql2)) {
			$id2 = $row2["id"];
			$product_name2 = $row2["product_name"];
			$price2 = $row2["price"];
			$category2 = $row2["category"];
			$detail2 = $row2["detail"];
			$date_added2 = strftime("%b %d, %Y", strtotime($row2["date_added"]));
			$dynamicList2=''.$dynamicList2.'
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
				<tr>
					
				<td width="20%" valign="top" align="center">
			    	<img src="inventory_images/'.$id2.'.jpg" width="80%" height="80%" alt="'.$product_name2.'" /><br />
			    	<a href="inventory_images/'.$id2.'.jpg" style="text-decoration: none; color: white;"><b>Bild ansehen</b></a>
			    </td>
			    			
			    <td width="80%" valign="top" align="left">
			   		<h3>'.$product_name2.'</h3>
			    	<p>
			    		'.$price2.' EURO inkl. MwSt. inkl. Versandkosten<br>
			    		Kategory: '.$category2.' <br><br>
			    		'.$detail2.'
			    	</p>
			    	<p>
				    	<form id="form1" name="form1" method="post" action="anmelden.php">
		        			<input type="hidden" name="pid" id="pid" value="'.$id2.'" />
		        			<input type="submit" name="button" id="button" value="In den Warenkorb" />
	      				</form>
      				</p>
			    </td>
				</tr>
			</table><br>';
		}
	} else {
		$dynamicList2 = "Wir haben noch keine Produkte in unserem Shop.";
	}
	
	//Blumenstraeusse
	$productCount3 = mysqli_num_rows($sql3); //count the output amount
	if($productCount3 > 0) {
		while ($row3 = mysqli_fetch_array($sql3)) {
			$id3 = $row3["id"];
			$product_name3 = $row3["product_name"];
			$price3 = $row3["price"];
			$category3 = $row3["category"];
			$detail3 = $row3["detail"];
			$date_added3 = strftime("%b %d, %Y", strtotime($row3["date_added"]));
			$dynamicList3=''.$dynamicList3.'
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
				<tr>
					
				<td width="20%" valign="top" align="center">
			    	<img src="inventory_images/'.$id3.'.jpg" width="80%" height="80%" alt="'.$product_name3.'" /><br />
			    	<a href="inventory_images/'.$id3.'.jpg" style="text-decoration: none; color: white;"><b>Bild ansehen</b></a>
			    </td>
			    			
			    <td width="80%" valign="top" align="left">
			   		<h3>'.$product_name3.'</h3>
			    	<p>
			    		'.$price3.' EURO inkl. MwSt. inkl. Versandkosten<br>
			    		Kategory: '.$category3.' <br><br>
			    		'.$detail3.'
			    	</p>
			    	<p>
				    	<form id="form1" name="form1" method="post" action="anmelden.php">
		        			<input type="hidden" name="pid" id="pid" value="'.$id3.'" />
		        			<input type="submit" name="button" id="button" value="In den Warenkorb" />
	      				</form>
      				</p>
			    </td>
				</tr>
			</table><br>';
		}
	} else {
		$dynamicList3 = "Wir haben noch keine Produkte in unserem Shop.";
	}
	
	//Adventsgesteck
	$productCount4 = mysqli_num_rows($sql4); //count the output amount
	if($productCount4 > 0) {
		while ($row4 = mysqli_fetch_array($sql4)) {
			$id4 = $row4["id"];
			$product_name4 = $row4["product_name"];
			$price4 = $row4["price"];
			$category4 = $row4["category"];
			$detail4 = $row4["detail"];
			$date_added4 = strftime("%b %d, %Y", strtotime($row4["date_added"]));
			$dynamicList4=''.$dynamicList4.'
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
				<tr>
					
				<td width="20%" valign="top" align="center">
			    	<img src="inventory_images/'.$id4.'.jpg" width="80%" height="80%" alt="'.$product_name4.'" /><br />
			    	<a href="inventory_images/'.$id4.'.jpg" style="text-decoration: none; color: white;"><b>Bild ansehen</b></a>
			    </td>
			    			
			    <td width="80%" valign="top" align="left">
			   		<h3>'.$product_name4.'</h3>
			    	<p>
			    		'.$price4.' EURO inkl. MwSt. inkl. Versandkosten<br>
			    		Kategory: '.$category4.' <br><br>
			    		'.$detail4.'
			    	</p>
			    	<p>
				    	<form id="form1" name="form1" method="post" action="anmelden.php">
		        			<input type="hidden" name="pid" id="pid" value="'.$id4.'" />
		        			<input type="submit" name="button" id="button" value="In den Warenkorb" />
	      				</form>
      				</p>
			    </td>
				</tr>
			</table><br>';
		}
	} else {
		$dynamicList4 = "Wir haben noch keine Produkte in unserem Shop.";
	}
	
	//Amaryllis
	$productCount5 = mysqli_num_rows($sql5); //count the output amount
	if($productCount5 > 0) {
		while ($row5 = mysqli_fetch_array($sql5)) {
			$id5 = $row5["id"];
			$product_name5 = $row5["product_name"];
			$price5 = $row5["price"];
			$category5 = $row5["category"];
			$detail5 = $row5["detail"];
			$date_added5 = strftime("%b %d, %Y", strtotime($row5["date_added"]));
			$dynamicList5=''.$dynamicList5.'
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
				<tr>
					
				<td width="20%" valign="top" align="center">
			    	<img src="inventory_images/'.$id5.'.jpg" width="80%" height="80%" alt="'.$product_name5.'" /><br />
			    	<a href="inventory_images/'.$id5.'.jpg" style="text-decoration: none; color: white;"><b>Bild ansehen</b></a>
			    </td>
			    			
			    <td width="80%" valign="top" align="left">
			   		<h3>'.$product_name5.'</h3>
			    	<p>
			    		'.$price5.' EURO inkl. MwSt. inkl. Versandkosten<br>
			    		Kategory: '.$category5.' <br><br>
			    		'.$detail5.'
			    	</p>
			    	<p>
				    	<form id="form1" name="form1" method="post" action="anmelden.php">
		        			<input type="hidden" name="pid" id="pid" value="'.$id5.'" />
		        			<input type="submit" name="button" id="button" value="In den Warenkorb" />
	      				</form>
      				</p>
			    </td>
				</tr>
			</table><br>';
		}
	} else {
		$dynamicList5 = "Wir haben noch keine Produkte in unserem Shop.";
	}
	
	//Rosen
	$productCount6 = mysqli_num_rows($sql6); //count the output amount
	if($productCount6 > 0) {
		while ($row6 = mysqli_fetch_array($sql6)) {
			$id6 = $row6["id"];
			$product_name6 = $row6["product_name"];
			$price6 = $row6["price"];
			$category6 = $row6["category"];
			$detail6 = $row6["detail"];
			$date_added6 = strftime("%b %d, %Y", strtotime($row6["date_added"]));
			$dynamicList6=''.$dynamicList6.'
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
				<tr>
					
				<td width="20%" valign="top" align="center">
			    	<img src="inventory_images/'.$id6.'.jpg" width="80%" height="80%" alt="'.$product_name6.'" /><br />
			    	<a href="inventory_images/'.$id6.'.jpg" style="text-decoration: none; color: white;"><b>Bild ansehen</b></a>
			    </td>
			    			
			    <td width="80%" valign="top">
			   		<h3>'.$product_name6.'</h3>
			    	<p>
			    		'.$price6.' EURO inkl. MwSt. inkl. Versandkosten<br>
			    		Kategory: '.$category6.' <br><br>
			    		'.$detail6.'
			    	</p>
			    	<p>
				    	<form id="form1" name="form1" method="post" action="anmelden.php">
		        			<input type="hidden" name="pid" id="pid" value="'.$id6.'" />
		        			<input type="submit" name="button" id="button" value="In den Warenkorb" />
	      				</form>
      				</p>
			    </td>
				</tr>
			</table><br>';
		}
	} else {
		$dynamicList6 = "Wir haben noch keine Produkte in unserem Shop.";
	}
	
	//Dekoration
	$productCount7 = mysqli_num_rows($sql7); //count the output amount
	if($productCount7 > 0) {
		while ($row7 = mysqli_fetch_array($sql7)) {
			$id7 = $row7["id"];
			$product_name7 = $row7["product_name"];
			$price7 = $row7["price"];
			$category7 = $row7["category"];
			$detail7 = $row7["detail"];
			$date_added7 = strftime("%b %d, %Y", strtotime($row7["date_added"]));
			$dynamicList7=''.$dynamicList7.'
			<table width="100%" border="0" cellspacing="0" cellpadding="10">
				<tr>
					
				<td width="20%" valign="top" align="center">
			    	<img src="inventory_images/'.$id7.'.jpg" width="80%" height="80%" alt="'.$product_name7.'" /><br />
			    	<a href="inventory_images/'.$id7.'.jpg" style="text-decoration: none; color: white;"><b>Bild ansehen</b></a>
			    </td>
			    			
			    <td width="80%" valign="top">
			   		<h3>'.$product_name7.'</h3>
			    	<p>
			    		'.$price7.' EURO inkl. MwSt. inkl. Versandkosten<br>
			    		Kategory: '.$category7.' <br><br>
			    		'.$detail7.'
			    	</p>
			    	<p>
				    	<form id="form1" name="form1" method="post" action="anmelden.php">
		        			<input type="hidden" name="pid" id="pid" value="'.$id7.'" />
		        			<input type="submit" name="button" id="button" value="In den Warenkorb" />
	      				</form>
      				</p>
			    </td>
				</tr>
			</table><br>';
		}
	} else {
		$dynamicList7 = "Wir haben noch keine Produkte in unserem Shop.";
	}
	
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>Onlineshop</title>
	<link rel="shortcut icon" href="style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="Shop" />	
	<link rel="stylesheet" type="text/css" href="style/shop.css" media="screen" />
	
</head>
<body>
	<?php include_once 'template_header.php';?><br><br><br><br><br>
	<div id="searchBtn" style="float: right;">
		<form action="search.php" method="GET">
	    	<input type="text" name="query" size="40" />
	    	<input type="submit" value="Suchen" />
		</form>
	</div><br><br>
	<div id="slogan">ONLINESHOP</div>
	<hr color= "white" size=5px width=1000px align="center">
	<div id="onlineshop">
		<a class="onlineshop" href="#angebot">Angebot</a>
		<a class="onlineshop" href="#kranz">Kranz</a>
		<a class="onlineshop" href="#blumenstraeusse">Blumenstr&auml;u&szlig;e</a>
		<a class="onlineshop" href="#adventsgesteck">Adventsgesteck</a>
		<a class="onlineshop" href="#amaryllis">Amaryllis</a>
		<a class="onlineshop" href="#rosen">Rosen</a>
		<a class="onlineshop" href="#dekoration">Dekoration</a>
	</div>	
	<hr color= "white" size=5px width=1000px align="center"><br><br>
	<div id="content">
		<section id="angebot"><h1>ANGEBOT</h1><hr width=800px><br><?php echo $dynamicList1; ?><br></section>
		<section id="kranz"><h1>KRANZ</h1><hr width=800px><br><?php echo $dynamicList2; ?><br></section>
		<section id="blumenstraeusse"><h1>BLUMENSTR&Auml;U&szlig;E</h1><hr width=800px><br><?php echo $dynamicList3; ?><br></section>
		<section id="adventsgesteck"><h1>ADVENTSGESTECK</h1><hr width=800px><br><?php echo $dynamicList4; ?><br></section>
		<section id="amaryllis"><h1>AMARYLLIS</h1><hr width=800px><br><?php echo $dynamicList5; ?><br></section>
		<section id="rosen"><h1>ROSEN</h1><hr width=800px><br><?php echo $dynamicList6; ?><br></section>
		<section id="dekoration"><h1>DEKORATION</h1><hr width=800px><br><?php echo $dynamicList7; ?><br><br></section>
	</div>
	<?php include_once 'template_footer.php';?>
</body>
</html>
