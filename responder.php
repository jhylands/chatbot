<?php
include 'filmResponder.php';
//https://stackoverflow.com/questions/36724180/facebook-messenger-api-cant-verify-webhook-url-php
$challenge = $_REQUEST['hub_challenge'];
  $verify_token = $_REQUEST['hub_verify_token'];

  if ($verify_token === '123456789') {
  echo $challenge;
  }
  //Token of app
 $row = "EAAChhM0kKZBoBAIPl5cIZBU9NSZA9xCMLZBFYvWhXu7l7E4vTRaEUDGeB2BhaayVyw8PZAVU87ZAj4uR1zNw60pYRPqjd1nj4pmq0uOufjvc59FlwCULTeK3nzCIj2ZCEyxI76IMtSEnVDc3Gm8i8XMlGZCl48AE5fHqqQZA60TaTogZDZD";


 $input = json_decode(file_get_contents('php://input'), true);

//Receive user
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
 //User's message
 $message = $input['entry'][0]['messaging'][0]['message']['text'];



//Where the bot will send message
 $url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$row;


 $ch = curl_init($url);

 $message = getQuote($message);
//Answer to the message adds 1
if($message)
{
 $jsonData = '{
    "recipient":{
        "id":"'.$sender.'"
      }, 
    "message":{
        "text":"'.$message .'"
      }
 }';
};



 $json_enc = $jsonData;

 curl_setopt($ch, CURLOPT_POST, 1);

 curl_setopt($ch, CURLOPT_POSTFIELDS, $json_enc);

 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));  

 if(!empty($input['entry'][0]['messaging'][0]['message'])){
    $result = curl_exec($ch);
 }
 
