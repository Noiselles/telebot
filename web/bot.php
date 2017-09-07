<?php

$token = "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU";
$content = file_get_contents("php://input");
$update = json_decode($content, TRUE);
$message = $update[message][text];
$chatID = $updata[message][chat][id];

//$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=$chatID&text=\"TEST: $message\"";
//file_get_contents($url);
public function sendMessage($message,$chatID)
{
  $token = "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU";
  $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=$chatID&text=$message";
  file_get_contents($url);
}
if(strpos($message,"/start") !== false)
{
  sendMessage("Hello!\r\nIm Shkolo_Bot v0.0.2",$chatID);
}
?>
