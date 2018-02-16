<?php 
require_once '../includes/DbOperations.php';
 
$response = array(); 
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(
        isset($_POST['username']) and
            isset($_POST['email']) and
                isset($_POST['password']))
        {
		//oepration data further
		$db = new DbOperations();

		$result = $db->createUser(  $_POST['username'],
									$_POST['password'],
									$_POST['email']
								);
		if($result == 1){
			$response['error'] = false;
			$response['message']="User Registered succesfully";
		}elseif($result == 2){
			$response['error']=true;
		$response['message']="Some error account please try again";
		}elseif($result == 0){
			$response['error']=true;
		$response['message']="It seems you are already registered,please a different email adn usename!";
		}

	}else{
		$response['error']=true;
		$response['message']="Require failed are missing";
	}

}else{
	$response['error']=true;
	$response['message']="Invalid Request";
}

echo json_encode($response);

 ?>