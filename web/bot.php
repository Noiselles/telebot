<?php

$token = "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU";

$update = json_decode(file_get_contents("php://input"),true);

$chatID = end($updata->result)->message->chat->id;

$test = print_r($update);

$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=373416942&text=\"TEST: $test\"";
file_get_contents($url);

?>
