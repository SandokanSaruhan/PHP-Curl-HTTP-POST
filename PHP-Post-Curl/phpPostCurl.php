<?php
	
	//About the fake test server: https://putsreq.com/OQgrgQHVhRdZC90nmC1K/inspect

	$url = 'https://putsreq.com/OQgrgQHVhRdZC90nmC1K'; 

	$params = array( 
    	"name" => "Sando"
	);
	//print_r ($params).'<br>';



	$header= array(
		"content-type" => "application/json"
	);
	//print_r ($header).'<br>';



	function httpPost($url,$params,$header) { 
    	$postData = '';
    	foreach($params as $k => $v) { 
        	$postData .= $k . '='.$v.'&'; 
    	} 
    	rtrim($postData, '&'); 
    	//$postData = "grant_type=authorization_code&code=".$_GET["code"]."&redirect_uri=".$redirect_uri;
    
    	$ch = curl_init(); 

    	curl_setopt($ch,CURLOPT_URL,$url); 
    	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); 
    	curl_setopt($ch,CURLOPT_HEADER, $header); 
    	curl_setopt($ch, CURLOPT_POST, count($postData));
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    
    	$output=curl_exec($ch); 

    	curl_close($ch); 
    	return $output; 
	}
	
	$result = httpPost($url,$params,$header);
	echo $result;
	
?>