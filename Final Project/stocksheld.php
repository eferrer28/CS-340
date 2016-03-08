<?php

$pageTitle = "Stock List";

include("includes/header.php");

?>


<h3><?php echo $pageTitle  ?></h3>

<!-- This displays the stocks -->

        <div>
	<table class="table table-bordered">
        <label>This is the Stock Table</label>

		<tr>
            <td>Stock_ID</td>
			<td>Company</a>
			<td>Symbol</td>
			
		</tr>

<?php
    
    if(!($stmt = $mysqli->prepare("SELECT s.stock_id, s.company, s.symbol
FROM stock s
 ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($stock_id, $company, $symbol))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        

        while($stmt->fetch()){
        echo "<tr><td>  $stock_id </td> <td>  $company </td><td>  $symbol  </td></tr> ";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for stocks -->  

<form method="post" action="addstock.php/">
<label>Add Stock</label>
    <div>
    <input type="text" name="cname"  placeholder="Company Name" required/>
    <input type="text" name="csymbol" placeholder="Stock Symbol" required/>
    <input type="submit" name="insert" value="Add" />
</div>
           
</form>

<form method="post" action="deletestock.php" onsubmit="return confirm('WARNING! Submitting this form will delete the stock and everything in the daily table pertaining to this stock. Do you still wish to proceed?');">
<label>Delete Stock</label>
    <table>
    <tr>
    <td>
    <select class="form-control" id="sel1" name="company">
     <?php           
        if(!($stmt = $mysqli->prepare("SELECT company FROM stock
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
        echo "<option>". $company ."</option>";
    }
        $stmt->close();
    ?>
    </select>
    </td>
    </tr> 
        
    </table>
        <span>
    <input type="submit" name="insert" value="Delete" />
            </span>
</form>

<!-- This displays the update -->
 
<form method="post" action="updatestock.php">
<label>Update Stock</label>
    <table>
    <tr>
    <td>
    <select class="form-control" id="sel1" name="company">
     <?php           
        if(!($stmt = $mysqli->prepare("SELECT company FROM stock
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
        echo "<option>". $company ."</option>";
    }
        $stmt->close();
    ?>
    </select>
    </td>
    </tr> 
        
    </table>
        <input type="text" name="csymbol" placeholder="Stock Symbol" required/>
     <input type="submit" name="insert" value="Update" />
           
</form>

<?php
include("includes/footer.php"); 

?>