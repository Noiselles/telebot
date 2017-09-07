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
  $sendURL = "https://api.telegram.org/bot" . "399710240:AAG5WJkoNlgPYL2RPOfZ4BeEmKlvuTimfuU" . "/sendMessage?chat_id=$CHID&text=" . urlencode($msg);
  file_get_contents($sendURL);
}
if(strpos($message,"/start") !== false)
{
  sendMessage("Hello " . $update[message][from][first_name] . "! \nIm Shkolo_Bot v0.0.4 \n \nEnter /help to view the commands.",$chatID);
}
if(strpos($message,"/help") !== false)
{
  sendMessage("Shkolo_Bot | Commands: \n /lessons -- view homework / timetable",$chatID);
}
if(strcasecmp($message,"/lessons") == 0)
{
  sendMessage("Shkolo_Bot | /lessons commands: \n  -mo Monday\n  -tu Tuesday\n  -we Wednesday\n  -th Thursday\n  -fr Friday",$chatID);
}
if(strcasecmp($message,"/lessons -mo") == 0)
{
  sendMessage("",$chatID);
}
if(strcasecmp($message,"/lessons -tu") == 0)
{
  sendMessage("",$chatID);
}
if(strcasecmp($message,"/lessons -we") == 0)
{
  sendMessage("",$chatID);
}
if(strcasecmp($message,"/lessons -th") == 0)
{
  sendMessage("",$chatID);
}
if(strcasecmp($message,"/lessons -fr") == 0)
{
  sendMessage("",$chatID);
}
if(strpos($message,"/lessons -mo -add") !== false)
{
  try
  {
    if(!file_exists("Monday.txt"))
    {
      $file = fopen("Monday.txt","w+");
      fwrite($file,json_encode(array("","","","","","","","")));
      fclose($file);
    }
    $fcont = json_decode(file_get_contents("Monday.txt"));
    $text = substr($message, strpos($message, '-add') + 1, strlen($message));
    $fcont[substr($message,-1)] = $text;
    sendMessage("Success! Data: \n" . $text,$chatID);
  } catch (Exception $e) {
    sendMessage("Err!",$chatID);
  }
}
if(strpos($message,"/lessons -tu -add") !== false)
{
  sendMessage("Success!",$chatID);
}
if(strpos($message,"/lessons -we -add") !== false)
{
  sendMessage("Success!",$chatID);
}
if(strpos($message,"/lessons -th -add") !== false)
{
  sendMessage("Success!",$chatID);
}
if(strpos($message,"/lessons -fr -add") !== false)
{
  sendMessage("Success!",$chatID);
}
?>
