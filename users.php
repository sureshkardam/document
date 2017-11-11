<?
    include "inc/App.php";
    $user->Protect();

    $menu='users';

    $file = 'list';
    if($_GET['menu'])$file=$_GET['menu'];

    if(isset($_POST['add_role'])){
        #print_R($_POST);
        $post = $form->get_post_data(array('name','color','zones'));
        $post['zones']=serialize($post['zones']);

        if(isset($_GET['edit'])){
            $db->update($post,'roles',array('id'=>$_GET['edit']));  
            $error['type']='success';
            $error['message']="<strong>Success!</strong> The user role has been updated!";               
        }else{
            $db->insert($post,'roles');
            $error['type']='success';
            $error['message']="<strong>Success!</strong> The user role has been added!";             
        }

    }

    if(isset($_POST['add_user'])){
        #print_R($_POST);
        $post = $form->get_post_data(array('name','surname','password','role','email','username'));
        $post['password']=md5($post['password']);
        $post['date']=time();

        if(isset($_GET['edit'])){
            if(!$_POST['password'])unset($post['password']);
            
            $db->update($post,'users',array('id'=>$_GET['edit']));  
            $error['type']='success';
            $error['message']="<strong>Success!</strong> The user has been updated!";               
        }else{
            $db->insert($post,'users');
            $error['type']='success';
            $error['message']="<strong>Success!</strong> The user has been added!";             
        }

    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Users | DocGen</title>

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
              <span class="white-text text-darken-2"><h5><i class="material-icons">accessibility</i> <span id='pageTitle'>Users</span></h5></span>
            </div>
<? include "inc/commons/messages.php";?>
            <div class="container" id='big'>
              <div id="docBase" class='row'>
                    <div class="card-panel z-depth-1" id="formDoc">
                          <span class="black-text">
                            <? include "inc/views/users/".$file.".php";?>
                          </span>
                    </div>
              </div>
            </div>
        </main>  

        <script src="style/js/jquery.dataTables.js" type="text/javascript" ></script>
         <script type="text/javascript">
          $(function() {
              table1 = $('#dataTable').DataTable({
                //bLengthChange:false,
                   language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search...",
                        sLengthMenu: "_MENU_"
                    }
              });
              $('select').material_select('destroy');
              $('select').material_select();
          });
        </script>       
  </body>
</html>
