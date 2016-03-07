<?php

$description = "This page has to do with the advisors";
$pageTitle = "Advisors";

include("includes/header.php");

$cname = $_POST['cname'];

?>

<h3><?php echo $pageTitle  ?></h3>
	        
        
<?php
    
    if(!($stmt = $mysqli->prepare("INSERT INTO stock (company, symbol) VALUES (?,?)")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    
if(!($stmt->bind_param("ss",$_POST['cname'],$_POST['csymbol']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
            
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    else {
        echo "Added " . $stmt->affected_rows . " rows to the stock list. Please also enter today's stock information for the new inputted stock.";
    }   
     $stmt->close();
    ?>
            <div>
<form method="post" action="dailyadded.php?<?php echo  "compname=$cname"?>">
<label>Add Today's Stock info for <?php echo $cname ?></label>
    <div>
    <input type="text" name="open" placeholder="Open Price" required/>
    <input type="text" name="close" placeholder="Close Price" required/>
    <input type="text" name="date" placeholder="yyyy-mm-dd" required/>
    <input type="submit" name="insert" value="Add" required/>
</div>
           
</form>
</div>


<?php
include("includes/footer.php"); 


?>






