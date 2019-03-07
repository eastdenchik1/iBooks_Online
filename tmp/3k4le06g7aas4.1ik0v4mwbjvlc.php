<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница регистрации</title>
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/uikit.min.css" />
    <script src="<?= ($BASE) ?>/UI/js/uikit.min.js"></script>
    <script src="<?= ($BASE) ?>/UI/js/uikit-icons.min.js"></script>
</head>

<body class="body-bgc">
    <div class="uk-container uk-position-top-center uk-margin-large-top uk-flex uk-height-medium uk-background-success uk-margin uk-text-center">
        <form method="POST" name="action">
            <br>
            <h3 class="uk-text-primary uk-text-center uk-text-uppercase">Регистрация</h3>

            <p style="color: red;"><?= ($error) ?></p>
            <p style="color: green;"><?= ($good) ?></p>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-icon" href="" uk-icon="icon: user"></a>
                <input class="uk-input uk-form-large" type="text" placeholder="Введите Имя" name="firstname">
            </div>
            <br>
            <br>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-icon" href="" uk-icon="icon: users"></a>
                <input class="uk-input uk-form-large" type="text" placeholder="Введите Фамилию" name="lastname">
            </div>
            <br>
            <br>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-icon" href="" uk-icon="icon: mail"></a>
                <input class="uk-input uk-form-large" type="text" placeholder="Введите E-mail" name="email">
            </div>
            <br>
            <br>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-icon" href="" uk-icon="icon: user"></a>
                <input class="uk-input uk-form-large" type="text" placeholder="Введите логин" name="login">
            </div>
            <br>
            <br>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-icon" href="" uk-icon="icon: info"></a>
                <input class="uk-input uk-form-large" type="text" placeholder="Введите город" name="city">
            </div>
            <br>
            <br>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-icon" href="" uk-icon="icon: cog"></a>
                <input class="uk-input uk-form-large" type="text" placeholder="Введите возраст" name="age">
            </div>
            <br>
            <br>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-lock" href="" uk-icon="icon: lock"></a>
                <input class="uk-input uk-form-large" type="password" maxlength="15" minlength="5" placeholder="Введите пароль" name="password">
            </div>
            <br>
            <br>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-lock" href="" uk-icon="icon: lock"></a>
                <input class="uk-input uk-form-large" type="password" placeholder="Введите пароль повторно" name="password2">
            </div>
            <br>
            <br>
            <div class="uk-button">
                <input name="reg_user" value="Зарегистрироваться" class="uk-button-primary uk-button-large uk-text-medium uk-text-uppercase"
                    type="submit" onsubmit='CkeckPass(password)'>
            </div>
            <br>
            <hr class="uk-divider-icon">
            <p>
                <a href="<?= ($BASE) ?>/login">Авторизоваться</a>, </p>
            <p> если вы уже зарегистрированны.</p>

    </div>



    <script>
        function CheckPass(pass) {
            if (pass.value.length < 5) {
                alert("Слишком короткий пароль!");
                return false;
            } else {
                return true;
            }
        }

    </script>
</body>

</html>