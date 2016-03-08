<?php

$pageTitle = "Stock Added";

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
<form method="post" action="/~ferrere/340/final/dailyadded.php?">
<label>Add Today's Stock info for <?php echo $cname ?></label>
    <div>
            <input type="hidden" name="compname" value="<?php echo $cname?>"/>
    <input type="text" name="opened" placeholder="Open Price" required/>
    <input type="text" name="closed" placeholder="Close Price" required/>
    <input type="text" name="dateof" placeholder="yyyy-mm-dd" id="datepicker" required/> 

    <input type="submit" name="insert" value="Add" required/>
</div>
           
</form>
</div>


<?php
include("includes/footer.php"); 


?>