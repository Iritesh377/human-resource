<!DOCTYPE html>
<html>

<head>
	<link rel="icon" type="image/x-icon" href="/img/logo.png">
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<form action="inc/login.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>User Name</label>
		<input type="text" name="uname" placeholder="User Name"><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>

	</form>
</body>

</html>