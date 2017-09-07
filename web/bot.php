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
function ShowLessons($day,$CHID)
{
  $data = json_decode(file_get_contents("$day.txt"));
  sendMessage(
    "Lesson: " . $data[0] . "\n" .
    "Lesson: " . $data[1] . "\n" .
    "Lesson: " . $data[2] . "\n" .
    "Lesson: " . $data[3] . "\n" .
    "Lesson: " . $data[4] . "\n" .
    "Lesson: " . $data[5] . "\n" .
    "Lesson: " . $data[6] . "\n" .
    "Lesson: " . $data[7] . "\n" ,
  $CHID);
}
function AddHomework($day,$homework,$CHID)
{
  try
  {
    if(!file_exists("$day.txt"))
    {
      $file = fopen("$day.txt","w+");
      fwrite($file,json_encode(array("","","","","","","","")));
      fclose($file);
    }
    $fcont = json_decode(file_get_contents("$day.txt"));
    $text = substr(substr($homework, strpos($homework, '-add') + 5, strlen($homework)),0,-1);
    $fcont[substr($homework,-1)] = $text;
    $file = fopen("$day.txt","w+");
    fwrite($file,json_encode($fcont));
    fclose($file);
    sendMessage("Success!",$CHID);
  } catch (Exception $e) {
    sendMessage("Err!",$CHID);
  }
}
if(strpos($message,"/start") !== false)
{
  sendMessage("Hello " . $update[message][from][first_name] . "! \nIm Shkolo_Bot v0.0.4 \n \nEnter /help to view the commands.",$chatID);
}
if(strpos($message,"/help") !== false)
{
  sendMessage("Shkolo_Bot | Commands: \n /lessons -- view homework / timetable",$chatID);
}
if(strcasecmp($message,"/lessons -help") == 0)
{
  sendMessage("Shkolo_Bot | /lessons commands: \n  -mo Monday\n  -tu Tuesday\n  -we Wednesday\n  -th Thursday\n  -fr Friday",$chatID);
}
if(strcasecmp($message,"/lessons") == 0)
{
  $day = date("l");
  sendMessage("Today is $day",$chatID);
  if(strcasecmp($day,"Monday") == 0)
  {
    ShowLessons("Monday",$chatID);
  }
  if(strcasecmp($day,"Tuesday") == 0)
  {
    ShowLessons("Tuesday",$chatID);
  }
  if(strcasecmp($day,"Wednesday") == 0)
  {
    ShowLessons("Wednesday",$chatID);
  }
  if(strcasecmp($day,"Thursday") == 0)
  {
    ShowLessons("Thursday",$chatID);
  }
  if(strcasecmp($day,"Friday") == 0)
  {
    ShowLessons("Friday",$chatID);
  }
}
if(strpos($message,"/lessons -add") !== false)
{
  $day = date("l");
  if(strcasecmp($day,"Monday") == 0)
  {
    AddHomework("Monday",$message,$chatID);
  }
  if(strcasecmp($day,"Tuesday") == 0)
  {
    AddHomework("Tuesday",$message,$chatID);
  }
  if(strcasecmp($day,"Wednesday") == 0)
  {
    AddHomework("Wednesday",$message,$chatID);
  }
  if(strcasecmp($day,"Thursday") == 0)
  {
    AddHomework("Thursday",$message,$chatID);
  }
  if(strcasecmp($day,"Friday") == 0)
  {
    AddHomework("Friday",$message,$chatID);
  }
}
if(strcasecmp($message,"/lessons -mo") == 0)
{
  ShowLessons("Monday",$chatID);
}
if(strcasecmp($message,"/lessons -tu") == 0)
{
  ShowLessons("Tuesday",$chatID);
}
if(strcasecmp($message,"/lessons -we") == 0)
{
  ShowLessons("Wednesday",$chatID);
}
if(strcasecmp($message,"/lessons -th") == 0)
{
  ShowLessons("Thursday",$chatID);
}
if(strcasecmp($message,"/lessons -fr") == 0)
{
  ShowLessons("Friday",$chatID);
}
if(strpos($message,"/lessons -mo -add") !== false)
{
  AddHomework("Monday",$message,$chatID);
}
if(strpos($message,"/lessons -tu -add") !== false)
{
  AddHomework("Tuesday",$message,$chatID);
}
if(strpos($message,"/lessons -we -add") !== false)
{
  AddHomework("Wednesday",$message,$chatID);
}
if(strpos($message,"/lessons -th -add") !== false)
{
  AddHomework("Thursday",$message,$chatID);
}
if(strpos($message,"/lessons -fr -add") !== false)
{
  AddHomework("Friday",$message,$chatID);
}
if(strcasecmp($message,"/time") == 0)
{
  $time = date("H:i:s");
  sendMessage($time,$chatID);
}
if(strcasecmp($message,"/time -test") == 0)
{
  $time = explode(":",date("H:i"));
  switch ($time) {
    case '0915':
        sendMessage($time - 0915,$chatID);
      break;
    case '1005':
        sendMessage($time - 1005,$chatID);
      break;
    case '1100':
        sendMessage($time - 1100,$chatID);
      break;
    case '1150':
        sendMessage($time - 1150,$chatID);
      break;
    case '1255':
        sendMessage($time - 1255,$chatID);
      break;
    case '1345':
        sendMessage($time - 1345,$chatID);
      break;
    case '1435':
        sendMessage($time - 1435,$chatID);
      break;
    default:
      # code...
      break;
  }
  sendMessage($time,$chatID);
}
?>
