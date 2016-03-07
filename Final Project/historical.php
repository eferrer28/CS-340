


<?php

$description = "This page has to do with the advisors";
$pageTitle = "Historical Data";

include("includes/header.php");


  


?>



<h3><?php echo $pageTitle  ?></h3>

 <?php echo $_GET['stockID']  ?>



<!-- This displays the historical data of stocks -->

        <div>
	<table class="table table-bordered">
        <label>Historical Data of Selected Stock</label>

		<tr>
			<td>Company</td>
			<td>Symbol</td>
			<td>Closed</td>
            <td>Opened</td>
            <td>dateof</td>
		</tr>

<?php
    //.$_GET['stockID']
    if(!($stmt = $mysqli->prepare("SELECT s.company, s.symbol, d.closed, d.opened, d.dateof
FROM stock s, daily d
WHERE s.stock_id = d.stock_id AND s.company= ?
 ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    
    //Use GET to get value from the url 
    
    if(!($stmt->bind_param("s",$_GET['stockID']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
    
        
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    

    
    if(!$stmt->bind_result($company, $symbol, $closed, $opened, $dateof))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        
        
        while($stmt->fetch()){
        echo "<tr> \n<td>   " .  $company . " </td>\n<td>\n" . $symbol . "\n</td>\n<td>\n" . $closed . "\n</td>\n  <td>\n" . $opened . "\n</td>\n<td>\n" . $dateof . "\n</td>\n </tr>";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for stocks -->  
        


<?php
include("includes/footer.php"); 


?>




