<?php
	require_once('./_private/bundle.php');
  
  	if (isset($_POST['register'])) 
	{
		$name = isset($_POST['name']) ? $_POST['name'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
		$pass = md5($pass);
		//Code xử lý, insert dữ liệu vào table
		
		if($name == "" && $email == "" && $pass == ""){
			echo'<script language="javascript">alert("Nhập đầy đủ thông tin");window.location="login.php";</script>';
		}
		$sql = "SELECT * FROM user WHERE name='$name' OR email='$email'";
		$result = $DB->query($sql);
		if(mysqli_num_rows($result) > 0){
			echo'<script language="javascript">alert("Tài khoản đã tồn tại"); window.location="login.php";</script>';
		}else{
			$sql = "INSERT INTO `user` (`name`,`email`, `pass`)
			VALUES ('$name','$email', '$pass')";
		}
	  	$exec=$DB->query($sql);
  	}
  
  	if(isset($_POST['login']))
  	{
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
		$pass = md5($_POST["pass"]);
		$exec = $DB->get('select idu from user where email = "'.$email.'" and pass = "'.$pass.'"');
		if($exec){
			echo'<script lange="javascript">alert("Đăng nhập thành công!!!!");</script>';
			setcookie('email', $email, time()+86400);
			setcookie('pass', $pass, time()+86400);
			header("Location: /index.php");
			exit;
		}
		else{
			echo'<script language="javascript">alert("Tài khoản hoặc mật khẩu không đúng!!!!"); window.location="login.php";</script>';
		}
	  	$exec=$DB->query($sql);
	}

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Wellcome Money Lover </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="login.css">
	</head>
	<body>
		<h2>Đăng ký / Đăng nhập</h2>
		<div class="container" id="container">
  			<div class="form-container sign-up-container">
    			<form action="login.php" method="POST">
      				<h1>Create Account</h1>
      				<input type="text" name="name" placeholder="Name" />
      				<input type="email" name="email" placeholder="Email" />
      				<input type="password" name="pass" placeholder="Password" />
      				<button type="submit" name="register">Sign Up</button>
    			</form>
  			</div>
  			<div class="form-container sign-in-container">
    			<form action="login.php" method="POST">
      				<h1>Sign in</h1>
      				<input type="email" name="email" placeholder="Email" />
      				<input type="password" name="pass" placeholder="Password" />
      				<button type="submit" name="login">Sign In</button>
    			</form>
  			</div>
  			<div class="overlay-container">
    			<div class="overlay">
      				<div class="overlay-panel overlay-left">
        				<h1>Welcome Back!</h1>
        				<p>To keep connected with us please login with your personal info</p>
        				<button class="ghost" id="signIn">Sign In</button>
      				</div>
     				<div class="overlay-panel overlay-right">
        				<h1>Hello, Friend!</h1>
        				<p>Enter your personal details and start journey with us</p>
        				<button class="ghost" id="signUp">Sign Up</button>
      				</div>
    			</div>
  			</div>
		</div>
	</body>
	<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
  		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
  		container.classList.remove("right-panel-active");
	});
	</script>
</html>