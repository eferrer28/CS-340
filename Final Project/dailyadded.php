<?php

$description = "This page has to do with adding to the daily stock";
$pageTitle = "Insert Today's Daily Stock Numbers";

include("includes/header.php");

?>

<h3><?php echo $pageTitle  ?></h3>
	        
        
<?php
    
    if(!($stmt = $mysqli->prepare("INSERT INTO daily (stock_id, opened, closed, dateof) VALUES ((SELECT stock_id from stock s WHERE s.company = ? ),?,?,?)")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    
if(!($stmt->bind_param("sdds",$_GET['compname'],$_POST['opened'],$_POST['closed'], $_POST['dateof']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
            
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    else {
        echo "Added " . $stmt->affected_rows . " rows to the daily table for this stock. And the latest stock information has been added";
    }   
    ?>

<?php
include("includes/footer.php"); 
?>