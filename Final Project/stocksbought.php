<?php


$pageTitle = "Stocks Bought";

include("includes/header.php");

?>

<h3><?php echo $pageTitle  ?></h3>
	         
<?php

$names = $_POST['name'];

echo $names;

$splitage = explode(" ", "$names ");
 
$string1 =  $splitage[0];
$string2 =  $splitage[1];
    
$yep = $_POST['company'];  
    
echo $yep
    
//SET @var_name := $yep
    
?>

<?php
    
    if(!($stmt = $mysqli->prepare("INSERT INTO port_stock (stock_id, portfolio_id, purchase_price, qty, worth) VALUES ((SELECT stock_id from stock s WHERE s.company = '$yep' ),(SELECT portfolio_id from portfolio p 
INNER JOIN client c ON c.client_id = p.client_id
WHERE c.first_name = ? AND c.last_name = ? ), (SELECT d.closed
FROM daily d
INNER JOIN stock s ON s.stock_id = d.stock_id
WHERE s.company = '$yep'
HAVING max( d.dateof ))
 ,?, purchase_price*qty)")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    
if(!($stmt->bind_param("ssi",$string1, $string2, $_POST['qty']))){
	echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
}
            
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    else {
        echo "Added " . $stmt->affected_rows . " rows to the stock list. ";
    }   
    ?>

<?php
include("includes/footer.php"); 


?>