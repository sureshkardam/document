<?
    include "inc/App.php";
    $error = array();
         if(isset($_POST['logins'])){
        if($user->logIn($_POST)){
            header("Location: index.php");
        }else{
            $error['type']      = 'info';
            $error['message']   = "The login information is invalid!";  
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Login &middot; <?php echo $cfg->site_title?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="style/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="style/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="style/css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" href="./style/favicon.ico?V=2" type="image/x-icon">
  <link rel="icon" href="./style/favicon.ico?V=2" type="image/x-icon">  
</head>
<body>
                        <?if($error){?>  
      <div class="row">
        <div class="col s4 push-s4">
          <div class="card red darken-1">
            <div class="card-content white-text">
              <span class="card-title">Oops!</span>
              <p>It seems that you entered the wrong credentials. Please try again.</p>
            </div>
          </div>
        </div>
      </div>
      <?}?>
<div class="materialContainer">
   <div class="box">
      <div class="title"><img src="style/images/favicon.png" alt="">Login</div>

      <form class="col s12" action='' method='post' autocomplete="off">
<div style="display: none;">
 <input type="text" id="PreventChromeAutocomplete" 
  name="PreventChromeAutocomplete" autocomplete="address-level4" />
</div>
         <div class="row">
          <div class="input-field col s12">
            <input id="username" type="text" name='username' class="validate">
            <label for="username">Username</label>
          </div>
        </div>     
        <div class="row">
          <div class="input-field col s12">
            <input id="password" type="password" name='password' class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class='col s5 push-s7'>

           <button class="btn waves-effect waves-light light-blue" type="submit" name="logins">Submit
              <i class="material-icons right">send</i>
            </button>
          </div>
        </div>

      </form>

   </div>

</div>
<? include "inc/commons/footer.php";?>
<style>
  /* Change the white to any color ;) */
input:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset!important;
}
</style>
  </body>
</html>