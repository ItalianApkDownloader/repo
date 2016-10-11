<?php

include "function.php";
 
$botToken = "263463068:AAHx9Qz_P8NB65gN5nUAo8IJkqrOpGqpuk4";
$website = "https://api.telegram.org/bot".$botToken;
 
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
 
 
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
 
 
switch($message) {
       
        case "/test":
                sendMessage($chatId, "ciao");
                break;
        case "/hi":
                sendMessage($chatId, "hi there!");
                break;
        default:
                sendMessage($chatId, "default");
       
}
 
function sendMessage ($chatId, $message) {
       
        $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($message);
        file_get_contents($url);
       
}
 
 
 
 
 
?>

