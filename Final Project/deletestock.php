<?php

$pageTitle = "Stock Deleted!";

include("includes/header.php");

$cname = $_POST['company'];


?>

<h3><?php echo $pageTitle  ?></h3>
	        
        
<?php
    
    if(!($stmt = $mysqli->prepare("DELETE FROM stock 
    WHERE company = ? ")))
        
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }




    
if(!($stmt->bind_param("s",$_POST['company']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
            
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    else {
        echo "Deleted " . $cname . " from the stock table and all associated data with " . $cname ." from the daily table.";
    }   
    ?>