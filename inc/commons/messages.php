<? if($error){
if($error['type']=='success'){
	$color = "light-green lighten-2"; 
}
if($error['type']=='error'){
	$color = "red lighten-3"; 
}
	?>
            <div class="container">
              <div class='row'>
                    <div class="card-panel z-depth-1 <?php echo $color?>"> <span class="black-text"><?php echo $error['message']?></span> </div>
              </div>
            </div>
<?}?>