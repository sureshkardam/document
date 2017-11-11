<?
    $error = "";
    $success = "";

    if(isset($_POST['site_title'])){
        // Connect to t he database
        try {
            $db = new PDO("mysql:host=".$_POST['db_host'].";dbname=".$_POST['db_name'], $_POST['db_user'], $_POST['db_pass']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            $error = "Cannot connect to the database";
        } 

        //Run DB populate scripts   
        try{
            $sql_file = file_get_contents('install.sql');   
            $qr = $db->exec($sql_file); 
            
            $sql = "INSERT INTO users (username, email, name, password, role, date) VALUES ('".$_POST['admin_username']."', 'admin@example.com','Administrator','".md5($_POST['admin_password'])."', '2', '".time()."')";
            $qr = $db->exec($sql); 
        }
        catch(PDOException $e)
        {
            $error = "Error trying to populate the database!";
        } 

        if(!$error){
            $oldFile = '../inc/config/database.bkp';
            $newFile = '../inc/config/database.php';

            if(copy($oldFile, $newFile)){
                $str=file_get_contents($newFile);
                $str=str_replace("dbhostname", $_POST['db_host'], $str);
                $str=str_replace("dbuser", $_POST['db_user'], $str);
                $str=str_replace("dbpass", $_POST['db_pass'], $str);
                $str=str_replace("dbname", $_POST['db_name'], $str);
                file_put_contents($newFile, $str);                
            }
            $success = "Installation complete. Please remember to remove the installation folder for security reasons. <br/> <a href='../' style='color:#fff; font-size:22px; font-weight:400;'>Log in now</a>";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Install Majestic document generator</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../style/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="../style/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="shortcut icon" href="../style/favicon.ico?V=2" type="image/x-icon">
    <link rel="icon" href="../style/favicon.ico?V=2" type="image/x-icon">
</head>

<body>   
    <div class="installer">
        <div class="row">
            <div class="col s12 m12">
                <div class="card white darken-1">
                    <div class="card-content dark-text">
                        <div class="card-title" style='text-align:center;'><img src="../style/images/favicon.png" alt=""></div>
                        <div class="card-title" style='text-align:center;'>Install Majestic document generator</div>
                             <?if($error){?>  
                              <div class="row">
                                <div class="col s12">
                                  <div class="card red darken-1">
                                    <div class="card-content white-text">
                                      <p><?php echo $error?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?}?>
                              <?if($success){?>  
                              <div class="row">
                                <div class="col s12">
                                  <div class="card green darken-1">
                                    <div class="card-content white-text">
                                      <p><?php echo $success?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?}else{?>                             
                        <div class="row">
                            <form class="col s12" method='post' action='' id='installer'>
                                <div class="row">
                                    <div class="col s12">
                                        <h5>Database information</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input value="Majestic document generator" name='site_title' id="site_title" type="text" class="validate">
                                        <label for="site_title">Site Title</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="db_host">Database Host</label>
                                        <input value="localhost" id="db_host" name='db_host' type="text" class="validate" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="db_name">Database Name</label>
                                        <input value="majestic" id="db_name" name='db_name' type="text" class="validate" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="db_user">Database User</label>
                                        <input value="root" id="db_user" name='db_user' type="text" class="validate" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="db_pass">Database Password</label>
                                        <input value="" id="db_pass" name='db_pass' type="password" class="validate">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <h5>Administrator account</h5>
                                        <strong>Be sure to remember the credentials as they are required for login</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="admin_username">Admin username</label>
                                        <input value="admin" id="admin_username" name='admin_username' type="text" class="validate">
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="input-field col s12">
                                        <label for="admin_password">Admin password</label>
                                        <input value="" id="admin_password" name='admin_password' type="password" class="validate">
                                    </div>
                                </div>                                
                            </form>
                        </div>
                        <?}?>
                    </div>
                    <?if(!$success){?>
                    <div class="card-action">
                        <a href="#">Cancel</a>
                        <a href="#" style='float:right; color:#0313AB' onclick="$('#installer').submit();">Install</a>
                    </div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <style>
    body {
        background: #292946;
    }
    @media only screen and (min-width:960px){
        .installer{
        	width:40%;
        }
    }

    .installer {
        margin: auto;
        min-height: 200px;
        margin-top: 50px;
    }
    </style>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../style/js/materialize.js"></script>
    <script src="../style/js/init.js"></script>
</body>

</html>
