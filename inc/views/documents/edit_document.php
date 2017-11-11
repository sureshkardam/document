              <div id="docBase" class='row'>
                    <div class="card-panel z-depth-1" id="formDoc">
<?
    $document = $db->select_row('documents',array('id'=>$_GET['id']));
	
$can_print_option = Array('1'=>'Allow','0'=>'Deny');
?>     
<script>
$('#pageTitle').html('Edit document "<?php echo $document->title?>"');
</script>


                    <div class="fixed-action-btn horizontal" style="top: 80px; right: 24px;">
                        <a class="btn-floating btn-large waves-effect waves-light red" href="documents.php" ><i class="material-icons">reply</i></a>
                    </div>

                                    <?
                                    $form2= new Form('test');
                                    $form2->addElement(array(
                                        'type'=>'text',
                                        'label'=>'Document title',
                                        'name'=>'title',
                                        'value'=>$document->title,
                                        'class'=>'error'
                                        ));  
									$form2->addElement(array(
                                        'type'=>'select',
                                        'label'=>'Can Print or Download',
                                        'name'=>'can_print',
                                        'value'=>$document->can_print,
                                        'options'=>$can_print_option,
                                        'class'=>'error',
                                        'attributes'=>array('id'=>'can_print','required'=>'')
                                        )); 

                                    $form2->addElement(array(
                                        'type'=>'textarea',
                                        'label'=>'Content',
                                        'name'=>'content',
                                        'value'=>$document->content,
                                        'class'=>'error'
                                        ));                                 
                            
                                    $form2->addElement(array(
                                        'type'=>'submit',
                                        'label'=>'',
                                        'name'=>'edit_document',
                                        'value'=>'Edit document',
                                        'class'=>'btn btn-primary'
                                        ));

                                        $form2->render();
                                    ?>
                                <div class="clear"></div>
<script src='style/js/tinymce/tinymce.min.js'></script>
                    <script>
                        tinymce.init({
                          selector: 'textarea',
                          height: 480,
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

</div></div>