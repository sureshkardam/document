     <button class="btn waves-effect waves-light" type="button" name="action" onclick="$('#settings_form').submit();" style="position:absolute; top: 90px; right: 24px;">Update settings
        <i class="material-icons right">send</i>
     </button>
      <form class="col s12" action="" id='settings_form' method='post'>
      <div class="row">    
        <div class="col s12 m6">
          <div class="card white darken-1">
            <div class="card-content black-text">
              <span class="card-title">General settings</span>

              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="site_title" name="site_title" type="text" class="validate" value="<?php echo $cfg->site_title?>">
                      <label for="site_title">Site title</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col s12">
                      <label for="email">Allow export</label>
                      <div class="clearfix"></div>
                        <!-- Switch -->
                        <div class="switch">
                          <label>
                            PDF&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" value='1' name="enable_pdf" <?if($cfg->enable_pdf) echo "checked";?>>
                            <span class="lever"></span>
                          </label>
                        </div>
                        <div class="clear" style='height:10px;'></div>
                        <!-- Switch -->
                        <div class="switch">
                          <label>
                            DOCX
                            <input type="checkbox" value='1' name="enable_docx" <?if($cfg->enable_docx) echo "checked";?>>
                            <span class="lever"></span>
                          </label>
                        </div>
                        <!-- Switch -->
                        <div class="clear" style='height:10px;'></div>
                        <div class="switch">
                          <label>
                            HTML
                            <input type="checkbox" value='1' name="enable_html" <?if($cfg->enable_html) echo "checked";?>>
                            <span class="lever"></span>
                          </label>
                        </div>
                        <input type="hidden" name='save_settings' value='true'>
                        <div class="clear" style='height:20px;'></div>
                                                                        <!-- Switch -->
                        <div class="clear" style='height:10px;'></div>
                        <div class="switch">
                          <label>
                            <input type="checkbox" value='1' name="user_documents" <?if($cfg->user_documents) echo "checked";?>>
                            <span class="lever"></span>
                            Users can see only documents created by them
                          </label>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="card white darken-1">
            <div class="card-content black-text">
              <span class="card-title">E-mail settings</span>

              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="emailfrom2" name="email_from_email" type="text" class="validate" value="<?php echo $cfg->email_from_email?>">
                      <label for="emailfrom2">E-mail from:</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="emailfromanem" name="email_from_name" type="text" class="validate" value="<?php echo $cfg->email_from_name?>">
                      <label for="emailfromanem">E-mail from name:</label>
                    </div>
                  </div>
               </div>
              </div>
            </div>
          </div>
        </div>
</div>
</form>