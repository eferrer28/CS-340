<?php

$pageTitle = "Advisors";

include("includes/header.php");

?>



<h3><?php echo $pageTitle  ?></h3>
	        
        
<?php
    
    if(!($stmt = $mysqli->prepare("INSERT INTO advisor (first_name, last_name, dob) VALUES (?,?,?)")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    
    
    
if(!($stmt->bind_param("sss",$_POST['fname'],$_POST['lname'],$_POST['dob']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
            
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    else {
        echo "Added " . $stmt->affected_rows . " rows to advisors.";
    }   
    ?>


<?php
include("includes/footer.php"); 


?>




