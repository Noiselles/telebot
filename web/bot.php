<?php

$token = "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU";

$content = file_get_contents("php://input");
$update = json_decode($content, TRUE);
$message = $update["message"];

$chatID = end($updata->result)->message->chat->id;

$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=373416942&text=\"TEST: $message\"";
file_get_contents($url);

?>
