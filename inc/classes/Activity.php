<?
	class Activity{
		public function __construct(){
			global $user;
			$this->user = $user;
		}

		public function Add($name){
			global $db;
			$arr = array();
			$arr['name']=$name;
			$arr['user']=$this->user->userinfo->id;
			$arr['date']=time();

			$db->insert($arr,'activity');
		}

		public function getActivity($user=''){
			global $db;
			$act = array();
			
			if(!$user)$user = $this->user->userinfo->id;
			$act = $db->select('activity',array('user'=>$user),array('id'=>'desc'));

			return $act?$act:array();
		}
	}

	$activity = new Activity();
?>