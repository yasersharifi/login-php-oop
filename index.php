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

$pageTitle = "مشخصات کاربر";
?>

<?php include_once "common/header.php"; ?>

<div class="container my-5">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<span>سلام <?= $loginInfo["userFullName"]; ?> (شما <?= $loginInfo["userFullName"]; ?> نیستید ؟ <a class="text-danger" href="?url=logout">خروج </a>) </span>
					<span><a class="btn btn-danger" href="?url=logout">خروج</a></span>
				</div>
				<div class="card-body">
					<div>
						<table class="table table-bordered table-hover table-striped">
					    <tbody>
					        <tr class="bg-info text-light">
					        	<th>نام</th>
					            <td><?= $loginInfo["userFullName"]; ?></td>
					        </tr>
					        <tr class="bg-primary text-light">
					        	<th>موبایل</th>
					            <td><?= $loginInfo["userMobile"]; ?></td>
					        </tr>
					    </tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once "common/footer.php"; ?>