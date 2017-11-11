<?
    $templates = $db->select('templates',array(),array('id'=>'desc'));
    foreach($templates as $r){
        $templ[$r->id]=$r->name;
    }
	
    $templ["newDoc"] = "New template...";

?>     

            <script>$('#pageTitle').html('Create document'); </script>

              <div id="docBase" class='row'>
                <div  id="formDoc" class='col s3'>
                    <div class="card-panel">
                    <div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
                            <a class="btn-floating btn-large waves-effect waves-light red" href="documents.php" ><i class="material-icons">reply</i></a>
                    </div>
                                    <?
                                    $form2= new Form('test');
                                                                 
                            
                                    $form2->addElement(array(
                                        'type'=>'select',
                                        'label'=>'Template',
                                        'name'=>'template',
                                        'value'=>$info->role,
                                        'options'=>$templ,
                                        'class'=>'error',
                                        'attributes'=>array('id'=>'changeTemplate','required'=>'')
                                        ));    
                                    $form2->addElement(array(
                                        'type'=>'text',
                                        'label'=>'Document title',
                                        'name'=>'title',
                                        'value'=>$info->name,
                                        'class'=>'error',
                                        'attributes'=>array('required'=>'')
                                        ));       

                                    $form2->addElement(array(
                                        'type'=>'html',
                                        'value'=>"<div id='newforms'></div>"
                                        ));

                                    $form2->addElement(array(
                                        'type'=>'submit',
                                        'label'=>'',
                                        'name'=>'create_document',
                                        'value'=>'Create document',
                                        'class'=>'btn btn-primary'
                                        ));

                                        $form2->render();
                                    ?>

                                <div class="clear"></div>

</div>
</div>

<div class="card-panel z-depth-1 col s9" id="showDoc">
    <div style="padding:15px;">
        <iframe src="documents.php?menu=dummy" frameborder="0" id="inlineIframe" style='width:100%; height:700px;'></iframe>
    </div>
</div>

</div>



<script>
    function setTyping(){
        $('.ontype').on("input", function() {
            var dInput = this.value;
            $('#inlineIframe').contents().find('.var_'+$(this).data('var')).html(dInput);
        });

        $( ".ontype" ).focus(function() {
          $('#inlineIframe').contents().find('.var_'+$(this).data('var')).addClass('highlighted');
        }).focusout(function() {
          $('#inlineIframe').contents().find('.var_'+$(this).data('var')).removeClass('highlighted');
        });
    }

    $('#changeTemplate').change(function(){
        if($(this).val()=='newDoc'){
            top.location="documents.php?menu=add_template";
            return false;
        }
        if($(this).val()){
            $('#formDoc').addClass('col s3');
            $('#showDoc').fadeIn('fast');
          // $('#big').removeClass('container');

            $.ajax({
                url: 'inc/views/documents/ajax.php?getForm='+$(this).val(),
                type: 'GET',
                dataType: 'HTML',
                data: {param1: 'value1'},
            })
            .done(function(data) {
                $('#newforms').html(data);
                setTyping();
            });        

            $.ajax({
                url: 'inc/views/documents/ajax.php?getFormContent='+$(this).val(),
                type: 'GET',
                dataType: 'HTML',
                data: {param1: 'value1'},
            })
            .done(function(data) {
                $('#content_document').html(data);
                $('#inlineIframe').contents().find('#dummyDiv').html(data);

                $( ".ontypesystem" ).trigger( "input" );

                Materialize.updateTextFields();

                 $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15, // Creates a dropdown of 15 years to control year,
                    format: 'dd.mm.yyyy',
                    onSet: function(){
                        $( ".ontypesystem" ).trigger( "input" );
                    }
                  });
                     
            });

        }
        
    })

</script>