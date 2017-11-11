<?
    include "inc/App.php";
    $user->Protect();

    $menu='documents';

    $file = 'list';
    if($_GET['menu'])$file=$_GET['menu'];
    
    //Users can see only documents created by them
    
	if($file=='list' && $cfg->user_documents){
      $file='mine';
    }


    if($file=='dummy'){
      echo "<div id='dummyDiv'>
      This is the dummy div
      </div>
      <style>
      .highlighted{
        background:#FBE680;
      }
      </style>
      ";
      die();
    }

    if(isset($_POST['add_template'])){
        #print_R($_POST);
        $post = $form->get_post_data(array('name','content','increment'));
        $post['created']=time();
        $post['owner']=$user->userinfo->id;

        if(isset($_GET['edit'])){
            $db->update($post,'templates',array('id'=>$_GET['edit']));  
            $error['type']='success';
            $error['message']="<strong>Success!</strong> The template has been updated!";         
            $activity->add('Updated template "'.$post['name'].'"');      
        }else{
            $id = $db->insert($post,'templates');
            if(isset($_SESSION['variables'])){
              foreach($_SESSION['variables'] as $var){
                $db->insert(array('template'=>$id,'name'=>$var->name,'token'=>$var->token),'variables');
              }
            }

            unset($_SESSION['variables']);
            $error['type']='success';
            $error['message']="<strong>Success!</strong> The template has been added!";  
            $activity->add('Created new template "'.$post['name'].'"');      
            header("Location: documents.php?menu=add_template&edit=".$id."&success");
        }

    }

    if(isset($_POST['create_document'])){
        $template = $db->select_row('templates',array('id'=>$_POST['template']));
        $content = $template->content;
        $_POST['{System.Increment}'] = $_POST['{System_Increment}'];
        $_POST['{System.CurrentDate}'] = $_POST['{System_CurrentDate}'];

        $db->update(array('increment'=>$_POST['{System_Increment}']),'templates',array('id'=>$_POST['template']));

        #print_R($_POST);
        $arr = $db->select('variables',array('template'=>$_POST['template']));
        $arr[] = (object) array('name'=>'System_CurrentDate','token'=>'{System.CurrentDate}');
        $arr[] = (object) array('name'=>'System_Increment','token'=>'{System.Increment}');
             
            foreach($arr as $v){
                $content = str_replace($v->token,$_POST[$v->token],$content);
            }

        $post = $form->get_post_data(array('title','template'));
        $post['user']=$user->userinfo->id;
        $post['can_print']='0';
		$post['created']=time();
        $post['content']=mysql_real_escape_string($content);

            $id=$db->insert($post,'documents');
            $error['type']='success';
            $error['message']="<strong>Success!</strong> The document has been created!";      
            $activity->add('(Admin Will Allow the Document for Print and Download)Created new document "'.$post['title'].'" with the template "'.$template->name.'"');  
            header("Location: documents.php?menu=view_document&id=".$id);       

    }    

    if(isset($_POST['edit_document'])){
      $post = $form->get_post_data(array('title','content','can_print'));
     # $post['content']=mysql_real_escape_string($post['content']);
      
	  $db->update($post,'documents',array('id'=>$_GET['id']));
      $error['type']='success';
      $error['message']="<strong>Success!</strong> The document has been modified!";      
      $activity->add('Modified document "'.$post['title'].'"');        
    }

    if(isset($_POST['send_email'])){
      if(!$_POST['to']){
        $error['type']='error';
        $error['message']="Please fill in the 'to' field.";
      }

      if(!$error){
        xmail($_POST['to'],nl2br($_POST['message']),$_POST['subject']);
        $error['type']='success';
        $error['message']="Congratulations! The email has been sent!";
      }
      //die('test');
    }

    

    if(isset($_GET['success'])){
      $error['type']='success';
      $error['message']="Congratulations! Your template has been added!";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Documents &middot; <?php echo $cfg->site_title?></title>

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
              <span class="white-text text-darken-2"><h5><i class="material-icons">create_new_folder</i> <span id='pageTitle'><?if($_GET['menu']=='mine')echo "My";?> Documents</span></h5></span>
            </div>
<? include "inc/commons/messages.php";?>
            <div class="container" id='big'>
             <? include "inc/views/documents/".$file.".php";?>
            </div>
        </main>  




        <script src="style/js/jquery.dataTables.js" type="text/javascript" ></script>
        <script type="text/javascript">
          $(function() {
              table1 = $('#dataTable').DataTable({
                "order": [[ 3, "desc" ]],
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
