<?
    $user->Protect();
	$document = $db->select_row('documents',array('id'=>$_GET['Download']));

	if($_GET['type']=='pdf'){
		include "mpdf/mpdf.php";

		//==============================================================

		$mpdf=new mPDF('utf-8'); 

		$mpdf->WriteHTML($document->content );
		$mpdf->Output();
		exit;

		//==============================================================
	}


	if($_GET['type']=='doc'){
		include "Doc.php";

		//==============================================================
	
			$htmltodoc= new Html2Doc();
			$htmltodoc->createDocFromHTML($document->content,str_replace(' ','_',$document->title),true);

		//==============================================================
	}

	if($_GET['type']=='html'){

		//==============================================================
	
			echo $document->content;
			if(isset($_GET['print'])){
				echo "<script type='text/javascript'>window.print();</script>";
			}
			die();


		//==============================================================
	}
	
?>