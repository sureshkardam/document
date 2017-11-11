<?
    include "inc/App.php";
    $user->Protect();
    $menu='settings';

    $file = 'main';
    if($_GET['menu'])$file=$_GET['menu'];

//Update site settings
    if(isset($_POST['save_settings'])){
        $post = $form->get_post_data(array('site_title','enable_pdf','enable_docx','enable_html','user_documents', 'email_from_email', 'email_from_name'));
        foreach($post as $tag=>$val){
          if(property_exists($cfg,$tag)){
            $db->update(array('value'=>$val),'config',array('name'=>$tag));
          }else{
            $db->insert(array('value'=>$val, 'name'=>$tag),'config');
          }
        }

        $error['type']='success';
        $error['message']="<strong>Success!</strong> The settings were updated!";  
        $cfg = $db->getConfig();
        $activity->add('Updated site settings'); 
    }

//Update account information
    if(isset($_POST['update_acc_info'])){
        $post = $form->get_post_data(array('name','surname','email'));
        $db->update($post,'users',array('id'=>$user->userinfo->id));

        $user->refreshUserInfo();
        $error['type']='success';
        $error['message']="<strong>Success!</strong> Account information updated";  
      }

//Update account information
    if(isset($_POST['update_password'])){
        $post = $form->get_post_data(array('old_pass','old_pass_r','new_pass'));
        if($post['old_pass']!=$post['old_pass_r']){
          $eroare = "Passwords do not match!";
        }
        if(md5($post['old_pass'])!=$user->userinfo->password){
          $eroare = "Incorrect old password";
        }

        if(!$post['new_pass']){
          $eroare = "New password cannot be blank!";
        }

        if($eroare){
          $error['type']='error';
          $error['message']="<strong>Error!</strong> ".$eroare;            
        }else{
          #$db->update($post,'users',array('id'=>$user->userinfo->id));
          $user->setNewPassword($post['new_pass']);
          $error['type']='success';
          $error['message']="<strong>Success!</strong> Account information updated";  
        }
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Settings  &middot; <?php echo $cfg->site_title?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="style/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="style/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="style/css/dataTables.bootstrap.css" type="text/css" media="screen, projection" rel="stylesheet" />
        <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="style/js/materialize.js"></script>
  <script src="style/js/init.js"></script>
  <link rel="shortcut icon" href="./style/favicon.ico?V=2" type="image/x-icon">
  <link rel="icon" href="./style/favicon.ico?V=2" type="image/x-icon">    
</head>
<body>
<? include "inc/commons/header.php";?>
        <main>      
            <div class="card-panel blue-grey darken-4">
              <span class="white-text text-darken-2"><h5><i class="material-icons">settings</i> <span id='pageTitle'>Settings</span></h5></span>
            </div>
<? include "inc/commons/messages.php";?>
            <div class="container" id='big'>
             <? include "inc/views/settings/".$file.".php";?>
            </div>
        </main>  
      
  </body>
</html>
