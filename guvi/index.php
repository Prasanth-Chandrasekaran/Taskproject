
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
			<button type="button" class="btn btn-primary btn-sm" id="register">Register</button> <button type="button" class="btn btn-primary btn-sm" id="login">Login</button>
			</div>
			
            </nav>
        </header>
<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>

	<form   id="register_form" name="form1" method="post">
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email" pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$">
			<!-- <input type="email" class="form-control" id="email" placeholder="Email" name="email" pattern="[^ @]*@[^ @]*"> -->
		</div>
		<div class="form-group">
			<label for="pwd">Phone:</label>
			<input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
		</div>
		<div class="form-group" >
			<label for="pwd">City:</label>
			<input type="text" class="form-control" id="city" placeholder="City" name="city">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password" placeholder="Password" name="password">
		</div>
		<div class="text-center">
		<input type="button" name="save" class="btn btn-primary" value="Register" id="butsave"></div>
	</form>
	<form id="login_form" name="form1" method="post" style="display:none;">
		
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email_log" placeholder="Email" name="email">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="password_log" placeholder="Password" name="password">
		</div>
		<input type="button" name="save" class="btn btn-primary" value="Login" id="butlogin">
	</form>
</div>

<script>
$(document).ready(function() {
	$('#login').on('click', function() {
		$("#login_form").show();
		$("#register_form").hide();
	});
	$('#register').on('click', function() {
		$("#register_form").show();
		$("#login_form").hide();
	});
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var name = $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var city = $('#city').val();
		var password = $('#password').val();
		if(name!="" && email!="" && phone!="" && password!="" ){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					type: 1,
					name: name,
					email: email,
					phone: phone,
					city: city,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#butsave").removeAttr("disabled");
						$('#register_form').find('input:text').val('');
						$("#success").show();
						$('#success').html('Registration successful !'); 						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Email ID already exists !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
	$('#butlogin').on('click', function() {
		var email = $('#email_log').val();
		var password = $('#password_log').val();
		if(email!="" && password!="" ){
			$.ajax({
				url: "save.php",
				type: "POST",
				data: {
					type:2,
					email: email,
					password: password						
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						location.href = "userprofile.php";						
					}
					else if(dataResult.statusCode==201){
						$("#error").show();
						$('#error').html('Invalid EmailId or Password !');
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>
</body>
</html>    




