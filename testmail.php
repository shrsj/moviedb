<?php 
require("/sendgrid-php/sendgrid-php.php");
echo "<div>Confirmation successful Mail Has Been Sent!! ". $email . "<div>";

$apkey = "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";

$sendgrid = new SendGrid($apkey);

$username = 'Shravan';
$useradd =$email;
$from = "Admin@movies.sj";
$sub = "Movies site registration successful!!";

$email = new SendGrid\Email();
$email
    ->addTo($useradd)
    ->setFrom($from)
    ->setSubject($sub)
    ->setText('YAY!!! Congrats !!!! You have been successfully signed up for movies!!!! ')
;


$sendgrid->send($email);

// Or catch the error

try {
    $sendgrid->send($email);
} catch(\SendGrid\Exception $e) {
    echo $e->getCode();
    foreach($e->getErrors() as $er) {
        echo $er;
    }
}

?>
