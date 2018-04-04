

<?php 
include 'config.php';
// define variables and set to empty values
$password="";
$password_error="";

$email ="";
$email_password="";

$success = ""; 


/*
//=================================mysql connection
      $servername = "localhost";
      $username = "root";
      $password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
*/      
      

if(!$conn)
{
    echo "not connected to the server";
}
if(!mysqli_select_db($conn, 'mysql'))
 {
    echo "database not selected";
 }
//=================================mysql connection end

session_start();
if(isset($_SESSION['login']))
{
         header("Location: http://localhost/welcome.php");
}
//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {


          $email = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 

    
      $pass_sql = "SELECT password FROM paint_users WHERE email = '$email'";
      $pass_result = mysqli_query($conn,$pass_sql);    

    while ($pass_row = $pass_result->fetch_assoc()) {
       
        
    if(password_verify($password, $pass_row['password']))
      {
      //$sql = "SELECT email FROM paint_users WHERE email = '$email' and password = '$password'";
      /*
      $sql = "SELECT email FROM paint_users WHERE email = '$email'";
      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);
      
    
    

      if($count == 1) {
         session_start();
         $_SESSION['login_user'] = $email;
         header("Location: http://localhost/welcome.php");
      }else {
         $success = "Your Login Name or Password is invalid";
      }
      */
        
        
         $_SESSION['login_user'] = $email;
         $_SESSION['login'] = "yes";
         header("Location: http://localhost/welcome.php");
        
        
        
        
      }

    else{
         $success = "Your Login Name or Password is invalid";
    }
        
        
        
        
        
    }
       }
    /*
      //$sql = "SELECT email FROM paint_users WHERE email = '$email' and password = '$password'";
      
      $sql = "SELECT email FROM paint_users WHERE email = '$email'";
      $result = mysqli_query($conn,$sql);
      
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
    
    
      session_start();

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         $_SESSION['login_user'] = $email;
         header("Location: http://localhost/welcome.php");
      }else {
         $success = "Your Login Name or Password is invalid";
      }
      */




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