<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // sanitize form data
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);
    
    // validate form data
    if (empty($name) || empty($email) || empty($message)) {
        header("Location: index.html?status=error");
        exit;
    }
    
    // set up email headers
    $to = "gs.giannoulis54@gmail.com";
    $subject = "New message from website";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // build email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone: $phone\n";
    $email_message .= "Message:\n\n$message";
    
    // send email
    if (mail($to, $subject, $email_message, $headers)) {
        header("Location: index.html?status=success");
        exit;
    } else {
        header("Location: index.html?status=error");
        exit;
    }
} else {
    header("Location: index.html");
    exit;
}
?>
