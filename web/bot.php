<?php

$token = "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU";

$update = json_decode($_POST[Update]);

$chatID = end($updata->result)->message->chat->id;

$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=$chatID&text=\"Hi! Im Bot\"";
file_get_contents($url);

?>
