<html>
 <head>
  <title>Registration</title>
 </head>
 <body>

<?php include('form_php/form_process.php'); ?>
<link rel="stylesheet" href="form_css/form.css" type="text/css">
<div class="container">  
  <form id="contact" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <h3>Registration</h3>
    <h4>Please join us</h4>
    <fieldset>
      <input placeholder="Your Username" type="text" name="name" value="<?= $name ?>" tabindex="1" autofocus>
      <span class="error"><?= $name_error ?></span>
    </fieldset>
      
      
        <fieldset>
      <input placeholder="Please enter new password" type="password" name="name" value="<?= $pass1 ?>" tabindex="1" autofocus>
      <span class="error"><?= $pass1_error ?></span>
    </fieldset>
      
          <fieldset>
      <input placeholder="Confirm your password" type="password" name="name" value="<?= $pass2 ?>" tabindex="1" autofocus>
      <span class="error"><?= $pass2_error ?></span>
    </fieldset>
      
      
      
      
      
    <fieldset>
      <input placeholder="Your Email Address" type="text" name="email" value="<?= $email ?>" tabindex="2">
      <span class="error"><?= $email_error ?></span>
    </fieldset>
      
    <fieldset>
      <input placeholder="Your Phone Number" type="text" name="phone" value="<?= $phone ?>" tabindex="3">
      <span class="error"><?= $phone_error ?></span>
    </fieldset>
      
      


    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="Completed Registration">Submit</button>
    </fieldset>
    <div class="success"><?= $success ?></div>
  </form>
</div>
     

 </body>
</html>

