<html>
<head>
    <title>Add Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
<script src="sweetalert2/dist/sweetalert2.min.js"></script>
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

if(isset($_POST['Submit'])) {   
    $user = array (
                'name' => $_POST['name'],
                'age' => $_POST['age'],
                'email' => $_POST['email'],
                'city'=> $_POST['city']
            );
        
    // checking empty fields
    $errorMessage = '';
    foreach ($user as $key => $value) {
        if (empty($value)) {
            $errorMessage .= $key . ' field is empty<br />';
        }
    }
    
    if ($errorMessage) {
        // print error message & link to the previous page
        echo '<span style="color:red">'.$errorMessage.'</span>';
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";  
    } else {
        //insert data to database table/collection named 'users'
        $db->users->insertOne($user);
        
        //display success message
        // echo '<script>alert("Data added successfully.");header("Location: welcome.php");</script>';
        echo "<script>alert('Data Added Successfully');document.location='welcome.php'</script>";
        // header("Location: welcome.php"); 
        // echo "<br/><a href='welcome.php'>View Result</a>";
    }
}
?>
</body>
</html>