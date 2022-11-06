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
	        <!-- <input type="button" class="btn btn-primary btn-sm"  value="logout" onclick="window.location.href='logout.php';"/> -->
			</div>
            </nav>
        </header>
    <br/><br/>
    
    <center>
        <h1>USER PROFILE </h1><br>
    <form action="add.php" method="post" name="form1">
        <div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control-plaintext" id="name"  name="name">
		</div><div class="form-group">
			<label for="age">Age:</label>
			<input type="text" class="form-control-plaintext" id="age"  name="age">
		</div><div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control-plaintext" id="email" name="email" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$">
		</div><div class="form-group">
			<label for="email">City:</label>
			<input type="text" class="form-control-plaintext" id="city"  name="city">
		</div>
        <div class="form-group">
         <input type="submit" name="Submit" value="Add">
    </div>
    </form>
</center>
</body>
</html>