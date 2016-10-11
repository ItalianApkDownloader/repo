<?php
 
$botToken = "263463068:AAHx9Qz_P8NB65gN5nUAo8IJkqrOpGqpuk4";
$website = "https://api.telegram.org/bot".$botToken;
 
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
 
 
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];
echo getPassword(3150);
 
if(strpos($message, '/encryptgjp ') === 0)
{
	
		sendMessage($chatId,"Please insert a valid word!");
	
}
 
function sendMessage ($chatId, $message) {
       
        $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".urlencode($message);
        file_get_contents($url);
       
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
function decode($password)
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

function getPassword($levelID){
    
    $url = 'http://boomlings.com/database/downloadGJLevel21.php';
    $data = array('gameVersion' => '20' ,'binaryVersion' => '29' ,'levelID' => $levelID ,'inc' => '1' ,'extras' => '0' ,'secret' => 'Wmfd2893gb7' , );
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
    $f = explode(':27:',$result);
    $password = explode('#',$f[1]);
   
    $decode = base64_decode ($password[0]);







$array = str_split($decode);

$xor = array(50,54,51,54,52);
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
 
 return substr($lol, 1);
 

}
 
?>

