              <div id="docBase" class='row'>
                    <div class="card-panel z-depth-1" id="formDoc">
 <script>
$('#pageTitle').html('Templates');
</script>
                              <div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
                                   <a class="btn-floating btn-large waves-effect waves-light red" href="documents.php?menu=add_template" ><i class="material-icons">add</i></a>
                              </div>
                                <table id="dataTable" class="responsive-table striped highlight bordered" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style='width:50px;'>ID</th>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Created by</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Created by</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?
                                        $templates = $db->select('templates',array(),array('id'=>'desc'));
                                        foreach($templates as $u){
                                            $owner = $db->select_row('users',array('id'=>$u->owner));
                                            ?>
                                    <tr>
                                        <td><?php echo $u->id?></td>
                                        <td><?php echo $u->name?></td>
                                        <td><?php echo date('d/m/Y h:i',$u->created)?></td>
                                        <td><?php echo $owner->name?> <?php echo $owner->surname?></td>
                                        <td class='actions'>
                                            <a href="documents.php?menu=add_template&edit=<?php echo $u->id?>"><i class="material-icons">mode_edit</i></a>
                                            <a href="#" class='deleteitem' data-table='templates' data-id='<?php echo $u->id?>'><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                    <?}?>
                                </tbody>
                            </table>

</div>
</div>