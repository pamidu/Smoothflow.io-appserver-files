<?php


require_once ($_SERVER['DOCUMENT_ROOT'] . "/include/config.php");
$token= $_GET['token'];
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($curl, CURLOPT_URL, SVC_AUTH_URL."/UserActivation/".$token);
$status=curl_exec ($curl);
curl_close ($curl);
if($status==true){
    echo '{"success":true,"message":"Account Activated"}';
    header("Location: http://".$mainDomain."/platformentry/#/signin?activated=true");
}
else{
    echo '{"success":false,"message":"Error occured"}';
    header("Location: http://".$mainDomain."/platformentry/#/signin?activated=false");
}

?>
