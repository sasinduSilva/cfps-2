<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer(true);

    $sentFrom = "info@cfpslawschool.com";

    $mail->isSMTP();
    $mail->SMPTPAuth = true;
    $mail->Host = "mail.cfpslawschool.net"
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = "riyard@thelanka.net"
    $mail->Password = "12nV10FILQMF"
    $mail->setFrom($email,$name);
    $mail->addAddress("info@cfpslawschool.com","Test")
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->send();

    echo "email sent";

    
    // Check that data was sent to the script
    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Please complete the form and try again.";
        exit;
    }


    
    
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>