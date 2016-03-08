<?php

$pageTitle = "Update";

include("includes/header.php");

$cname = $_POST['company'];

?>

<h3><?php echo $pageTitle  ?></h3>
	        
        
<?php
    
    if(!($stmt = $mysqli->prepare("UPDATE stock SET symbol = ?
    WHERE company = ? ")))
        
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
  
if(!($stmt->bind_param("ss",$_POST['csymbol'],$_POST['company']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
            
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    else {
        echo "Updated " . $cname . "'s stock symbol!";
    }   
    ?>