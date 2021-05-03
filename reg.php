<!DOCTYPE html>
 <?php 
  if(isset($_POST['submit'])){

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "logs";

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die("failed to connect!");

        // servername => localhost 
        // username => root 
        // password => empty 
        // database name => staff 
                  
        // Check connection 
        if($conn === false){ 
            die("ERROR: Could not connect. " 
                . mysqli_connect_error()); 
        } 
          
        // Taking all 5 values from the form data(input) 
        $Username = $_REQUEST['username']; 
        $psw = $_REQUEST['psw'];
        $psw_confirm = $_REQUEST['psw_confirm'];   
        $email=$_REQUEST['email']; 

        if($psw != $psw_confirm){
        	echo '<script>alert("Password Did not match!")</script>';
        mysqli_connect_error();	
			}
		$uppercase = preg_match('@[A-Z]@', $psw);
		$lowercase = preg_match('@[a-z]@', $psw);
		$number    = preg_match('@[0-9]@', $psw);

		if(!$uppercase || !$lowercase || !$number || strlen($psw) < 8) {
		  echo '<script>alert("Weak Password")</script>';
		}
        
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 	 echo '<script>alert("Input Correct Email")</script>';
}
		else{
			 echo " You have signed up!";
		}
				        
          
        // Performing insert query execution 
        // here our table name is college 
        $sql = "INSERT INTO logindb  VALUES (ID,'$Username',  
            '$psw','$email')"; 

        if(mysqli_query($conn, $sql)){ 
            echo "";  		

        } else{ 
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn); 
        } 
          
        // Close connection 
        mysqli_close($conn); 
       }
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  {font-family: Courier New;}
form {border: 2.5px background: linear-gradient(#33ccff,#ff99cc); width:50%;}
}
/* Add padding to containers */
.container {
  padding: 15px;
  background: linear-gradient(#ff99cc,#33ccff);
}

/* Full-width input fields */
input[type=text],input[type=password]{
  width: 40%;
  padding: 12px 15px;
  margin: 10px 0;
  display: inline-block;
  border: 1.5px solid #aaa;
  box-sizing: border-box;

  
}	

/* Set a style for the submit button */
.registerbtn {
    background-color: green;
  color: black;
  padding: 10px 20px;
  margin: 8px 0;
  border: thick;
  cursor: pointer;
  width: 40%;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: left;
}
.error_msg{

	color:red;
	padding: 10px 19px;
	margin:3px;
}
</style>
</head>
<body style="background: linear-gradient(#33ccff,#ff99cc);">
<br><br><br>	
<form action="reg.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
   <br>
    <label for="username"><b>Username</b></label><br>
    <input type="text" placeholder="Enter username" name="username" id="username" required>
<br>
    <label for="psw"><b>Password</b></label><bR>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

 	<input type="checkbox" onclick="Toggle()"> 
    <b>Show Password</b> 
	 <script> 
    // Change the type of input to password or text 
        function Toggle() { 
            var temp2 = document.getElementById("psw"); 
            if (temp2.type === "password") { 
                temp2.type = "text"; 
            } 
            else { 
                temp2.type = "password"; 
            } 
        } 
</script> 

<br>
	
    <label for="psw-confirm"><b>Confirm Password</b></label><br>
    <input type="password" placeholder="Confirm Password" name="psw_confirm" id="psw_confirm" required>

<input type="checkbox" onclick="Toggle1()"> 
    <b>Show Password</b> 
	 <script> 
    // Change the type of input to password or text 
        function Toggle1() { 
            var temp = document.getElementById("psw_confirm"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
</script> 

<br>

    <label for="email"><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
<br>
    <button type="submit" name= "submit" class="registerbtn">Register</button>
  </div>
  <div class="container signin">
    <p>Already have an account? <a href="Login.php">Sign in</a>.</p>
  </div>
</form>
</body>
</html>
