<? if ( ! defined('BASEDIR')) exit('Acces denied');

class Db {
    // define properties
    public $host;
    public $username;
    public $password;
    public $db;

    // constructor
    public function __construct() {
    	global $cfg;
			mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("<font color=\"darkred\"><b>Cannot connect to the database!</b></font>");
			mysql_select_db(DB_NAME) or die("<font color=\"darkred\"><b>Database not found!</b></font>");
		
    }

    public function getConfig(){
    	$config = (object) array();
		$res=mysql_query("select * from config")or die(mysql_error());
			while($row=mysql_fetch_arraY($res)){
				
				$config->$row['name']=$row['value'];

			}	
			return $config;
    }


    //select
	public function select($table,$where=array(),$order=array(),$limit=array('from'=>0,'to'=>10000)){
		$c[]='1=1';
		$ord = "";
		if($order){
			foreach($order as $tag=>$val){
				$o[]=' '.$tag." ".$val;
			}
			if($o){
				$ord="order by ".implode(',',$o);			
			}
		}
		foreach($where as $tag=>$val){
			$c[]=$tag."='".$val."'";
		}

		$r=array();
		$this->query = "select * from ".$table." where ".implode(' AND ',$c)." ".$ord." LIMIT ".$limit['from'].",".$limit['to'];
 		$res=mysql_query("select * from ".$table." where ".implode(' AND ',$c)." ".$ord." LIMIT ".$limit['from'].",".$limit['to'])or die("eroare1:".mysql_error()."<br/><b>Query:</b>select * from ".$table." where ".implode(' AND ',$c)." ".$o);
 		while($row=mysql_fetch_array($res)){
 			$r[]= (object) $row;
 		}
 		return $r;
 	}

 	public function select_row($table,$where,$order=array(),$limit=array('from'=>0,'to'=>10000)){
 		$r = array();
 		$r=$this->select($table,$where,$order,$limit);
 		return $r[0];
 	}

	public function insert($array,$table){
	 	foreach($array as $tag=>$val){
	 		$cols[]=$tag;
	 		$vals[]=$val;
	 	}
	 	mysql_query("insert into ".$table."(".implode(",",$cols).") values('".implode("','",$vals)."')")or die(mysql_error());
	 	return mysql_insert_id();
 	}

	public function query($query){
	 	$res=mysql_query($query)or die(mysql_error());
	 	while($row=mysql_fetch_array($res)){
	 		$q[] = (object) $row;
	 	}

	 	return $q;
 	}


	public function update($array,$table,$where=array()){
		$c[]='1=1';
		foreach($where as $tag=>$val){
			$c[]=$tag."='".$val."'";
		}

	 	foreach($array as $tag=>$val){
	 		$cols[]=$tag;
	 		$vals[]=$val;

	 		$upd[]="".$tag."='".$val."'";
	 	}


 		mysql_query("update ".$table." SET ".implode(', ',$upd)." where ".implode(' AND ',$c)."")or die(mysql_error());
 		$this->query="update ".$table." SET ".implode(', ',$upd)." where ".implode(' AND ',$c)."";
 		#echo "update ".$table." SET ".implode(', ',$upd)." where ".implode(' AND ',$c)."<br/<br/>";
 		return true;
 	}

	public function delete($array,$table){
 		foreach($array as $col=>$val){
 			$cond[]=$col." = '".$val."'";
 		}
 		$where=implode(" AND ",$cond);

 		mysql_query("delete from ".$table." where ".$where)or die(mysql_error());
 }

 	public function count($table,$array=array()){
 		$cond=array();
 		foreach($array as $col=>$val){
 			$cond[]=$col." = '".$val."'";
 		}
 		$where=implode(" AND ",$cond);
 		if($where)$where=' where '.$where;

 		$res=mysql_query("select * from ".$table."".$where)or die(mysql_error());
 		return mysql_num_rows($res);
 	}

}    


$db = new Db;
$cfg = $db->getConfig();
?>