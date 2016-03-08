<?php

$pageTitle = "Portfolio Created";

include("includes/header.php");

?>

<h3><?php echo $pageTitle  ?></h3>

<?php
    
$names = $_POST['name'];


$splitage = explode(" ", "$names ");
 
$string1 =  $splitage[0];
$string2 =  $splitage[1];
    
    ?>
        
<?php
    
    if(!($stmt = $mysqli->prepare("INSERT INTO portfolio (client_id, date_created) VALUES ((SELECT client_id from client  WHERE first_name = ?  AND last_name = ?),?)")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    
if(!($stmt->bind_param("sss", $string1, $string2, $_POST['date_created']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
            
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    else {
        echo "Added " . $stmt->affected_rows . " rows to the portfolio table! ";
    }   
    ?>

<?php
include("includes/footer.php"); 
?>