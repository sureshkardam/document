<?
    if(isset($_GET['edit'])){
        $info = $db->select_row('roles',array('id'=>$_GET['edit']));
        $act="Edit";
    }else{
        $act='Add';
    }
?>
<script>
$('#pageTitle').html('<?if($info){?>Edit role "<?php echo $info->name?>"<?}else{?>Add new role<?}?>');
</script>
                            <div class="box-content">
                               <div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
                                   <a class="btn-floating btn-large waves-effect waves-light red" href="users.php?menu=roles" ><i class="material-icons">reply</i></a>
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
                                    'type'=>'color',
                                    'label'=>'Color',
                                    'labelClass'=>'active',
                                    'name'=>'color',
                                    'value'=>$info->color,
                                    'class'=>'colorpicker'
                                    ));                                                     
                                $form2->addElement(array(
                                    'type'=>'checkbox',
                                    'label'=>'Role',
                                    'name'=>'zones[]',
                                    'value'=>unserialize($info->zones),
                                    'options'=>array(
                                        'Manage documents',
                                        'Manage templates',
                                        'Manage Users',
                                        'Edit site settings'
                                    ),
                                    'class'=>'error'
                                    ));

                                $form2->addElement(array(
                                    'type'=>'submit',
                                    'label'=>'',
                                    'name'=>'add_role',
                                    'value'=>$act.' role',
                                    'class'=>'btn btn-primary'
                                    ));

                                    $form2->render();
                                ?>