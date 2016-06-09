
<?php
	session_start();
	require_once ("include/config.php");
	require_once ("include/session.php");
	
			if(!isset($_SESSION["logoutContent"]))
			{
				$ch=curl_init();
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    	//'SecurityToken :'.$_COOKIE['securityToken'],
			    	'X-Apple-Store-Front: 143444,12'
			    ));
				curl_setopt($ch, CURLOPT_URL, $GLOBALS['authURI'].'/tenant/GetTenants/'.$_COOKIE['securityToken']);
			    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			    $data = curl_exec($ch);
			    $obj = json_decode($data);
			    $_SESSION["logoutContent"]=$obj;
				$count=0;

			}
			else
			{
				$obj=$_SESSION["logoutContent"];
				$count=$_SESSION["logoutcount"];
			}
		    //$GLOBALS['mainDomain']
		    //echo "function script(){"."\r\n";
		    //$count =0;
		    if (isset($obj)){
		    	if(count($obj)!=0){
				
		    		$tid=$obj[$count]->TenantID;
		    		//var_dump($obj[1]);
				unset($obj[$count]);
		    		$_SESSION["logoutContent"]=$obj;
				//var_dump($obj);
				//var_dump
				//exit();
				$count++;
				$_SESSION["logoutcount"]=$count;
				if(isset($tid)){
	                  		header("Location: http://".$tid."/s.php?logout=true");
				}else{
					header("Location: logout.php");
				}
		    		
				}
				else
				{
					setcookie ("securityToken", "", time() - 3600);
					setcookie ("authData", "", time() - 3600);
					unset($_COOKIE["securityToken"]);
					unset($_COOKIE["authData"]);
					unset($_SESSION);
					header("Location: /");
                  	//header("Location: http://".$obj[0]->TenantID."/s.php?logout=true");

				}
			}
			else{
				setcookie ("securityToken", "", time() - 3600);
				setcookie ("authData", "", time() - 3600);
				unset($_COOKIE["securityToken"]);
				unset($_COOKIE["authData"]);
			}

?>
