<?
    $document = $db->select_row('documents',array('id'=>$_GET['id']));
    $link = str_replace('documents.php','',$_SERVER['SCRIPT_URI']);

	
?>  
<script>
$('#pageTitle').html('View document "<?php echo $document->title?>"');
</script>
<div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
    <a class="btn-floating btn-large waves-effect waves-light red" href="documents.php" ><i class="material-icons">reply</i></a>
</div>

</div>
        <div class="container">
            <div class="row">
                <div class="col s3">
                  <div class="card blue-grey darken-1" onclick="top.location='documents.php?menu=edit_document&id=<?php echo $document->id?>'">
                      <div class="card-content white-text  waves-effect waves-block waves-light">
                        <span class="card-title">Edit</span>

                        <i class="material-icons boxicon">mode_edit</i>
                      </div>
                  </div>
                </div>    
				<?php if($document->can_print=='1') {?>
                <div class="col s3">
                  <div class="card blue-grey darken-1" onclick="top.location='inc/App.php?Download=<?php echo $document->id?>&type=html&print'">
                      <div class="card-content white-text  waves-effect waves-block waves-light">
                        <span class="card-title">Print</span>
                        <i class="material-icons boxicon">print</i>
                      </div>
                  </div>
                </div>  


                <div class="col s3">
                                    <!-- Dropdown Trigger -->
                <a class='download-button down-btn btn blue-grey darken-1' href='#' data-activates='dropdown21'>Download<i class="material-icons boxicon">file_download</i></a>

                <!-- Dropdown Structure -->
                <ul id='dropdown21' class='dropdown-content'>
                  <li><a href="inc/App.php?Download=<?php echo $document->id?>&type=pdf" target='_blank' class='red-text darken-4'>Download .pdf</a></li>
                  <li><a href="inc/App.php?Download=<?php echo $document->id?>&type=doc" target='_blank' class='blue-text darken-3'>Download .doc</a></li>
                  <li><a href="inc/App.php?Download=<?php echo $document->id?>&type=html" target='_blank' class='green-text darken-3'>Download .html</a></li>
                </ul>
                
                </div> 
				<?php } ?>
				
                <div class="col s3">
                  <div class="card blue-grey darken-1">
                      <a class="card-content white-text  waves-effect waves-block waves-light modal-trigger" href="#modal1">
                        <span class="card-title">Share</span>
                        <i class="material-icons boxicon">share</i>
                      </a>
                  </div>
                </div>  

            </div>
        </div>

        <div class="card-panel grey lighten-1">
            <div class="row">
                <div class="col s8" style='margin:auto; float:none;'>
                    <div class="card-panel white ">
                                    <?php echo $document->content?>

                    </div>
                </div>
            </div>
        </div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4>Share document</h4>
          <div class="collection">
            <a href="#!" class="collection-item activate-link active" onclick="showShare('link')">Get shareable link <span class="secondary-content"><i class="material-icons">link</i></span></a>
            <a href="#!" class="collection-item activate-email" onclick="showShare('email')">Send email <span class="secondary-content"><i class="material-icons">send</i></span></a>
          </div>

          <div class="shareable" id='share_link'>
            <div class="card-panel">
              <span class="card-title">Get shareable link</span>
              <div class="card-content">
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="send_pdf" type="text" onclick="select()" value='<?php echo $link?>view.php?token=<?php echo base64_encode('pdf-'.$document->id)?>'>
                  <label for="send_pdf">PDF</label>
                </div>
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="send_doc" type="text" onclick="select()" value='<?php echo $link?>view.php?token=<?php echo base64_encode('doc-'.$document->id)?>'>
                  <label for="send_doc">DOC</label>
                </div>
                <div class="input-field col s6">
                  <input placeholder="Placeholder" id="send_html" type="text" onclick="select()" value='<?php echo $link?>view.php?token=<?php echo base64_encode('html-'.$document->id)?>'>
                  <label for="send_html">HTML</label>
                </div>
              </div>
            </div>
          </div>

          <div class="shareable" id='share_email' style="display:none;">
            <form action="" class="col s12" method="post" id='sendEmail'>
              <input type="hidden" name='send_email'>
              <div class="card-panel">
                <span class="card-title">Send e-mail</span>
                <div class="card-content">
                  <div class="input-field col s6">
                    <input placeholder="Email" id="to" name='to' type="text" value='' class='validate' reqired>
                    <label for="to">To</label>
                  </div>
                  <div class="input-field col s6">
                    <input placeholder="Placeholder" id="send_pdf2" name="subject" type="text" value='Document - <?php echo $document->title?> #<?php echo $document->id?>'>
                    <label for="send_pdf2">Subject</label>
                  </div>
                  <div class="input-field col s12">
                    <textarea id="textarea1" class="materialize-textarea" style='height:160px;' name='message'>Dear user,

  We have issued the document "<?php echo $document->title?>"
  You can access the link by accessing the following link

<a href="<?php echo $link?>view.php?token=<?php echo base64_encode('pdf-'.$document->id)?>">PDF Version</a>
<a href="<?php echo $link?>view.php?token=<?php echo base64_encode('doc-'.$document->id)?>">Doc Version</a>

  If you have further questions, don't hesitate to contact us!
  </textarea>
                    <label for="textarea1">Message</label>
                  </div>
                  <button type='submit' style='visibility:hidden;'>Submit</button>
                </div>
              </div>          
            </form>
          </div>

      </div>
      <div class="modal-footer">
        <a class="waves-effect waves-light btn sendbtn" style='display:none;' onclick="$('#sendEmail').submit();"><i class="material-icons left">send</i>Send email</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
  </div>

  <script>
    function showShare(type){
      $('.shareable, .sendbtn').hide();
      $('.collection-item').removeClass('active');

      if(type=='link'){
        $('#share_link').show();
        $('.activate-link').addClass('active');
      }
      if(type=='email'){
        $('#share_email, .sendbtn').show();
        $('.activate-email').addClass('active');
      }

    }
  </script>