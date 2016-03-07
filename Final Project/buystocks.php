<?php

$pageTitle = "Stock List";

include("includes/header.php");

?>
<h3><?php echo $pageTitle  ?></h3>

<form method="post" action="stocksbought.php">
<label>Add Stock to Client Portfolio</label>
    <div class="form-group">
        <label>Choose a client</label>
    <select class="form-control" id="sel1" name="name">
     <?php           
        if(!($stmt = $mysqli->prepare("SELECT c.first_name, c.last_name FROM client c
INNER JOIN portfolio p ON p.portfolio_id = c.client_id
WHERE c.client_id = p.client_id
")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
          
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($first_name, $last_name))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }  
    while($stmt->fetch()){
        echo "<option>". $first_name .' ' . $last_name ."</option>";
    }
        $stmt->close();
    ?>
    </select>
    </div> 
        <div class="form-group">
            <label>Choose a stock</label>
    <select class="form-control" id="sel1" name="company">
     <?php           
        if(!($stmt = $mysqli->prepare("SELECT s.company FROM stock s
")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
          
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($company))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }  
    while($stmt->fetch()){
        echo "<option>". $company . "</option>";
    }
        $stmt->close();
    ?>
    </select>
    </div>
    
        <div>
    <input type="text" name="qty"  placeholder="Quantity" required/>

    <input type="submit" name="insert" value="Add" />
</div>

</form>


<?php
include("includes/footer.php"); 

?>