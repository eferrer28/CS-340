
<?php

$pageTitle = "Advisors";

include("includes/header.php");

?>

<h3><?php echo $pageTitle  ?></h3>
  
<!-- This displays the advisors -->

        <div>
	<table class="table table-bordered">
        <label>List of Advisors</label>

		<tr>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Date of Birth</td>
		</tr>
           
<?php
    
    if(!($stmt = $mysqli->prepare("SELECT first_name, last_name, dob FROM advisor ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($first_name, $last_name, $dob))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        
        
        while($stmt->fetch()){
        echo "<tr><td><a href='managedby.php?fname=$first_name&lname=$last_name'>$first_name</a></td><td>$last_name</td><td>$dob</td></tr>";
}
    $stmt->close();
    
    ?>
            </table>
</div>
      
      <!-- End the display for advisors -->  

        <div>
<form method="post" action="addadvisor.php/">
<label>Add Advisors</label>
    <div>
    <input type="text" name="fname" placeholder="First Name" required/>
    <input type="text" name="lname" placeholder="Last Name" required/>
    <input type="text" name="dob" placeholder="yyyy-mm-dd"  id="datepicker" required/>
    <input type="submit" name="insert" value="Add" required/>
</div>
           
</form>
</div>

<?php
include("includes/footer.php"); 

?>