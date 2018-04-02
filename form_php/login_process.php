

<?php 

// define variables and set to empty values
$password="";
$password_error="";

$email ="";
$email_password="";

$success = ""; 



//=================================mysql connection
      $servername = "localhost";
      $username = "root";
      $password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
      
      

if(!$conn)
{
    echo "not connected to the server";
}
if(!mysqli_select_db($conn, 'mysql'))
 {
    echo "database not selected";
 }
//=================================mysql connection end





//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  session_start();


          $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 

    
    
          $sql = "SELECT email FROM paint_users WHERE email = '$email' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("email");
         $_SESSION['login_user'] = $email;
         
         header("location: welcome.php");
      }else {
         $success = "Your Login Name or Password is invalid";
      }
   }


/*
    
    
    
  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }
  }
    
if (empty($_POST["password"])) {
    $password_error = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
    if (strlen((string)$password)<6) {
      $password_error = "at least 6 characters are required"; 
    }

  }
  

    
    
  
  if ($email_error == '' and $password_error == ''){
      unset($_POST['submit']);
      
      
      
      
      
      
      $success="successful";
      
      
      



      

      
      
      $sql = "INSERT INTO paint_users (first, last, password, email, mobile, disability)
      VALUES ('$name', '$lastname', '$hashed_password', '$email', '$phone', '$da')";
      
      if(!mysqli_query($conn,$sql))
      {
              $success="Use the other email.";
      }
      else
      {
              $success="successful";
      }
      


      
      
      
      
      
      
      
      
 
      
      
      
    }
    
    
    
    
    else
    {
              $success="unsuccessful";

    }
     */
        //mysqli_close($conn);



//}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}