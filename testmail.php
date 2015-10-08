<?php 
require("/sendgrid-php/sendgrid-php.php");
echo "i m inside sendgridsending mail to". $email;

$user = "shravansji1234";
$pass = "shrsji123";

$sendgrid = new SendGrid($user, $pass);

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

?>
