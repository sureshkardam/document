<?
    if(isset($_GET['edit'])){
        $info = $db->select_row('templates',array('id'=>$_GET['edit']));
        $act="Save";
    }else{
        $act='Create';
    }

    if(!$info){
        $info = (object) array();
       $info->increment = 1; 
    } 
?>
<script>
$('#pageTitle').html('<?if($info->name){?>Edit template "<?php echo $info->name?>"<?}else{?>Create new template<?}?>');
</script>


                    <div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
                        <a class="btn-floating btn-large waves-effect waves-light red" href="documents.php?menu=templates" ><i class="material-icons">reply</i></a>
                    </div>

              <div id="docBase" class='row'>
                    <div class="col s3">
                              <div class="collection">
                                <a class="collection-item collection-header grey darken-3 white-text"><h6>Available variables for this document</h6></a>
                                <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{System.Increment}');return false;" class="collection-item">{System.Increment}</a>
                                <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'{System.CurrentDate}');return false;" class="collection-item">{System.CurrentDate}</a>
                                         <div id="vars">
                                            <?
                                                $vars = $db->select('variables',array('template'=>$_GET['edit']));
                                                if(!$info)$vars =$_SESSION['variables'];

                                                foreach($vars as $v){?>
                                            <a href="#" onclick="tinyMCE.execCommand('mceReplaceContent',false,'<?php echo $v->token?>');return false;" class="collection-item"><?php echo $v->token?></a>
                                            <?}?>
                                            <?
                                            if(!$vars){?>
                                                <a href="#" class="collection-item red-text">There are no variables created yet. Press the button below to edit or create variables for this document</a>
                                            <?}?>
                                        </div>                               
                                              <a class="modal-trigger waves-effect waves-light btn collection-item black-text" href="#modal1" onclick="$('.TheToken').focus();">Create / Manage Variables</a>
                              </div>
                    </div>
                    <div class="col s9">
                        <div class="card-panel" style='margin-top:8px;'>
                                <?
                                $form2= new Form('test');
                                $form2->addElement(array(
                                    'type'=>'text',
                                    'label'=>'Template name',
                                    'name'=>'name',
                                    'value'=>$info->name,
                                    'class'=>'error',
                                    'attributes'=>array('required'=>'')
                                    ));                                 

                                $form2->addElement(array(
                                    'type'=>'text',
                                    'label'=>'Increment',
                                    'name'=>'increment',
                                    'value'=>$info->increment,
                                    'class'=>'error',
                                    'attributes'=>array('required'=>'')
                                    )); 

                                $form2->addElement(array(
                                    'type'=>'textarea',
                                    'label'=>'',
                                    'name'=>'content',
                                    'value'=>$info->content,
                                    'class'=>'colorpicker'
                                    ));                                                     

                                $form2->addElement(array(
                                    'type'=>'submit',
                                    'label'=>'',
                                    'name'=>'add_template',
                                    'value'=>$act.' template',
                                    'class'=>'btn btn-primary'
                                    ));

                                    $form2->render();
                                ?>
                        </div>
                    </div>

                    <div class="clear"></div>

                    <script src='style/js/tinymce/tinymce.min.js'></script>
                    <script>
                        tinymce.init({
                          selector: 'textarea',
                          height: 400,
                          theme: 'modern',
                          plugins: [
                            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                            'insertdatetime media nonbreaking save table contextmenu directionality',
                            'emoticons template paste textcolor colorpicker textpattern imagetools'
                          ],
                          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
                          toolbar2: '',
                          image_advtab: true,
                          templates: [
                            { title: 'Test template 1', content: 'Test 1' },
                            { title: 'Test template 2', content: 'Test 2' }
                          ]
                         });

                    </script>

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Document Variable List</h4>
<div class="row">
    <div class="col s4">
           <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">New variable</span>       
                                                                   
                                <?
                                $form2= new Form('variables');
                                $form2->addElement(array(
                                    'type'=>'text',
                                    'label'=>'Field name',
                                    'name'=>'name',
                                    'value'=>'',
                                    'class'=>'newToken',
                                    'attributes'=>array('autosuggest'=>'false','id'=>'name','required'=>'')
                                    ));                                    

                                $form2->addElement(array(
                                    'type'=>'text',
                                    'label'=>'Variable',
                                    'labelClass'=>'active',
                                    'name'=>'token',
                                    'value'=>'',
                                    'class'=>'TheToken',
                                    'attributes'=>array('autosuggest'=>'false','id'=>'token','readonly'=>'')
                                    ));                            
                                                   

                                $form2->addElement(array(
                                    'type'=>'submit',
                                    'label'=>'',
                                    'name'=>'add_variable',
                                    'value'=>'Add variable',
                                    'class'=>'btn btn-primary',
                                    'attributes'=>array()
                                    ));

                                    $form2->render();
                                ?>
            </div>
        </div>
    </div>
    <div class="col s8">
                             <table id="TokensTable" class="striped highlight bordered" cellspacing="0" width='100%'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Field Name</th>
                                        <th>Variable</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Field Name</th>
                                        <th>Variable</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </tfoot>
                            </table>       
    </div>
</div>



    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">I'm done</a>
    </div>
  </div>

          

<script>

    $('.newToken').on("input", function() {
        var dInput = this.value;
        dInput = dInput.replace(/\s+/g, '');
        $('.TheToken').val("{"+dInput+"}");
        $('.TheToken').trigger("focus");
        $('.newToken').trigger("focus");
    });

$(document).ready(function() {

    delete_item=function(the_id){
        $.ajax({
            url: 'inc/views/documents/ajax.php?delete',
            type: 'POST',
            dataType: 'html',
            data: {id: the_id},
        })
        .done(function() {
            Materialize.toast('The variable has been deleted!', 3000, 'orange darken-2') // 'rounded' is the class I'm applying to the toast
            $('#TokensTable').dataTable()._fnAjaxUpdate();
        });
        refresh_vars();
    }


    var table = $('#TokensTable').DataTable( {
        "ajax": 'inc/views/documents/ajax.php?template=<?php echo $_GET['edit']?$_GET['edit']:'temp';?>',
                           language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search...",
                        sLengthMenu: "_MENU_"
                    }
    } );

    refresh_vars = function(){
        $.ajax({
            url: 'inc/views/documents/ajax.php?varlist=<?php echo $_GET['edit']?$_GET['edit']:'temp';?>',
            type: 'POST',
            dataType: 'html',
            data: {name: $('#name').val(),token: $('#token').val(),template:'<?php echo $_GET['edit']?$_GET['edit']:'temp';?>'},
        })
        .done(function(data) {
            $('#vars').html(data);
        });
    }


    $('#variables').on('submit',function(event){
        $.ajax({
            url: 'inc/views/documents/ajax.php?add',
            type: 'POST',
            dataType: 'html',
            data: {name: $('#name').val(),token: $('#token').val(),template:'<?php echo $_GET['edit']?$_GET['edit']:'temp';?>'},
        })
        .done(function() {
            Materialize.toast('The variable has been added!', 3000, 'light-green darken-3') // 'rounded' is the class I'm applying to the toast
            $('#TokensTable').dataTable()._fnAjaxUpdate();
            refresh_vars();
        });        
        
        $('#name').val('');
        $('#token').val('');
        event.preventDefault();
    })
} );
</script>

</div>