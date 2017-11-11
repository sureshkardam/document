                              <div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
                                   <a class="btn-floating btn-large waves-effect waves-light red" href="users.php?menu=add_user" ><i class="material-icons">add</i></a>
                              </div>
                                <table id="dataTable" class="responsive-table striped highlight bordered" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name & Surname</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Registration date</th>
                                        <th>Role</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name & Surname</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Registration date</th>
                                        <th>Role</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?
                                        $users = $db->select('users',array(),array('id'=>'asc'));
                                        foreach($users as $u){
                                            $role = $db->select_row('roles',array('id'=>$u->role));
                                            ?>
                                    <tr>
                                        <td><?php echo $u->id?></td>
                                        <td><?php echo $u->name." ".$u->surname?></td>
                                        <td><?php echo $u->username?></td>
                                        <td><?php echo $u->email?></td>
                                        <td><?php echo date('d/m/Y H:i',$u->date)?></td>
                                        <td><span class='chip role' style='background:<?php echo $role->color?>'><?php echo $role->name?></span></td>
                                        <td class='actions'>
                                            <a href="users.php?menu=add_user&edit=<?php echo $u->id?>"><i class="material-icons">mode_edit</i></a>
                                            <a href="#" class='deleteitem' data-table='users' data-id='<?php echo $u->id?>'><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                    <?}?>
                                </tbody>
                            </table>
