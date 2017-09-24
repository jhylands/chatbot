<?php
 function strip_punctuation($string) {
    $string = strtolower($string);
    $string = preg_replace("/[.,\/#!$%\^&\*;:{}=\?\-'" . '"' ."_`~()]/", "", $string);
    //$string = str_replace(" +", "_", $string);
    return $string;
}

function getScript($file){
    $myfile = fopen($file, "r") or die("Unable to open file!");
    $raw = fread($myfile,filesize($file));
    fclose($myfile);
    return $raw;
}
function getQuote($message){
    $raw = getScript("liveAndLetDie.txt") . getScript("hotFuzz.txt");

    $responces = explode("<br>", strip_punctuation($raw));
    //$message = $_GET['m'];
    $ranks =[];

    foreach($responces as &$responce){
        $rank = levenshtein($message,$responce);
        //echo $rank . $responce . "<br />";
        $ranks[] = $rank;

    }
    $min = min($ranks);
    //echo $min ."<br />";
    $index =  array_search(min($ranks), $ranks);
    //echo $responces[$index] . $index .  "<br/>" ;
    return $responces[$index+1];
    //return explode("<br>", $raw)[$index+1];

}