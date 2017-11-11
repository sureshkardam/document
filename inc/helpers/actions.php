<? if ( ! defined('BASEDIR')) exit('Acces denied');

    if(!$user->isLogged()){
        header("Location: login.php");
    }


	if($_GET['actions']=='delete'){
		$db->delete(array('id'=>$_POST['id']),$_POST['table']);
	}
?>