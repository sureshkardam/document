<?
  include "../../App.php";

  if(isset($_GET['add'])){
    // If we are in the temporary creation of a document, store all the variables in a temp file.
    if($_POST['template']=='temp'){
      $_POST['id']="t_".rand(1111,9999);
      $_SESSION['variables'][]=(Object) $_POST;
      die();
    }

    $db->insert($_POST,'variables');
    die();
  }

  if(isset($_GET['delete'])){
    $db->delete(array('id'=>$_POST['id']),'variables');
    die();
  }


  if(isset($_GET['varlist'])){
       $arr = $db->select('variables',array('template'=>$_GET['varlist']));   
       if($_GET['varlist']=='temp')$arr = $_SESSION['variables'];

       foreach($arr as $a){
        ?>
        <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'<?php echo $a->token?>');return false;" class='collection-item'><?php echo $a->token?></a>
        <?
       }
       die();
  }

  if(isset($_GET['getForm'])){
      $arr = $db->select('variables',array('template'=>$_GET['getForm']));
      $template = $db->select_row('templates',array('id'=>$_GET['getForm']));

      $form2= new Form('test','get',1);
             $form2->addElement(array(
                 'type'=>'text',
                 'label'=>'System Increment',
                 'name'=>'{System.Increment}',
                 'class'=>'ontype ontypesystem',
                 'value'=>($template->increment+1),
                 'attributes'=>array("data-var"=>'SystemIncrement',"placeholder"=>"increment")
                 ));
             $form2->addElement(array(
                 'type'=>'text',
                 'label'=>'System CurrentDate',
                 'name'=>'{System.CurrentDate}',
                 'class'=>'ontype ontypesystem datepicker',
                 'value'=>date('d.m.Y'),
                 'attributes'=>array("data-var"=>'SystemCurrentDate')
                 ));       
      foreach($arr as $val){
             $form2->addElement(array(
                 'type'=>'text',
                 'label'=>ucFirst($val->name),
                 'name'=>$val->token,
                 'class'=>'ontype',
                 'attributes'=>array("data-var"=>str_replace(array("{","}"),array("",""),$val->token))
                 ));  
      }

      $form2->render();
    die();
  }

  if(isset($_GET['getFormContent'])){
      $arr = $db->select_row('templates',array('id'=>$_GET['getFormContent']));
      $v = $db->select('variables',array('template'=>$_GET['getFormContent']));
      $v[] = (object) array('name'=>'System.CurrentDate','token'=>'{System.CurrentDate}');
      $v[] = (object) array('name'=>'System_Increment','token'=>'{System.Increment}');

      foreach($v as $vars){
        $arr->content = str_replace($vars->token,"<span class='var_".str_replace(array("{","}","."),array("","",""),$vars->token)."'>".$vars->token."</span>",$arr->content);
      }
      echo $arr->content;
    die();
  }

  ?>
{
  "data": [
  <?
  $add=array();
    $s = $db->select('variables',array('template'=>$_GET['template']));

    if($_GET['template']=='temp')$s = $_SESSION['variables'];
       
    $v=array();
      foreach($s as $v=>$var){
        $add[$v]="[";
        $add[$v].= '"'.$var->id.'",';
        $add[$v].= '"'.$var->name.'",';
        $add[$v].= '"'.$var->token.'",';
        $add[$v].= '"<a href=\'#var_list\' onclick=\'delete_item('.$var->id.')\' style=\'float:right;\'><i class=\'material-icons\' style=\' font-size:18px;\'>delete</i></a>"';
        $add[$v].= "]";
      }
      echo implode(",\n",$add);
?>
]}
<?
die();
?>