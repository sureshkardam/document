      <div class="row">    
        <div class="col s12 m6">
          <div class="card white darken-1">
            <div class="card-content black-text">
              <span class="card-title">Account information</span>

              <div class="row">
                <form class="col s12" action="" id='settings_form' method='post'>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="name" name="name" type="text" class="validate" value="<?php echo $user->userinfo->name?>">
                      <label for="name">Name</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="surname" name="surname" type="text" class="validate" value="<?php echo $user->userinfo->surname?>">
                      <label for="surname">Surname</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <input id="email" name="email" type="text" class="validate" value="<?php echo $user->userinfo->email?>">
                      <label for="email">Email</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col s12">
                      <button class="btn waves-effect waves-light" type="submit" name="update_acc_info">Update account information</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card white darken-1">
            <div class="card-content black-text">
              <span class="card-title">Change password</span>

              <div class="row">
                <form class="col s12" action="" id='settings_form' method='post'>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="old_pass" name="old_pass" type="password" value="">
                      <label for="old_pass">Old password</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="old_pass_r" name="old_pass_r" type="password" value="">
                      <label for="old_pass_r">Repeat old password</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="new_pass" name="new_pass" type="password" value="">
                      <label for="new_pass">New password</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col s12">
                      <button class="btn waves-effect waves-light" type="submit" name="update_password">Reset password</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

      </div>