<?php

$token = "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU";
$content = file_get_contents("php://input");
$update = json_decode($content, TRUE);
$message = $update[message][text];
$chatID = $update[message][chat][id];
//$url = "https://api.telegram.org/bot" . $token . "/sendMessage?chat_id=373416942&text=\"TEST: 123\"";
//file_get_contents($url);
function sendMessage($msg,$CHID)
{
  $sendURL = "https://api.telegram.org/bot" . "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU" . "/sendMessage?chat_id=$CHID&text=$msg";
  file_get_contents($sendURL);
}
if(strpos($message,"/start") !== false)
{
  sendMessage("Hello! \r\n :D",$chatID);
}

?>
