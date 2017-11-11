              <div id="docBase" class='row'>
                    <div class="card-panel z-depth-1" id="formDoc">

            <div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
                <a class="btn-floating btn-large waves-effect waves-light red" href="documents.php?menu=add_document" ><i class="material-icons">add</i></a>
            </div>
            <table id="dataTable" class="responsive-table striped highlight bordered" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Created by</th>
                                        <th>Creation date</th>
                                        <th>Template</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Created by</th>
                                        <th>Creation date</th>
                                        <th>Template</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?
                                        $documents = $db->select('documents',array(),array('id'=>'desc'));
										//$documents = $db->select('documents',array());
                                        
										
										foreach($documents as $u){
                                            $template = $db->select_row('templates',array('id'=>$u->template));
                                            $user = $db->select_row('users',array('id'=>$u->user));
                                            ?>
                                    <tr>
                                        <td><?php echo $u->id?></td>
                                        <td><?php echo $u->title?></td>
                                        <td><?php echo $user->surname." ".$user->name?></td>
                                        <td><?php echo date('d/m/Y H:i',$u->created)?></td>
                                        <td><?php echo $template->name?></td>
                                        <td class='actions'>
										
										
                                           
											<a href="#" onclick="get_download(<?php echo $u->id?>)" class='tooltipped'  data-position="top" data-delay="10" data-tooltip="Download"><i class="material-icons">file_download</i></a>
                                           
											<a href="documents.php?menu=view_document&id=<?php echo $u->id?>" class='tooltipped'  data-position="top" data-delay="10" data-tooltip="View document"><i class="material-icons">remove_red_eye</i></a>
                                            <a href="documents.php?menu=edit_document&id=<?php echo $u->id?>"  class='tooltipped'  data-position="top" data-delay="10" data-tooltip="Edit document"><i class="material-icons">mode_edit</i></a>
                                            <a href="#" class='deleteitem' data-table='documents' data-id='<?php echo $u->id?>'><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                    <?}?>
                                </tbody>
        </table>
</div>
</div>
<script>
var download_id = 0;
    function get_download(id){
        download_id = id;
        $('#download_document').openModal();
    }

    function download_file(type){
        top.location='inc/App.php?type='+type+'&Download='+download_id;
    }
</script>
  <!-- Modal Structure -->
  <div id="download_document" class="modal">
    <div class="modal-content">
      <h4>Download file</h4>
      <div class="row">
        <?if($cfg->enable_pdf){?>
            <div class="col s12 m4">
              <div class="card  red darken-2 waves-effect waves-light" onclick="download_file('pdf')" style='width:100%;'>
                <div class="card-content white-text ">
                        Download PDF
                </div>
              </div>
            </div>
            <?}?>
         <?if($cfg->enable_docx){?>           
            <div class="col  s12 m4">
              <div class="card blue darken-2 waves-effect waves-light" onclick="download_file('doc')" style='width:100%;'>
                <div class="card-content white-text ">
                        Download DOC
                </div>
              </div>
            </div>
            <?}?>
        <?if($cfg->enable_html){?>
            <div class="col  s12 m4">
              <div class="card light-green waves-effect waves-light" onclick="download_file('html')" style='width:100%;'>
                <div class="card-content white-text ">
                        Download HTML
                </div>
              </div>
            </div>
        <?}?>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
  </div>
