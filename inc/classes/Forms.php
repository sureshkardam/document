<? if ( ! defined('BASEDIR')) exit('Acces denied');

class Form{
	public function __construct($name='form',$method="post",$noform=0){
		$this->render="<form action='' method='".$method."' id='".$name."' class='form-horizontal'>";
		if($noform==1){
			$this->noform=1;
			$this->render='';
		}
		$this->crt_elem = 0;
	}

	public function addElement($elem){
		$this->crt_elem++;

		$text.='<div class="row"><div class="input-field  col s12">';
		if(!isset($elem['attributes'])){
			$elem['attributes']=array();
		}		
		if(!$elem['attributes']['id']){
			$elem['attributes']['id']="element".$this->crt_elem;
		}
		if(!isset($elem['options'])){
			$elem['options']=array();
		}

		foreach($elem['attributes'] as $tag=>$val){
			$atts.=" ".$tag.'="'.$val.'"';
		}

		if($elem['type']=='text'){
			$text.= "<input type='text' name='".$elem['name']."' value='".$elem['value']."' class='".$elem['class']."' ".$atts."/>";
		}

		if($elem['type']=='color'){
			$text.= "<input type='color' name='".$elem['name']."' value='".$elem['value']."' class='".$elem['class']."' ".$atts."/>";
		}

		if($elem['type']=='password'){
			$text.= "<input type='password' name='".$elem['name']."' class='".$elem['class']."' ".$atts."/>";
		}

		if($elem['type']=='button'){
			$text.= "<input type='button' name='".$elem['name']."'  value='".$elem['value']."' class='".$elem['class']."' ".$atts."/>";
		}

		if($elem['type']=='submit'){
			$text.= "<input type='submit' name='".$elem['name']."'  value='".$elem['value']."' class='".$elem['class']."' ".$atts."/>";
		}

		if($elem['type']=='textarea'){
			$text.= "<textarea  name='".$elem['name']."'   class='".$elem['class']."' ".$atts.">".$elem['value']."</textarea>";
		}

		
		if($elem['type']=='select'){
			$text.= "<select  name='".$elem['name']."'  class='".$elem['class']."' ".$atts.">";
					$text.="<option value=''>Select</option>";
				foreach($elem['options'] as $tag=>$val){
					if($elem['value']==$tag || $elem['value']==$val)$sel='selected'; else $sel='';
					$text.="<option value='".$tag."' ".$sel.">".$val."</option>";
				}
			$text.="</select>";
		}
		
		if($elem['type']=='radio'){
				foreach($elem['options'] as $tag=>$val){
					$text .= "<input type='radio' name='".$elem['name']."' value='".$tag."' class='".$elem['class']."' ".$atts."/> <label class='radio' for='element".$this->crt_elem."'> ".$val."</label> \n";
				}
		}
		
		if($elem['type']=='checkbox'){
			if(!is_array($elem['value']))$elem['value']=array();

				foreach($elem['options'] as $tag=>$val){
			$text.='<p>';
					$z++;
					if(in_array($tag,$elem['value']) || in_array($val,$elem['value'])) $sel='checked'; else $sel='';
					$text .= "<input type='checkbox' name='".$elem['name']."' value='".$tag."' id='element".$this->crt_elem.$z."' class='".$elem['class']."' ".$atts." ".$sel."/> <label for='element".$this->crt_elem.$z."'> ".$val."</label>\n";
			$text.="</p>";
				}

		}
		$text.='<label for="'.$elem['attributes']['id'].'" class="'.$elem['labelClass'].'">'.$elem['label'].':</label>';
		$text.='</div></div>';

		if($elem['type']=='html'){
			$text=$elem['value'];
		}


		$this->addtoRender($text);

	}


	private function addToRender($text){
		$this->render.=$text."\n\n";
	}

	public function render(){
		if($this->noform==1){
			echo $this->render;
		}else{
			echo $this->render."</form>";
		}
	}


	//validate requests;
	public function validate_request($array){
		foreach($array as $val){
			if($_POST[$val]==''){
				$error[]=$val;
			}
		}
		if($error){
			$this->errors=$error;
			return 0;
		}else{
			return 1;
		}
	}

	// grab form data
	public function get_post_data($post){
		foreach($post as $val){
			if(is_array($_POST[$val]))$return[$val]=$_POST[$val];
			else
			$return[$val]=mysql_real_escape_string($_POST[$val]);

		}
		return $return;
	}

	public function getErrors(){
		return $this->errors;
	}

}

$form=new Form;