<?php

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = "gs.giannoulis54@gmail.com"; // Replace with your own email address
    $subject = "New message from website form";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    $body = "Name: " . $name . "\n\n" .
            "Email: " . $email . "\n\n" .
            "Message: " . $message;

    if(mail($to, $subject, $body, $headers)) {
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        echo "Error sending message. Please try again later.";
    }
}

?>
