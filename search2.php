<?php 
	header('Content-Type: text/html; charset=UTF-8');  
?>

<?php	
	// Script Error Reporting
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	include 'storescripts/db_connection.php';
?>	

<?php	
    $query = $_GET['query']; 
    // gets value sent over search form
    $dynamicResult = "";
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($conn, $query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($conn, "SELECT * FROM products WHERE (`product_name` LIKE '%".$query."%') OR (`detail` LIKE '%".$query."%')") or die(mysqli_error());
                      
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
            	$dynamicResult=''.$dynamicResult.' <table align="center" width="80%" border="0" cellspacing="0" cellpadding="10">
							<tr>
								<td width="20%">
									<a href="product2.php?id='.$results['id'].'">
										<img style="border: #666 1px solid;" alt="'.$results['product_name'].'" src="inventory_images/'.$results['id'].'.jpg" width="80%" height="80%" border="1" />
									</a>
								</td>
								<td width="80%" align="left">
									<h3>'.$results['product_name'].'</h3>
									<p>Beschreibung: '.$results['detail'].'</p>
									<a href="product2.php?id='.$results['id'].'" style="color: white;">Mehr Details</a>
								</td>
							</tr>
						</table><br><br>';
            }
             
        }
        else { // if there is no matching rows do following
            echo "No results";
        }
    }
   	else { // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
	?>

<!DOCTYPE html>
<html lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
	<title>Suchen</title>
	<link rel="shortcut icon" href="style/favicon.ico" type="image/x-icon">
	<meta name="keywords" content="Blumen, flower, online, shop, flowers, kaufen, buy" />
	<meta name="description" content="Suchen" />	
	<link rel="stylesheet" type="text/css" href="style/index.css" media="screen" />
</head>
<body>
	<?php include_once 'template_header2.php';?><br><br><br><br>
	<div id="searchBtn" style="float: right;">
		<form action="search2.php" method="GET">
	    	<input type="text" name="query" size="40" />
	    	<input type="submit" value="Suchen" />
		</form>
	</div><br><br><br>
	<div id="suchergebnis">Suchergebnis f&uuml;r <?php echo $query; ?>:</div> 
	
	<p><?php echo $dynamicResult; ?></p>
	</div><br>
	<?php include_once 'template_footer2.php';?>
</body>
</html>
