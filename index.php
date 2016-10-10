<?php

/*
* This file is part of GeeksWeb Bot (GWB).
*
* GeeksWeb Bot (GWB) is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License version 3
* as published by the Free Software Foundation.
* 
* GeeksWeb Bot (GWB) is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.  <http://www.gnu.org/licenses/>
*
* Author(s):
*
* © 2015 Kasra Madadipouya <kasra@madadipouya.com>
*
*/
require 'vendor/autoload.php';

$client = new Zelenin\Telegram\Bot\Api('263463068:AAHx9Qz_P8NB65gN5nUAo8IJkqrOpGqpuk4'); // Set your access token
$url = ''; // URL RSS feed
$update = json_decode(file_get_contents('php://input'));
$test = $update->message->text;

echo "funge";
//your app
try {
	
	
	
    if($test =='/salutami')
	{
		sendMessage("ciao sono bellissimo");
		
	}
    else
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Invalid command, please use /help to get list of available commands"
    		]);
    }

} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}

function sendMessage($password){
	$client = new Zelenin\Telegram\Bot\Api('263463068:AAHx9Qz_P8NB65gN5nUAo8IJkqrOpGqpuk4'); // Set your access token
$url = ''; // URL RSS feed
$update = json_decode(file_get_contents('php://input'));
$test = $update->message->text;
	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
		$response = $client->sendMessage([
		'chat_id' => $update->message->chat->id,
		'text' => $password
		]);
}


function encode($password)
{


    $array = str_split($password);

    $xor = array(51,55,53,50,54);
    $key = 0;
    $k = 0;
    $cont = 0;

    foreach ($array as &$value) {
       $parola[$cont] = ord($value) ^ $xor[$k];
       if($k != 4){
            $k++;
       }else{
            $k = 0;
       }
       $cont++;
    }




    for($k = 0; $k < count($parola); $k++){
        $temp[$k] = chr($parola[$k]);
    }



    $lol = implode($temp);
    
    return base64_encode ($lol);
    
}
