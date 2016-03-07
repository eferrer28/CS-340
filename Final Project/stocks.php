<?php

$description = "This page has to do with the advisors";
$pageTitle = "Advisors";

include("includes/header.php");

?>


<h3><?php echo $pageTitle  ?></h3>

<!-- This displays the stocks -->
        <div>
	<table class="table table-bordered">
        <label>List of Stocks From Most Recent Close</label>

		<tr>
            <td>Company</td>
			<td>Symbol</td>
			<td>Closed</td>
            <td>Opened</td>
            <td>dateof</td>
		</tr>

<?php
    
    if(!($stmt = $mysqli->prepare("SELECT s.company, s.symbol, d.closed, d.opened, max(d.dateof)
FROM stock s, daily d
WHERE s.stock_id = d.stock_id
GROUP BY s.company
 ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
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
        echo "<tr> <td>  <a href='historical.php?stockID=$company'>$company</a> </td><td>  $symbol  </td><td>  $closed  </td>  <td>  $opened  </td><td>  $dateof  </td> </tr> ";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for stocks -->  

        


<?php
include("includes/footer.php"); 


?>




