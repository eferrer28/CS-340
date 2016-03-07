


<?php

$description = "This page has to do with the advisors";
$pageTitle = "Advisors";

include("includes/header.php");

?>



<h3><?php echo $pageTitle  ?></h3>


<!-- This displays the advisors -->

        <div>
	<table class="table table-bordered">
        <label>This is the Advisor Table</label>

		<tr>
            <td>ID</td>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Date of Birth</td>
            redX
		</tr>
        RED X

<?php
    
    if(!($stmt = $mysqli->prepare("SELECT advisor_id, first_name, last_name, dob FROM advisor ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($advisor_id, $first_name, $last_name, $dob))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        
        
        while($stmt->fetch()){
        echo "<tr><td>$advisor_id</td><td>$first_name</td><td>$last_name</td><td>$dob</td></tr>";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for advisors -->  

<!-- This displays the clients -->

        <div>
	<table class="table table-bordered">
        <label>This is the clients table</label>

		<tr>
            <td>Client_ID</td>
			<td>First Fame</td>
			<td>Last Name</td>
            <td>Date of Birth</td>
            
		</tr>

<?php
    
    if(!($stmt = $mysqli->prepare("SELECT c.client_id, c.first_name, c.last_name, c.dob
FROM client c

 ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
      
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($client_id, $first_name,  $last_name, $dob))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        

        while($stmt->fetch()){
        echo "<tr><td> $client_id </td> <td> $first_name </td><td>  $last_name  </td><td>  $dob  </td> </tr> ";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for clients -->  


<!-- This displays the stocks -->

        <div>
	<table class="table table-bordered">
        <label>This is the Stock Table</label>

		<tr>
            <td>Stock_ID</td>
			<td>Company</a>
			<td>Symbol</td>
			
		</tr>

<?php
    
    if(!($stmt = $mysqli->prepare("SELECT s.stock_id, s.company, s.symbol
FROM stock s
 ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($stock_id, $company, $symbol))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        

        while($stmt->fetch()){
        echo "<tr><td>  $stock_id </td> <td>  $company </td><td>  $symbol  </td></tr> ";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for stocks -->  


<!-- This displays the portfolio table -->

        <div>
	<table class="table table-bordered">
        <label>This is the Portfolio Table</label>

		<tr>
            <td>Portfolio_ID</td>
			<td>Client_ID</td>
			<td>Date Created</td>
		</tr>

<?php
    
    if(!($stmt = $mysqli->prepare("SELECT portfolio_id, client_id, date_created FROM portfolio ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($portfolio_id, $client_id, $date_created))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        
        
        while($stmt->fetch()){
        echo "<tr><td>$portfolio_id</td><td>$client_id</td><td>$date_created</td></tr>";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for the portfolio table -->  


<!-- This displays the daily table -->

        <div>
	<table class="table table-bordered">
        <label>Stock Table</label>

		<tr>
            <td>Daily_ID</td>
			<td>Stock_ID</td>
			<td>Opened</td>
            <td>Closed</td>
            <td>Date of Record</td>
		</tr>

<?php
    
    if(!($stmt = $mysqli->prepare("SELECT daily_id, stock_id, opened, closed, dateof FROM daily ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($daily_id, $stock_id, $opened, $closed, $dateof))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        
        
        while($stmt->fetch()){
        echo "<tr><td>$daily_id</td><td>$stock_id</td><td>$opened</td><td>$closed</td><td>$dateof</td></tr>";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for the daily table -->  
        


<?php
include("includes/footer.php"); 


?>




