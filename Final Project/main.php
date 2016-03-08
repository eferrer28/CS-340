
<?php

$pageTitle = "Home Page";

include("includes/header.php");


?>

    
<h3><?php echo $pageTitle  ?></h3>





<h2>Quick Links For TA's for Grading</h2>

<ul>
    <h3>Inserts</h3>
    <li><a href="advisors.php">Insert into Advisor Table</a></li>
    <li><a href="managedby.php?fname=Peter&lname=Adams">Insert into Client Table</a></li>
    <li><a href="addportfolio.php">Insert into Portfolio Table</a></li>
    <li><a href="buystocks.php">Insert into Port_stock Table</a></li>
    <li><a href="stocksheld.php">Insert into Stock Table</a></li>
    <li><a href="advisors.php">Insert into Daily Table</a></li>
</ul>

<ul>
<h3>Delete/Update</h3>
    <li><a href="stocksheld.php">Delete/Update Stock</a></li>
</ul>

<ul>
<h3>Select Queries</h3>
    <li><a href="clientlist.php">Client, Stock, Port_stock, and Portfolio Tables</a></li>
    <li><a href="stocks.php"> Stock and Daily Tables</a></li>
    <li><a href="managedby.php?fname=Peter&lname=Adams"> Advisor and Client Tables</a></li>
</ul>


<?php
include("includes/footer.php"); 


?>
