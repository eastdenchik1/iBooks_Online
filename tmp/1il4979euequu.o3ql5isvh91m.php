<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Страница входа</title>
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/login.css">
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/uikit.min.css" />
    <script src="<?= ($BASE) ?>/UI/js/uikit.min.js"></script>
    <script src="<?= ($BASE) ?>/UI/js/uikit-icons.min.js"></script>
</head>

<body>
    <div class="uk-container uk-position-top-center uk-margin-large-top uk-flex uk-height-medium uk-background-success uk-margin uk-text-center">
        <form method="POST" name="action">
            <br>
            <h3 class="uk-text-primary uk-text-center uk-text-uppercase">Авторизация</h3>
            <p style="color: red"><?= ($error) ?></p>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-icon" href="" uk-icon="icon: user"></a>
                <input class="uk-input uk-form-large" type="text" placeholder="Введите логин" name="login">
            </div>
            <br>
            <br>
            <div class="uk-inline">
                <a class="uk-form-icon uk-form-lock" href="" uk-icon="icon: lock"></a>
                <input id="password" class="uk-input uk-form-large" type="password" placeholder="Введите пароль" name="password">
            </div>
            <br>
            <br>
            <div class="form-group">
                <a id="shpass" style="text-decoration: none; color: black" href="#" >Показать пароль</a>
            </div>
            <br>
            <div class="uk-button">
                <input name="log_in" value="Войти" class="uk-button-primary uk-button-large uk-text-medium uk-text-uppercase" type="submit">
            </div>
            <br>
            <hr class="uk-divider-icon">
            <p>
                <a href="<?= ($BASE) ?>/reg">Зарегистрироваться</a>, </p>
            <p> если вы еще этого не сделали.</p>
        </form>
    </div>


    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#shpass').click(function () {
                var type = $('#password').attr('type') == "text" ? "password" : 'text',
                    c = $(this).text() == "Скрыть пароль" ? "Показать пароль" : "Скрыть пароль";
                $(this).text(c);
                $('#password').prop('type', type);
            });
        });
    </script>
</body>

</html>