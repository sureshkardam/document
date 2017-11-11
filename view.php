<?
	//Decode token string
    $decode = base64_decode($_GET['token']);
    $xp = explode('-',$decode);

    if(count($xp)!==2){
    	die("Wrong token!");
    }

    $document = array("id"=>$xp[1], "type"=>$xp[0]);
    
    $_GET['Download'] = $document["id"];
    $_GET['type'] = $document['type'];

    include "inc/App.php";
?>