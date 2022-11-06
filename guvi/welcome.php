<!DOCTYPE html>
<html>
<head>
	<title>GUVI</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<header>    
			<nav class="navbar navbar-dark bg-dark ">
				<div class="text-right ">
				<button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='logout.php';"">logout</button> 
			</div>
            </nav>
        </header>

		<?php
//including the database connection file
include_once("config.php");

// select data in descending order from table/collection "users"
$filter = array();
$options = array(
    "sort" => array("_id" => -1),
);
$result = $db->users->find($filter, $options);
?>


<!-- <a href="userprofile.php">Add New Data</a><br/><br/> -->

    <table width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Age</td>
        <td>Email</td>
		<td>City</td>
        <td>Update</td>
    </tr>
    <?php   
    foreach ($result as $res) {
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['age']."</td>";
        echo "<td>".$res['email']."</td>";  
		echo "<td>".$res['city']."</td>";
        echo "<td><a href=\"edit.php?id=$res[_id]\">Edit</a> | <a href=\"delete.php?id=$res[_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";     
    }
    ?>
    </table>
</body>
</html>





