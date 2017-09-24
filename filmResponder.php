<?php
 function strip_punctuation($string) {
    $string = strtolower($string);
    $string = preg_replace("/[.,\/#!$%\^&\*;:{}=\?\-'" . '"' ."_`~()]/", "", $string);
    //$string = str_replace(" +", "_", $string);
    return $string;
}

$myfile = fopen("script.csv", "r") or die("Unable to open file!");
$raw = fread($myfile,filesize("script.csv"));
fclose($myfile);

$responces = explode("<br>", strip_punctuation($raw));
$message = $_GET['m'];
$ranks =[];

foreach($responces as &$responce){
    $rank = levenshtein($message,$responce);
    //echo $rank . $responce . "<br />";
    $ranks[] = $rank;
    
}
$min = min($ranks);
echo $min ."<br />";
$index =  array_search(min($ranks), $ranks);
echo $responces[$index] . $index .  "<br/>" ;
echo $responces[$index+1];

