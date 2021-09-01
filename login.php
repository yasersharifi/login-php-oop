<?php
ob_start();
session_start();

include_once "Users.php";

$users = new Users();

// check user is login
$loginInfo = $users->checkLogin($_SESSION);

if ($loginInfo) {
    header("Location: index.php");
    exit();
}

if (isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $userInfo = $users->userInfo($username, $password);

    if (! empty($userInfo)) {
        if ($userInfo["username"] == $username && $userInfo["password"] == $password) {
            $_SESSION['loginInfo'] = array(
                "isLogin" => true,
                "userId" => $userInfo["id"],
                "username" => $userInfo["username"],
                "userFullName" => $userInfo["full_name"],
                "userMobile" => $userInfo["mobile"],
            );

            header("Location: index.php");
            exit();
        } else {
            $_SESSION["error"] = "نام کاربری یا رمز عبور اشتباه است.";
            header("Refresh: 0");
            exit();
        }

    } else {
        $_SESSION["error"] = "نام کاربری یا رمز عبور اشتباه است.";
        header("Refresh: 0");
        exit();
    }

}



?>
<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Shabnam Font CDN -->
    <link href='https://cdn.fontcdn.ir/Font/Persian/Shabnam/Shabnam.css' rel='stylesheet' type='text/css'>
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/style.css">

    <title>php login oop</title>
  </head>
  <body>
      <div class="login-page">
        <div class="container">
            <div class="row" style="width: 100%;height: 100vh;display: flex;justify-content: center;align-items: center">
                <div class="col-12 col-md-6 col-lg-4">

                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error'];unset($_SESSION['error']) ?>
                        </div>
                    <?php endif; ?>

                    <div class="card login-card">
<!--                        <div class="card-header bg-primary">
                           <h3 class="text-center text-white">
                               صفحه ورود
                           </h3>
                       </div> -->
                       <div class="card-body py-4 px-5">
                            <div class="icon-area d-flex flex-row justify-content-center align-items-center pb-4">
                                <i class="bi bi-lock text-danger" style="font-size: 50px;"></i>
                            </div>
                            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="نام کاربری" aria-label="Username" aria-describedby="basic-addon1" autofocus required>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon2"><i class="bi bi-key"></i></span>
                                    <input type="text" name="password" class="form-control" placeholder="رمز عبور" aria-label="password" aria-describedby="basic-addon2" required>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="checkbox" class="form-check" id="remmemberMe">
                                    <label for="remmemberMe" class="form-label ms-2"><small>مرا به خاطر بسپار  </small></label>
                                </div>

                                <div class="d-grid">
                                    <button type="submit" name="login" class="btn btn-primary">ورود</button>
                                </div>
                            </form>

                            <div class="my-3">
                                <i class="bi bi-info-circle text-danger pt-2"></i>
                                <a href="#" class="text-danger">فراموشی رمز عبور</a>
                            </div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
