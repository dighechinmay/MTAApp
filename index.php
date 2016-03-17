<?php



include("include/session.php");
include("include/mysql_dbconn.php");




if(isset($_POST['password']) and isset($_POST['username'])){

$username = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
 
$result = mysqli_query($con,$query) ;
$count = mysqli_num_rows($result);

	




if ($count == 1){


foreach($result as $row){
	
$_SESSION['userid'] = $row['userid'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['lastname'] = $row['lastname'];
	
}

//echo $_SESSION['firstname'];

 redirect_to("display.php");

}else{

$errors = "Invalid Login Credentials.";
}


}


function redirect_to( $location = NULL ) {
	if ($location != NULL) {
		header("Location: {$location}");
		exit;
	}
}


?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

      <link rel="stylesheet" href="css/login.css">

 </head>

	<body>	
		
<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>Login</strong>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">
                                Sign in</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Reset</button>
                        </div>
                    </div>
                    </form>
                </div>
				<font color="#CC0000"><p><?if(isset($errors)) echo $errors; ?></p>
            </div>
        </div>
    </div>
</div>
	</body>
</html>
