<?php

$pageTitle = "Clients Of";

include("includes/header.php");

?>

<h3><?php echo $pageTitle  ?></h3>

<?php $yep = $_GET['fname'];
      $yep1 = $_GET['lname'];

?>

<!-- This displays the clients managed by a particular advisor -->

        <div>
	<table class="table table-bordered">
        <label>Clients of <?php echo "$yep $yep1"
     ?></h3></label>

		<tr>
			<td>Name</td>
			<td>Last Name</td>
            <td>Date of Birth</td>
            
		</tr>

<?php
    
    if(!($stmt = $mysqli->prepare("SELECT c.first_name, c.last_name, c.dob
FROM client c
INNER JOIN advisor a ON c.advisor_id = a.advisor_id
WHERE a.first_name = ?
 ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    
        //Use GET to get value from the url 
    
    if(!($stmt->bind_param("s",$_GET['fname']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
    
        //Use GET to get value from the url 
    
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($first_name,  $last_name, $dob))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        

        while($stmt->fetch()){
        echo "<tr> <td> $first_name </td><td>  $last_name  </td><td>  $dob  </td> </tr> ";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for clients -->  
        
     

<!-- Adds Client to a particular advisor -->  
<form method="post" action="addclient.php?<?php echo "afname=$yep&alname=$yep1"?>">
<label>Add Client</label>
    <div>
    <input type="text" name="fname" placeholder="First Name" required/>
    <input type="text" name="lname" placeholder="Last Name" required/>
    <input type="text" name="dob" placeholder="yyyy-mm-dd" id="datepicker" required/>
    <input type="submit" name="insert" value="Add"   />
</div>
           
</form>


<?php
include("includes/footer.php"); 


?>
