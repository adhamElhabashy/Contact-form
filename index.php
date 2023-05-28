<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

 $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
 $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
 $phone = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
 $msg = filter_var($_POST["message"], FILTER_SANITIZE_STRING);


 echo $username . "<br>";
 echo $email . "<br>";
 echo $phone . "<br>";
 echo $msg . "<br>";
 $userError = "";
 $msgError = "";

 $formErrors = array();
 if (strlen($username) < 4) {
  $userError = "at least 4 characters in username";
 }
 
 if (strlen($msg) < 10) {
  $msgError = "at least 10 characters in message";
 }
 $headers = "From: " . $email . "\r\n";
 if (empty($formErrors)) {
  mail("adhammohamed8321@gmail.com", "Customer Message", $msg, $headers);
 }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="./css/contact.css">
 <title>contact form</title>
</head>

<body>
 <div class="container">
  <h1>Contact From Tutorial</h1>
  <div class="errors">
  </div>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
   <input type="text" name="username" class="name" placeholder="Username"
    value="<?php if (isset($username)) {echo $username;} ?>">
   <?php 
   if (isset($userError)) {
    echo $userError;
   }
   ?>
   <input type="text" name="email" class="email" placeholder="Email" value="<?php if (isset($email)) {echo $email;} ?>">
   <input type="text" name="phone" class="phone" placeholder="Phone Number"
    value="<?php if (isset($phone)) {echo $phone;} ?>">
   <textarea name="message" id="" placeholder="Your Message"><?php if (isset($msg)) {echo $msg;} ?></textarea>
   <?php 
   if (isset($msgError)) {
    echo $msgError;
   }
   ?>
   <input type="submit" value="SEND MESSAGE">
  </form>
 </div>

 <script src="./js/contact.js"></script>
</body>

</html>