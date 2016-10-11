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
	$temp = explode("/encryptgjp ", $message);
	$word = encode($temp[1]);
	if($word != ''){
		sendMessage ($chatId,"Encrypted gjp = ".$word);
	}else{
		sendMessage ($chatId,"Please insert a valid word!");
	} 
	

}

if(strpos($message, '/decryptgjp ') === 0)
{
	$temp = explode("/decryptgjp ", $message);
	$word = decode($temp[1]);
	if($word != ''){
		sendMessage ($chatId,"Decrypted gjp = ".$word);
	}else{
		sendMessage ($chatId,"Please insert a valid word!");
	}

}

if(strpos($message, '/levelpass ') === 0)
{
	$temp = explode("/levelpass ", $message);
	$word = getPassword($temp[1]);
	if($word != ''){
		sendMessage ($chatId,"Level password = ".$word);
	}else{
		sendMessage ($chatId,"Please insert a valid word!");
	}
}

if(strpos($message, '/info ') === 0)
{
	$userName = "RobTop";
	$data = getUserInfo($userName);
	$userInfo = "This are all the info for the user : ".$data ["name"]."\n";
	$userInfo = $userInfo."AccountID = ".$data["accountID"]."\n";
	$userInfo = $userInfo."UserID = ".$data["userID"]."\n";
	$userInfo = $userInfo."Coins = ".$data["coins"]."\n";
	$userInfo = $userInfo."User Coins = ".$data["userCoins"]."\n";
	$userInfo = $userInfo."Demons = ".$data["demons"]."\n";
	$userInfo = $userInfo."Creator Points = ".$data["creatorPoints"]."\n";
	$userInfo = $userInfo."Stars = ".$data["stars"]."\n";
	$userInfo = $userInfo."Youtube channel = ".$data["ytLink"]."\n";
	
	
	
	$temp = explode("/info", $message);
	$word = getPassword($temp[1]);
	sendMessage ($chatId,$userInfo);
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
 $decode = base64_decode ($password);

    $array = str_split($decode);

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
    
    return $lol;
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
 
function getUserInfo($userName){
	$url = 'http://boomlings.com/database/getGJUsers20.php';
    $data = array('gameVersion' => '20' ,'binaryVersion' => '29' ,'str' => $userName ,'total' => '0' ,'page' => '0' ,'secret' => 'Wmfd2893gb7' );

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );


      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);

      $temp1 = explode("#",$result);
      $temp2 = explode("|",$temp1[0]);
      
      
      $name = getDato($temp2[0],1);
      $accID = getDato($temp2[0],16);
      $userID = getDato($temp2[0],2);
      
      
      $url = 'http://boomlings.com/database/getGJUserInfo20.php';
    $data = array('gameVersion' => '20' ,'binaryVersion' => '29' ,'udid' => 'S73130148776145348' ,'targetAccountID' => $accID ,'secret' => 'Wmfd2893gb7' );

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );


      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      
      
      $coins = getDato($result,13);
      $ucoins = getDato($result,17);
      $demons = getDato($result,4);
      $creatorP = getDato($result,8);
      $stars = getDato($result,3);
    	if(getDato($result,20)!= '')
      		$ytLink = "https://www.youtube.com/channel/".getDato($result,20);
      
      
      
      

	$data = array('userName' => $name ,'accountID' => $accID , 'userID' => $userID ,'coins' => $coins , 'userCoins' => $ucoins , 'demons' => $demons , 'creatorPoints' => $creatorPoints, 'stars' => $stars, 'ytLink' => $ytLink);

	return $data;
    
}




function getDato($value,$number)
{
    $data = explode(":",$value);
   	for($k = 0;$k < count($data);$k= $k+2){
    	if($data[$k]==$number){
        	return $data[$k+1];
        }
    }
    
}
?>

