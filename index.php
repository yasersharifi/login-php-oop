<?php
ob_start();
session_start();

require_once "Users.php";

$users = new Users();

$loginInfo = $users->checkLogin($_SESSION);

if (! $loginInfo) {
	header("Location: login.php");
	exit();
}

if (isset($_GET['url'])) {
	if ($_GET["url"] == "logout") {
		$users->logout();
		header("Location: login.php");
		exit();
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index Page</title>
</head>
<body>
	<a href="?url=logout">خروج</a>
	<h1>اطلاعات کاربر</h1>
	<ul>
		<li><span>نام کاربر : </span><?= $loginInfo["userFullName"]; ?></li>
		<li><span> موبایل : </span><?= $loginInfo["userMobile"]; ?></li>
	</ul>

</body>
</html>