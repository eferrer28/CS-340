<?php

$description = "This page has to do with the advisors";
$pageTitle = "Client Added";

include("includes/header.php");

?>



<h3><?php echo $pageTitle  ?></h3>


  
<?php
    
    if(!($stmt = $mysqli->prepare("INSERT INTO client (advisor_id, first_name, last_name, dob) VALUES ((SELECT advisor_id from advisor a WHERE a.first_name = ? AND a.last_name = ?),?,?,?)")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    
    
    
if(!($stmt->bind_param("sssss",$_GET['afname'],$_GET['alname'],$_POST['fname'],$_POST['lname'],$_POST['dob']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
            
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    else {
        echo "Added " . $stmt->affected_rows . " rows to the client table.";
    }   
    ?>



<?php
include("includes/footer.php"); 


?>




