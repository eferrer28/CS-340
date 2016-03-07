

<?php

$description = "This page has to do with the advisors";
$pageTitle = "Advisors";

include("includes/header.php");



?>



<h3><?php echo $pageTitle  ?></h3>

   
<!-- This displays the clients -->

        <div>
	<table class="table table-bordered">
        <label>This is the clients table</label>

		<tr>
            <td>Client_ID</td>
			<td>First Fame</td>
			<td>Last Name</td>
            <td>Date of Birth</td>
            <td>Portfolio Worth</td>
            
		</tr>

<?php
    
    
    if(!($stmt = $mysqli->prepare("SELECT c.client_id, c.first_name, c.last_name, c.dob, COALESCE(SUM( ps.worth ),0) AS net
FROM stock s
INNER JOIN port_stock ps ON ps.stock_id = s.stock_id
INNER JOIN portfolio p ON p.portfolio_id = ps.portfolio_id
INNER JOIN client c ON c.client_id = p.client_id
GROUP BY c.client_id


 ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
      
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($client_id, $first_name,  $last_name, $dob, $net))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        

    

        while($stmt->fetch()){
        echo "<tr><td> $client_id </td> <td> $first_name </td><td>  $last_name  </td><td>  $dob  </td><td>  $net  </td> <td>
<a href='clientdetails.php?fname=". urlencode($first_name) . "&lname=". urlencode($last_name)."'>More Details</a></td> </tr> ";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for clients -->  






<?php
include("includes/footer.php"); 


?>




