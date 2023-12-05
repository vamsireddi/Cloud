<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=md5($_POST['password']);
$data=array('email'=>$username,'password'=>$password);
     $azfendpoint='https://bloodfunction.azurewebsites.net/api/HttpTrigger2?code=jH9Sp5VozmXkeVor95okuibi7jOg7bb0qmUlfUv3VeMYAzFuRq853Q==';
   $options = array(
        'http' => array(
            'method' => 'POST',
            'content' => json_encode($data)
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($azfendpoint, false, $context);
   if ($result !== FALSE) {
	$response = json_decode($result, true);

	// Check if authentication was successful
	if ($response['authenticated']) {
		$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	} else {
		// Authentication failed, handle accordingly
		 echo "<script>alert('Invalid Details');</script>";
	}
} else {
	// Error in communicating with Azure Function
	   echo "<script>not authenticated</script>";
  
}

}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>BloodBank & Donor Management System | Admin Login</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/banner.png);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">BloodBank & Donor Management System Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">

								

									<button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>
<a href="forgot-password.php" >Forgot Password</a>
								</form>
								<div class="card-footer text-center" style="padding-top: 30px;">
                                        <div class="small"><a href="../index.php" class="btn btn-primary">Back to Home</a></div>
                                    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
