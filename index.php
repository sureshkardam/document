<?
    include "inc/App.php";
    $user->Protect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Dashboard</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="style/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="style/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="shortcut icon" href="./style/favicon.ico?V=2" type="image/x-icon">
  <link rel="icon" href="./style/favicon.ico?V=2" type="image/x-icon">  
</head>
<body>
<? include "inc/commons/header.php";?>
<main>      
    <div class="card-panel blue-grey darken-4">
      <span class="white-text text-darken-2"><h5>Dashboard</h5></span>
    </div>
    <div class="container homepage">

      <div class="row">
<?if($user->has_access('documents')){?>
        <div class="col s12 m4">
          <div class="card" onclick="top.location='documents.php?menu=add_document'">
            <div class="card-image">
              <span class="card-title">Create document</span>
            </div>
          </div>
        </div>
        <div class="col s12 m4">
          <div class="card" onclick="top.location='documents.php'">
            <div class="card-image" style='background:#DB4B59'>
              <span class="card-title">Documents</span>
            </div>
          </div>
        </div>
<?}?>
<?if($user->has_access('templates')){?>
        <div class="col s12 m4">
          <div class="card" onclick="top.location='documents.php?menu=templates'">
            <div class="card-image" style="background:#f6bb42;">
              <span class="card-title">Templates</span>
            </div>
          </div>
        </div>
<?}?>
        <div class="col s12 m4">
          <div class="card" onclick="top.location='recent.php'">
            <div class="card-image" style="background:#8C1A65;">
              <span class="card-title">Recent activity</span>
            </div>
          </div>
        </div>
<?if($user->has_access('users')){?>
        <div class="col s12 m4">
          <div class="card" onclick="top.location='users.php'">
            <div class="card-image" style="background:#86C43D;">
              <span class="card-title">Users</span>
            </div>
          </div>
        </div>
<?}?>
        <!-- <div class="col s12 m4">
          <div class="card" onclick="top.location='help.php'">
            <div class="card-image" style="background:#353535;">
              <span class="card-title">Help</span>
            </div>
          </div>
        </div> -->
      </div>
    </div>
</main>  

<?include "inc/commons/footer.php";?>

  </body>
</html>
