<?php
   class Upload
 {
 	public $extensions = array( 'foto' => array('JPG','GIF','BMP','PNG','JPEG'),'attach' => array('PDF','DOC','TXT','XDOC','DOCX','RAR','ZIP','PSD')
 							 );
 	public $extension_type = 'foto';
 	public $max_size = 20;
   	function Upload($ext='foto',$size=20)
 		{
 			$this->extension_type = $ext;
 			$this->max_size = $size;
 		}
   	function UploadFile($path, $pathDir, $resize = false, $modif = false)
 		{
 			if($path['size'] > $this->max_size*1024*1024)
 				return false;
   			$nn = isset($path['name'])?$path['name']:'';
 			$fExt = strtoupper(end(explode('.',$nn)));
 			if(!in_array($fExt,$this->extensions[$this->extension_type]))
 				return false;
   			$pathDir = str_replace('//','/',$pathDir.'/');
 			
 			$name = $path['name'];
 			$saveName = $pathDir . $name;
 			$thmName = $pathDir . '/thumb/' . $name;
   			if(@move_uploaded_file($path['tmp_name'],$saveName))
 				{
 					if(is_array($resize))$this->resize_fix($saveName,$thmName,$resize['w'],$resize['h'],100);
 					if(is_array($modif))$this->resize_fix($saveName,$saveName,$modif['w'],$modif['h'],100);
 					return $name;
 				}
 			return false;
 		}
 		
 	function importFile($path, $pathDir, $resize = false, $modif = false){
 		
 			$pathDir = str_replace('//','/',$pathDir.'/');
   			$name = $path;
 			$saveName = $pathDir . $name;
 			$thmName = $pathDir . '/thumb/' . $name;
   			if(rename('../shoes/'.$path,$saveName))
 				{
 					if(is_array($resize))$this->resize_fix($saveName,$thmName,$resize['w'],$resize['h'],100);
 					if(is_array($modif))$this->resize_fix($saveName,$saveName,$modif['w'],$modif['h'],100);
 					return $name;
 				}
 			return false;
 	}
       	function resize($img,$newfile,$nheight,$nwidth=false)
 		{
 			preg_match('/\.([A-Za-z]+?)$/', $img, $matches);
             list($owidth, $oheight) = getimagesize($img);
             if($owidth/$oheight > $nwidth/$nheight){
             	$nheight=$nwidth*$oheight/$owidth;
             } else {
             	$nwidth=$nheight*$owidth/$oheight;
             }
               $resized = imagecreatetruecolor($nwidth, $nheight);
             if($matches[1] == 'png' || $matches[1] == 'PNG')
                 $original = imagecreatefrompng($img);
             if($matches[1] == 'jpg' || $matches[1] == 'jpeg' || $matches[1] == 'JPG' || $matches[1] == 'JPEG')
                 $original = imagecreatefromjpeg($img);
             if($matches[1] == 'gif' || $matches[1] == 'GIF')
                 $original = imagecreatefromgif($img);
             if($matches[1] == 'bmp' || $matches[1] == 'BMP')
                 $original = imagecreatefromwbmp($img);
             @imagecopyresampled($resized, $original, 0, 0, 0, 0, $nwidth, $nheight, $owidth, $oheight);
             if($matches[1] == 'png' || $matches[1] == 'PNG')
                 imagepng($resized,$newfile);
             if($matches[1] == 'jpg' || $matches[1] == 'jpeg' || $matches[1] == 'JPG' || $matches[1] == 'JPEG')
                 imagejpeg($resized,$newfile,100);
 			if($matches[1] == 'gif' || $matches[1] == 'GIF')
                 imagegif($resized,$newfile);
 			if($matches[1] == 'bmp' || $matches[1] == 'BMP')
                 imagewbmp($resized,$newfile);
 		}
 		
 	function resize_fix($source,$dest,$nw,$nh=false,$q=100) {
 		$size = getimagesize($source);
 		$w = $size[0];
 		$h = $size[1];
   		$stype = strtolower(end(explode('.',$source)));
 		switch($stype) {
 			case 'gif':
 			$simg = imagecreatefromgif($source);
 			break;
 			case 'jpg':
 			$simg = imagecreatefromjpeg($source);
 			break;
 			case 'png':
 			$simg = imagecreatefrompng($source);
 			break;
 		}
   		if(!$nh)$nh=$nw;
   		$dimg = imagecreatetruecolor($nw, $nh);
 		$wm = $w/$nw;
 		$hm = $h/$nh;
 		$h_height = $nh/2;
 		$w_height = $nw/2;
   		if($wm>$hm) {
 			$adjusted_width = $w / $hm;
 			$half_width = $adjusted_width / 2;
 			$int_width = $half_width - $w_height;
 			imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
 		} elseif(($wm<$hm) || ($wm == $hm)) {
 			$adjusted_height = $h / $wm;
 			$half_height = $adjusted_height / 2;
 			$int_height = $half_height - $h_height;
 			imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
 		} else {
 			imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
 		}
   		@imagejpeg($dimg,$dest,$q);
 	}
   }
?>