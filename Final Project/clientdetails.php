

<?php

 $first = $_GET['fname'];
      $last = $_GET['lname'];


$pageTitle = "Transaction History";

include("includes/header.php");

?>



<h3><?php echo $pageTitle  ?></h3>

   
<!-- This displays some info about the stocks held by clients -->

        <div>
	<table class="table table-bordered">
        <label>Transaction History for <?php echo "$first $last"
     ?> </label>

		<tr>
            <td>Stock Symbol</td>
            <td>Stock Held</td>
            <td>Qty</td>
            <td>Worth</td>
            
            <td>Purchase Price</td>
            
            
		</tr>

<?php
        if(!($stmt = $mysqli->prepare(" SELECT s.symbol, s.company, ps.qty, ps.worth, ps.purchase_price
FROM stock s
INNER JOIN port_stock ps ON ps.stock_id = s.stock_id
INNER JOIN portfolio p ON p.portfolio_id = ps.portfolio_id
INNER JOIN client c ON c.client_id = p.client_id
WHERE c.first_name = ?
AND c.last_name = ?
LIMIT 0 , 30 
 ")))
    
    if(!($stmt = $mysqli->prepare("SELECT c.first_name, c.last_name, c.dob
FROM client c

 ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
        
        
        
        //Use GET to get value from the url 
    
    if(!($stmt->bind_param("ss",$_GET['fname'], $_GET['lname']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
        }
    
        //Use GET to get value from the url 
    
      
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($symbol, $company,  $qty, $worth, $purchase_price))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        


        while($stmt->fetch()){
        echo "<tr> <td> $symbol</td><td>  $company  </td><td>  $qty  </td><td>  $worth  </td> <td> $purchase_price

</td> </tr> ";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for clients -->  


<?php
include("includes/footer.php"); 


?>