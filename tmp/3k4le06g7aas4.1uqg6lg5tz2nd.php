<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/bootstrap.min.css">
    <title>Админка | Добавление пользователя - <?= ($_SESSION['firstname']) ?> </title>
</head>

<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" href="admin-dashboard">Главная</a>
                    <a class="nav-link" href="books">Книги</a>
                    <a class="nav-link" href="users">Пользователи</a>
                    <br>
                    <form class="form-inline pull-xs-right" method="post" action="<?= ($BASE) ?>/exit">
                        <input type="submit" value="Выход" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <h2>Добавление пользователя </h2>
                    <form method="post" action="<?= ($BASE) ?>/AddUser">
                        <fieldset class="form-group">
                            <label>Имя</label>
                            <br>
                            <input class="form-control" type="text" name="FIRSTNAME">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Фамилия</label>
                            <br>
                            <input class="form-control" type="text" name="LASTNAME">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Логин</label>
                            <br>
                            <input class="form-control" type="text" name="LOGIN">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Пароль</label>
                            <br>
                            <input class="form-control" type="password" id="password" name="PASSWORD">
                            <small class="form-group">
                                <a style="text-decoration: none; color: black" href="#" id="s-h-pass">Показать пароль</a>
                            </small>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Почта</label>
                            <br>
                            <input class="form-control" type="text" name="EMAIL">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Город</label>
                            <br>
                            <input class="form-control" type="text" name="CITY">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Возраст</label>
                            <br>
                            <input class="form-control" type="text" name="AGE">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Роль пользователя</label>
                            <br>
                            <select class="form-control" name="ACCESS_CODE">
                                <option value="0">Администратор</option>
                                <option value="1">Редактор</option>
                                <option value="2">Пользователь</option>
                            </select>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Ссылка ВК</label>
                            <br>
                            <input class="form-control" type="text" name="VK_LINK">
                        </fieldset>
                        <fieldset class="form-group">
                            <input class="form-control btn btn-warning" type="submit" name="AddUser" value="Добавить пользователя">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>









    <div class="navbar-fixed-bottom row-fluid">
            <div class="navbar-inner">
                <div class="container"  style="background: darkgray; color: black; text-align: center; margin-top: 40; padding: 10">
                    <a class="navbar-brand" href="#" style="text-decoration: none; color: black">{ Admin } panel</a>
                    <p>Все права защищены. &copy;</p>
                </div>
            </div>
        </div>
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?= ($BASE) ?>/UI/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#s-h-pass').click(function () {
                var type = $('#password').attr('type') == "text" ? "password" : 'text',
                    c = $(this).text() == "Скрыть пароль" ? "Показать пароль" : "Скрыть пароль";
                $(this).text(c);
                $('#password').prop('type', type);
            });
        });
    </script>
</body>

</html>
