<?php

//Turn on error reporting

ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","ferrere-db","PQSCSwRpM2bW4eTe","ferrere-db");
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>



<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $pageTitle  ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<a class="navbar-brand" href="#">Title</a>
	<ul class="nav navbar-nav">
		<li class="active">
			<a href="#">Home</a>
		</li>
		<li>
			<a href="#">Link</a>
		</li>
	</ul>
</nav>
</head>

<body>
    <div class="main-container">





    
    page = suggest a media ite


<p>This is a project for CS 290 - Intro to Computer Databases. The point of this project was to demonstrate the use of a SQL database using PHP. The </p>







<select name="" id="input" class="form-control">
	    <option value="">-- Select One --</option>
</select>

 <div class="form-group">
  <label for="sel1">Select list:</label>
  <select class="form-control" id="sel1">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
  </select>
</div>


<form method="post">
    <fieldset>
        <legend>Select An Advisor</legend>
    <table>
    <tr>

    <td>
    <select class="form-control" id="sel1" name="name">
    <option value="">-- Select One --</option>
    <option>Peter Adams</option>
    <option>Marcus Blackwell</option>
    <option>Angela Simpsons</option>
            </td>
    </tr> 
        
    </table>
        <span>
    <button type="button" class="btn btn-primary">Submit</button>
            </span>
</fieldset>
</form>

<form>
<fieldset>
<legend>Client</legend>
    <select>
    <option value="">-- Select One --</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    </select>
    		<input type="submit" value="Run Filter" />
</fieldset>

</form>

        

<div>
	<form method="post" action="addperson.php"> 

		<fieldset>
			<legend>Name</legend>
			<p>First Name: <input type="text" name="FirstName" /></p>
			<p>Last Name: <input type="text" name="LastName" /></p>
		</fieldset>

		<fieldset>
			<legend>Date of Birth</legend>
			<p>Age: <input type="text" name="Age" /></p>
		</fieldset>

		<fieldset>
			<legend>Homeworld</legend>
                <select name="Homeworld">
                    			</select>

		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>
        

        
        
<!-- This displays the advisors -->

        <div>
	<table class="table table-bordered">
		<tr>
			<td>Advisors</td>
		</tr>
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Date of Birth</td>
		</tr>

<?php
    
    if(!($stmt = $mysqli->prepare("SELECT first_name, last_name, dob FROM advisor ")))
    {
        echo "Prepare failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
         
    if(!$stmt->execute())
    {
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
    if(!$stmt->bind_result($first_name, $last_name, $dob))
    {
     echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;   
    }
        
        
        while($stmt->fetch()){
        echo "<tr>\n<td>\n" . $first_name . "\n</td>\n<td>\n" . $last_name . "\n</td>\n<td>\n" . $dob . "\n</td>\n</tr>";
}
    $stmt->close();
    
    ?>
	</table>
</div>        
      <!-- End the display for advisors -->  
        
</div>


</body>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</html>