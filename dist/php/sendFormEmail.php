<html>
  <head>
    <meta charset="UTF-8">
    <meta http_equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title></title>
    <meta name="description" content="We provide easy car access, high security locks & alarm systems for your storage. Rent a container at only £125 per month.">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.svg" alt="Favicon"/>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/main.css">

  </head>

<?php

if(isset($_POST['email'])) {
 
    $email_to = "samstoppani@gmail.com";
    $email_subject = "Test Enquiry";
 
    function died($error) {
        // error code
        echo "<body style=' background-color: #2A9D8F;'>";
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required
    $phone = $_POST['phone']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
  }

    $phone_exp = "/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/";

  if(!preg_match($phone_exp, $phone)) {
    $error_message .= 'The Phone Number you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Phone Number: ".clean_string($phone)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>
<body>
    <div class="row h-100" id="contactFormSent">
        <h1 id="companyName"> 
            <span class="large">FLEXIBLE</span> <br> <span>SELF STORAGE<span>
        </h1>                
        <br>
        <h4 class="col text-center">
            Thank you for getting in touch. We will contact you shortly.
        </h4>
    </div>
</body>
<?php
 
}
?>

</html>