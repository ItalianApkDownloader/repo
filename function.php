<?php


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






?>
