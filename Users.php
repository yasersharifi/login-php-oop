<?php
require_once "DbConnection.php";

class Users extends DbConnection {
	public function __construct() {
		parent::__construct();
	}

	#--- start userInfo function ---#
	public function userInfo($username, $password) {
		$sql = "SELECT id, full_name, username, mobile, password FROM users WHERE username = '$username' AND password = '$password'";

    	$userInfo = $this->connection->query($sql);

    	if ($userInfo->num_rows == 1) {
    		return $userInfo->fetch_assoc();
    	}

    	return false;
	}
	#--- end userInfo function ---#

	#--- start checkLogin function ---#
	public function checkLogin($session) {
		if (isset($session["loginInfo"])) {
			if (! empty($session["loginInfo"])) {
				if ($session["loginInfo"]['isLogin'] == true) {
					return $session["loginInfo"];
				}
			}
		}
		
		return false;
	}
	#--- end checkLogin function ---#

	#--- start logOut function ---#
	public function logout() {
		if (isset($_SESSION['loginInfo'])) {
			unset($_SESSION['loginInfo']);
		}
		session_destroy();
	}
	#--- end logOut function ---#

} // End Of Class



?>
