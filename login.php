<?php
    session_start();
    include "koneksi.php";
    if(isset($_POST['login'])){
        $sql = mysqli_query($con, "SELECT * FROM tb_guru WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
        $hasil = mysqli_num_rows($sql);
		if($hasil > 0){ 
			$hasil = mysqli_fetch_assoc($sql);
			if($hasil['jabatan']=="Kepala Sekolah"){
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['password'] = $_POST['password'];
				$_SESSION['jabatan'] = "Kepala Sekolah";
				echo "<script>alert('Welcome')</script>";
            	echo "<script>document.location.href ='admin/dashboard-admin.php'</script>";
			}elseif($hasil['jabatan']=="Wakasek"){
				$_SESSION['username'] = $_POST['username'];
				$_SESSION['password'] = $_POST['password'];
				$_SESSION['level'] = "Wakasek";
				echo "<script>alert('Welcome')</script>";
            	echo "<script>document.location.href ='admin/dashboard-admin.php'</script>";
			}else{
				echo "<script>alert('Anda tidak bisa memasuki mode admin')</script>";
			}	
		}else{
			echo "<script>alert('Wrong username or password')</script>";
		}
    }
?>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/login/images/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">Login To Admin Page</span>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="enter your username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="enter your password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
                        <input type="submit" name="login" value="Login" class="login100-form-btn">
					</div>
					<div class="container-login100-form-btn">
                         <a href="index.php" class="login100-form-btn">Back To Dashboard</a>
					</div>	
					<div class="text-center p-t-136">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/login/vendor/select2/select2.min.js"></script>
	<script src="assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="assets/login/js/main.js"></script>
</body>
</html>