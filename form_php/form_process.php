<?php 

// define variables and set to empty values
$name_error=""; $pass1_error =""; $pass2_error=""; $email_error =""; $phone_error =""; $url_error = "";
$name =""; $pass1 =""; $pass2 =""; $email =""; $phone =""; $message =""; $success = "";

//form is submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }

    
    if (empty($_POST["pass1"])) {
    $pass1_error = "Password is required";
  } else {
    $pass1 = test_input($_POST["pass1"]);
    // check if e-mail address is well-formed
    if (strlen((string)$pass1)<6) {
      $pass1_error = "at least 6 characters are required"; 
    }
  }
    
if (empty($_POST["pass2"])) {
    $pass2_error = "Password is required";
  } else {
    $pass2 = test_input($_POST["pass2"]);
    // check if e-mail address is well-formed
    if (strlen((string)$pass2)<6) {
      $pass2_error = "at least 6 characters are required"; 
    }
    else if($pass1!=$pass2)
    {
        $pass2_error="Password does not match";
    }
  }
    
    
  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_error = "Invalid email format"; 
    }
  }
    

  
  if (empty($_POST["phone"])) {
    $phone_error = "Phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    // check if e-mail address is well-formed
    if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)) {
      $phone_error = "Invalid phone number"; 
    }
  }

  
  if ($name_error == '' and $email_error == '' and $phone_error == '' and $pass1_error == '' and $pass2_error == ''){
      unset($_POST['submit']);
      
    }
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}