<script>
    $('#pageTitle').html('Roles');
</script>
                              <div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
                                   <a class="btn-floating btn-large waves-effect waves-light red" href="users.php?menu=add_role" ><i class="material-icons">add</i></a>
                              </div>

                                <table id="dataTable" class="responsive-table striped highlight bordered" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style='width:50px;'>ID</th>
                                        <th>Name</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?
                                        $users = $db->select('roles',array(),array('id'=>'asc'));
                                        foreach($users as $u){?>
                                    <tr>
                                        <td><?php echo $u->id?></td>
                                        <td><span class='role chip' style='background:<?php echo $u->color?>'><?php echo $u->name?></span></td>
                                        <td class='actions'>
                                            <a href="users.php?menu=add_role&edit=<?php echo $u->id?>"><i class="material-icons">mode_edit</i></a>
                                            <a href="#" class='deleteitem' data-table='roles' data-id='<?php echo $u->id?>'><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                    <?}?>
                                </tbody>
                            </table>