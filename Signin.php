<?php

  include 'connection.php';

  if(isset($_POST["submit"] ) ){
      

    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }

    if(!$_POST["username"]){
        $nameError = "please put your name here <br>";
    }else{
        $name = validateFormData($_POST["username"]);
//        echo $name;
    }


    if(!$_POST["password"]){
        $passwordError = "please put your password here<br>";
    }else{
        $password = validateFormData($_POST["password"]);
//        echo $password;
    }



$query="SELECT * FROM user_info WHERE name='$name' and password='$password'";
$result = mysqli_query($conn, $query);


    while($row = mysqli_fetch_assoc($result)){
//        die("reached");
//        echo $row;
       $_SESSION["username"] = $row['name'];
        $_SESSION["user_id"] = $row['id'];
        header('Location: Health care.html');
        //die("PASSED");
    }
      echo "<p style='background-color: #ce1834;
  color: white;
  font-size: 18px;
  text-align: center;
  width: 100%;
  padding:7px;
  margin:0px;' >Sorry login wasnt succesful. Please try again. Thank you!</p>
";
    mysqli_close($conn);
}

  ?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="Signin.css" media="all" />
</head>
<body>
	<img src="Loginimg.png" alt="picture" />
	<div class="login"> 
	<img src="images.png" alt="picture" class="images" />
	<h1>Login Here</h1>
   <!-- Login Form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="post">

      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login">
      <br>

      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input name="submit" type="submit" class="fadeIn fourth" value="Log In">
    </form>
	
	</div>
	
</body>
</html>