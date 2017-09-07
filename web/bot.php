<?php

$token = "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU";

$content = file_get_contents("php://input");
$update = json_decode($content, TRUE);
$message = $update[message][text];
$chatID = $updata[message][chat][id];

//$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=$chatID&text=\"TEST: $message\"";
//file_get_contents($url);

if(strpos($message,"/help"))
{
  sendMessage("Hello!\nIm Shkolo_Bot",$chatID);
}
function sendMessage($message,$chatID)
{
  $url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=$chatID&text=\"TEST: $message\"";
  file_get_contents($url);
}
?>
