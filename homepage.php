
<!DOCTYPE html>

<html>
<head >
  <title>Homepage</title>
<br><br><br><br><br><br><br>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Courier New;}
form {border: 2.5px background: linear-gradient(#33ccff,#ff99cc); width:50%;}

.container {
  padding: 15px;
  background: linear-gradient(#ff99cc,#33ccff);
}
input[type=text],input[type=password]{
  width: 40%;
  padding: 12px 15px;
  margin: 10px 0;
  display: inline-block;
  border: 1.5px solid #aaa;
  box-sizing: border-box;
}

button {
  background-color: green;
  color: black;
  padding: 10px 20px;
  margin: 8px 0;
  border: thick;
  cursor: pointer;
  width: 53%;

}

button:hover {
  opacity: 1;
}



</style>
</head>
<body style="background: linear-gradient(#33ccff,#ff99cc);">
<center>
<h1>Home Page</h1>

<form action="homepage.php" method="post">

<button type="submit" name="Logout" id="Logout">Logout</button>
<button type="submit" name="Reset" id="Reset">Reset Password</a></button>
</center>



<?php
		

   
   if (isset($_POST['Logout'])){
 	  	$dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "logs";

        $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

        $user = $_POST['uname'];

        $select = "select * from logindb where Username = '$user' ";
        $result = mysqli_query($con, $select);
        $num = mysqli_num_rows($result);

	   date_default_timezone_set('Asia/Taipei');
	   $time = date("Y-m-d h:i:s");
	   $_SESSION['Username']  = $user;
	   $act3 =  "LOGOUT";
	   $next1 = "SELECT * FROM eventlog ORDER BY id DESC LIMIT  1";
	   $find1 = mysqli_query($con, $next1);
	   $anotherOne1 = mysqli_fetch_assoc($find1);
	   $name = $anotherOne1['user_id'];
	   $queryy = mysqli_query($con, "INSERT INTO eventlog (Activity, user_id, date_time) VALUES ('$act3', '$name', '$time')"); 
   
   echo "<script>alert('ACCOUNT LOGOUT!!!');
   location.href='Login.php';
   </script>";

      }
        if (isset($_POST['Reset'])){

   echo "<script>location.href='resetp.php';
   </script>";
}
   ?>
</form>
</body>
</html>