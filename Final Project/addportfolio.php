<?php

$pageTitle = "Create Portfolio";

include("includes/header.php");

?>
<h3><?php echo $pageTitle  ?></h3>

<form method="post" action="portfolioadded.php">
<label>Create a Portfolio</label>
    <div class="form-group">
        <label>Choose a client</label>
    <select class="form-control" id="sel1" name="name">
     <?php           
        if(!($stmt = $mysqli->prepare("SELECT c.first_name, c.last_name FROM client c
LEFT JOIN portfolio p ON p.portfolio_id = c.client_id
WHERE p.portfolio_id IS NULL
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

    
        <div>
            <label>Pick a Date</label>
    <input type="text" name="date"  placeholder="yyyy-dd-mm" id="datepicker"  required/>

    <input type="submit" name="insert" value="Add" />
</div>

</form>


<?php
include("includes/footer.php"); 

?>