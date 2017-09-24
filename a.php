<?php
        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.6/me/subscribed_apps"); 
        $post = array('access_token'=>'EAAChhM0kKZBoBAIPl5cIZBU9NSZA9xCMLZBFYvWhXu7l7E4vTRaEUDGeB2BhaayVyw8PZAVU87ZAj4uR1zNw60pYRPqjd1nj4pmq0uOufjvc59FlwCULTeK3nzCIj2ZCEyxI76IMtSEnVDc3Gm8i8XMlGZCl48AE5fHqqQZA60TaTogZDZD');
        curl_setopt($ch,CURLOPT_POST, count($post));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $post);
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
    echo $output;
        // close curl resource to free up system resources 
        curl_close($ch);  
