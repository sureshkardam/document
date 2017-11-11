<?
    include "inc/App.php";
    $user->Protect();

    $menu='recent';

    $file = 'list';
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Recent activity &middot; <?php echo $cfg->site_title?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="style/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="style/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="style/css/dataTables.bootstrap.css" type="text/css" media="screen, projection" rel="stylesheet" />
        <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="style/js/materialize.js"></script>
  <script src="style/js/init.js"></script>
  <link rel="shortcut icon" href="./style/favicon.ico?V=2" type="image/x-icon">
  <link rel="icon" href="./style/favicon.ico?V=2" type="image/x-icon">    
</head>
<body>
<? include "inc/commons/header.php";?>
        <main>      
            <div class="card-panel blue-grey darken-4">
              <span class="white-text text-darken-2"><h5><i class="material-icons">av_timer</i> <span id='pageTitle'>Recent activity</span></h5></span>
            </div>
<? include "inc/commons/messages.php";?>
            <div class="container" id='big'>
              <div id="docBase" class='row'>
                    <div class="card-panel z-depth-1" id="formDoc">
                    <table id="dataTable" class="responsive-table striped highlight bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Activity</th>
                                                <th>Date</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Activity</th>
                                                <th>Date</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?  
                                                $act = $activity->getActivity();
                                                foreach($act as $u){
                                                    $template = $db->select_row('templates',array('id'=>$u->template));
                                                    $user = $db->select_row('users',array('id'=>$u->user));
                                                    ?>
                                            <tr>
                                                <td><?php echo $u->id?></td>
                                                <td><?php echo strip_tags($u->name)?></td>
                                                <td><?php echo date('d/m/Y H:i',$u->date)?></td>
                                                <td class='actions'>
                                                  <a href="#" class='deleteitem tooltipped' data-table='activity' data-id='<?php echo $u->id?>' data-position="top" data-delay="10" data-tooltip="Delete"><i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                            <?}?>
                                        </tbody>
                </table>
                    </div>
              </div>
            </div>
        </main>  

        <script src="style/js/jquery.dataTables.js" type="text/javascript" ></script>
         <script type="text/javascript">
          $(function() {
              table1 = $('#dataTable').DataTable({
                //bLengthChange:false,
                   language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search...",
                        sLengthMenu: "_MENU_"
                    },
                    "order": [[ 0, "desc" ]]
              });
              $('select').material_select('destroy');
              $('select').material_select();
          });
        </script>       
  </body>
</html>
