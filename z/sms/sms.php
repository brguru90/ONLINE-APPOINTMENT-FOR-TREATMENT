<?php
require_once('textmagic-sms-api/TextMagicAPI.php');
$api = new TextMagicAPI(array(
    "username" => "your_user_name",
    "password" => "your_API_password", 
));

$text = "Hello world!";
$phones = array(9991234567);
$is_unicode = true;

$api->send($text, $phones, $is_unicode);
?>