<?php include 'app/controllers/users.php'?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Ubuntu:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">

</head>
<body>
<?php include("app/include/Header.php"); ?>


    <div class="container">
        <div class="center ">
            <h2>Добро пожаловать</h2>
        </div>
        <div class="center-content">
            <div class="registration-form ">
                <form class="row justify-content-md-center" method="post" action="reg.php">
                    <div class="mb-3 col-12 col-md-10">
                        <label for="formGroupExampleInput" class="form-Label">Ваш логин</Label>
                    <input name="login" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваш логин...">
                    </div>
                    <div class="w-100"></div>
                    <div class="mb-3 col-12 col-md-10">
                        <label for="exampleInputPassword1" class="form-Label">Пароль</Label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1i">
                    </div>
                    <div class="w-100"></div>
                    <div class="mb-3 col-12 col-md-10">
                        <button name="button-reg" type="submit" class="btn btn-primary">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("app/include/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>