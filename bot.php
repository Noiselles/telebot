<?php

$token = "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU";
$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=373416942&text=\"Hi! Im Bot\"";

file_get_contents($url);

?>
