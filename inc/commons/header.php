  <div class="progress indigo darken-2" id='preloader'>
      <div class="indeterminate"></div>
  </div>
        
<header></header>  
  <div class="navbar-fixed">
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="settings.php?menu=account">My account</a></li>
      <li><a href="documents.php?menu=mine">My documents</a></li>
      <li><a href="help.php">Help</a></li>
      <li class="divider"></li>
      <li><a href="?logout">Log out</a></li>
    </ul>
    <nav>
      <div class="nav-wrapper light-blue  darken-2 ">
        <a href="./" class="brand-logo"><img src="style/images/logo.png" alt=""></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php echo $user->userinfo->surname?> <?php echo $user->userinfo->name?><i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>
  </div>
        <ul id="slide-out" class="side-nav fixed">
          <li><a href="index.php" class='waves-effect waves-light  <?if(!$menu)echo "active";?>'><i class="material-icons">dashboard</i> Dashboard</a></li>
          <?if($user->has_access('documents')){?>
          <li><a href="documents.php?menu=add_document" class='waves-effect waves-light  <?if(!$menu)echo "active";?>'><i class="material-icons">add</i> New Document</a></li>
          <li><a href="documents.php" class='waves-effect waves-light  <?if($menu=='documents')echo "active";?>'><i class="material-icons">av_timer</i> Documents</a></li>  
          <?}?>
          <?if($user->has_access('templates')){?>
          <li><a href="documents.php?menu=templates" class='waves-effect waves-light  <?if($menu=='templates')echo "active";?>'><i class="material-icons">receipt</i> Templates</a></li>  
          <?}?>
          <?if($user->has_access('users')){?>
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
              <li>
                <a class="collapsible-header waves-effect waves-light  <?if($menu=='users')echo "active";?>"><i class="material-icons">accessibility</i>Users<i class="mdi-navigation-arrow-drop-down"></i></a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="users.php" class='waves-effect waves-light'>Users list</a></li>
                    <li><a href="users.php?menu=roles" class='waves-effect waves-light'>Roles</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <?}?>
          <li><a href="recent.php" class='waves-effect waves-light  <?if($menu=='recent')echo "active";?>'><i class="material-icons">av_timer</i> Recent activity</a></li>          
          <?if($user->has_access('settings')){?>
          <li><a href="settings.php" class='waves-effect waves-light  <?if($menu=='settings')echo "active";?>'><i class="material-icons">settings</i> Site settings</a></li>  
          <?}?>        
        </ul>