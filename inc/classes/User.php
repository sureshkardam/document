<?
	class User extends Db{
		public function __construct(){
			#$this->db = new Db;
			if(isset($_COOKIE['user'])){
				$this->userinfo = $this->select_row('users',array('id'=>$_COOKIE['user'],'password'=>$_COOKIE['password']));
				$this->userrole = $this->select_row('roles',array('id'=>$this->userinfo->role));	
			}
				$this->loginFile = 'auth.php';

				if(isset($_GET['logout'])){
					$this->logOut();
					header("Location: ".$this->loginFile);
				}		
		}

		public function isLogged(){
			if(isset($_COOKIE['user'])){
				$this->userinfo = $this->select_row('users',array('id'=>$_COOKIE['user'],'password'=>$_COOKIE['password']));
				if($this->userinfo) return 1;
			}
		}		

		public function Protect(){
		    if(!$this->isLogged()){
		        header("Location:".$this->loginFile);
		    }
		}


		public function has_access($area){
			/**
			 * 0 - Manage documents
			 * 1 - Manage templates
			 * 2 - Manage users
			 * 3 - Manage settings
			 */
			$zone = array(
				'documents'=>0,
				'templates'=>1,
				'users'=>2,
				'settings'=>3,
				);

			$acc = unserialize($this->userrole->zones);
			if(in_array($zone[$area], $acc)){
				return true;
			}
			return false;
		}


		public function LogIn($form){
			global $activity;
			$exists = $this->select_row('users',array('username'=>$form['username'],'password'=>md5($form['password'])));
				if($exists){
					$this->setCookieLogin($exists,$form['remember']);
					$activity->Add("Log in");
					return 1;
				}
		}

		public function changePass($form){
			$this->isLogged();

			if(!$form['oldpass'] || !$form['newpass']){
				return 2;
			}

			if(md5($form['oldpass'])==$this->userinfo->password){
				$this->update(array('password'=>md5($form['newpass'])),'users',array('id'=>$this->userinfo->id));
				$new_info = $this->select_row('users',array('id'=>$this->userinfo->id));
				$_COOKIE['password']=md5($form['newpass']);
				$this->setCookieLogin($new_info);

				return 1;
			}


				return 0;
		}

		public function updateInfo($form){
			$this->isLogged();			
			$form = new Form();
			$type = $this->usertype;

			if($type=='2'){
				$data = $form->get_post_data(array('company_name','juridic','cui','nrregcom','social_address','country','city','employees','name','surname','position','phone','contact_email'));	
				if( !$data['company_name'] || !$data['juridic'] || !$data['cui']){return 2; }

			}else{
				$data = $form->get_post_data(array('name','surname','birthdate','city'));	
				if( !$data['name'] || !$data['surname']){return 2; }							
			}

			$this->update($data,'users',array('id'=>$this->userinfo->id));
			return 1;
		}

		public function LogOut(){
			global $activity;
		    unset($_COOKIE['user']);
		    unset($_COOKIE['password']);
		    setcookie('user', null, -1, '/');
		    setcookie('password', null, -1, '/');
		    $activity->Add("Log out");
		}

		public function Register($formdata,$type='1'){
			$form = new Form();

			if($type=='2'){
				$data = $form->get_post_data(array('company_name','email','pass','juridic','cui','nrregcom','social_address','country','city','employees','name','surname','position','phone','contact_email'));
				
				if( !$data['email'] || !$data['pass'] || !$data['company_name']){return 2; }

			}else{
				$data = $form->get_post_data(array('email','pass','name','surname','birthdate','city'));	
				if( !$data['email'] || !$data['pass']){return 2; }							
			}


			$exists = $this->select_row('users',array('email'=>$data['email']));
			if($exists){ return 1; }			

			$data['password']	=md5($data['pass']);
			$data['data']		=time();
			$data['type']		=$type;

			$this->insert_check($data,'users');
			$this->sendEmail($array,'register');
			return 9;
		}

		private function sendEmail($array,$tip){
			global $cfg;

			if($tip = 'register'){
				$content = "<img src='".$cfg->url."style/images/logo.png' width='250'/><br/><br/> Bine ai venit pe catalogterenuri.ro, <b>".$array['prenume']."</b>!<br/><br/>";
				$content.= "Datele de login pentru contul tau sunt:<br/><br/>";

				$content.="E-mail: <b>".$array['email']."</b><br/>";
				$content.="Parola: <b>".$array['pass']."</b><br/><br/>";
				$content.="Pentru a accesa contul tau te rugam sa mergi la adresa: <a href='".$cfg->url."/login'>".$cfg->url."/login</a><br/><br/> <i>Echipa CatalogTerenuri.ro</i>";



				xmail($array['email'],"no-reply@catalogterenuri.ro",$content,'Bine ati venit pe catalogterenuri!.');
			}
		}



		private function setCookieLogin($user,$remember=0){
			$timp_login = 360000;

			if($remember) $timp_login = 3600*3600;

			setcookie("user", $user->id, time()+$timp_login, "/");
			setcookie("password", $user->password, time()+$timp_login, "/");
		}

		public function getUserInfo($info){
			return $this->userinfo->$info;
		}


		public function setNewPassword($pass){
			$this->update(array('password'=>md5($pass)),'users',array('id'=>$_COOKIE['user']));
			setcookie("password", md5($pass), time()+3600000, "/");
		}



		public function refreshUserInfo(){
				$this->userinfo = $this->select_row('users',array('id'=>$_COOKIE['user'],'password'=>$_COOKIE['password']));
		}

	}

	$user = new User;
?>