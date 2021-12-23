<?php
session_start();
include('connection.php');
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="Signup.css" media="all" />
</head>
<body>




  <?php
  if(isset($_POST["add"] ) ){

    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }



    if(!$_POST["username"]){
        $nameError = "please put your name here <br>";
    }else{
        $name = validateFormData($_POST["username"]);

    }


    if($_POST["email"]){
        $email = validateFormData($_POST["email"]);
    }

    if(!$_POST["password"]){
        $passwordError = "please put your cars registration number<br>";
    }else{
        $password = validateFormData($_POST["password"]);
    }





    if($name && $email && $password){
        $query = "INSERT INTO `user_info` (`id`, `name`,`email`, `password`) VALUES (NULL, '$name','$email', '$password' );";

        if( mysqli_query( $conn, $query ) ) {
            echo "New record in database!";
        //      $_SESSION["username"] = $row['name'];
        // $_SESSION["user_id"] = $row['id'];
        header('Location: Signin.php');
        } else {
            echo "Please Fill up the necessaary information". $query . "<br>" . mysqli_error($conn);
        }

    }

    mysqli_close($conn);

}

  ?>
	
	<div class="signup">
	<img src="Capture1.PNG" alt="pic" />
		<div class="left-box">
		
			<h1>Sign Up</h1>
			 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">
			<input type="text" name="username" placeholder="username" />
			<input type="text" name="email" placeholder="Email" />
			<input type="text" name="password" placeholder="Password" />

			<input type="submit" name="add" placeholder="Sign Up" />
		
		</form>
		</div>
		
	
	
	</div>
	
	
	
</body>
</html>