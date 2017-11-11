<?
    $roles = $db->select('roles',array(),array('id'=>'desc'));
    foreach($roles as $r){
        $rols[$r->id]=$r->name;
    }
    if(isset($_GET['edit'])){
        $info = $db->select_row('users',array('id'=>$_GET['edit']));
        $act="Edit";
    }else{
        $act='Add';
    }

?>            
<script>
$('#pageTitle').html('<?if($info){?>Edit user "<?php echo $info->email?>"<?}else{?>Add new user<?}?>');
</script>
                              <div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
                                   <a class="btn-floating btn-large waves-effect waves-light red" href="users.php" ><i class="material-icons">reply</i></a>
                              </div>

                                <?
                                $form2= new Form('test');
                                                                   
                                $form2->addElement(array(
                                    'type'=>'text',
                                    'label'=>'Name',
                                    'name'=>'name',
                                    'value'=>$info->name,
                                    'class'=>'error'
                                    ));                            
                                $form2->addElement(array(
                                    'type'=>'text',
                                    'label'=>'Surname',
                                    'name'=>'surname',
                                    'value'=>$info->surname,
                                    'class'=>'error'
                                    ));                             
                                $form2->addElement(array(
                                    'type'=>'text',
                                    'label'=>'Email',
                                    'name'=>'email',
                                    'value'=>$info->email,
                                    'class'=>'error'
                                    ));                          
                                $form2->addElement(array(
                                    'type'=>'text',
                                    'label'=>'Username',
                                    'name'=>'username',
                                    'value'=>$info->username,
                                    'class'=>'error'
                                    ));                          
                                $form2->addElement(array(
                                    'type'=>'text',
                                    'label'=>'Password',
                                    'name'=>'password',
                                    'value'=>'',
                                    'class'=>'error'
                                    ));                           
                                $form2->addElement(array(
                                    'type'=>'select',
                                    'label'=>'Role',
                                    'name'=>'role',
                                    'value'=>$info->role,
                                    'options'=>$rols,
                                    'class'=>'error'
                                    ));

                                $form2->addElement(array(
                                    'type'=>'submit',
                                    'label'=>'',
                                    'name'=>'add_user',
                                    'value'=>$act.' user',
                                    'class'=>'btn btn-primary'
                                    ));



                                    $form2->render();
                                ?>
