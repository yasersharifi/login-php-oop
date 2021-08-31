<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ورود || یاسر شریفی زاده</title>
</head>
<body>
   <div>
       <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <p>
                <label for="username">نام کاربری</label>
                <input type="text" name="username" id="username" autofocus required>
            </p>

            <p>
                <label for="password">نام کاربری</label>
                <input type="password" name="password" id="password" required>
            </p>

            <button type="submit" name="login">ورود</button>
        </form>
   </div> 
</body>
</html>