<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/bootstrap.min.css">
</head>

<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" href="admin-dashboard">Главная</a>
                    <a class="nav-link" href="users">Пользователи</a>
                    <a class="nav-link" href="books">Книги</a>
                    <br>
                    <form class="form-inline pull-xs-right" method="post" action="<?= ($BASE) ?>/exit">
                        <input type="submit" value="Выход" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col-md-8"><hr>
                <h2>Updating User, <?= ($Admin_ID) ?></h2>
                <form method="post" action="<?= ($BASE) ?>/UpdateCurrentUser">
                    <input type="hidden" name="ADMIN_ID" value="<?= ($Admin_ID) ?>">
                    <fieldset class="form-group">
                        <label>Имя</label>
                        <br>
                        <input class="form-control" type="text" name="FIRSTNAME">
                        <br>
                        <input class="btn btn-success" type="submit" name="UpdateFirstname" value="Update">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Фамилия</label>
                        <br>
                        <input class="form-control" type="text" name="LASTNAME">
                        <br>
                        <input class="btn btn-success" type="submit" name="UpdateLastname" value="Update">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Логин</label>
                        <br>
                        <input class="form-control" type="text" name="LOGIN">
                        <br>
                        <input class="btn btn-success" type="submit" name="UpdateLogin" value="Update">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Пароль</label>
                        <br>
                        <input class="form-control" type="password" id="password" name="PASSWORD">
                        <small class="form-group">
                            <a style="text-decoration: none; color: black" href="#" id="s-h-pass">Показать пароль</a>
                        </small>
                        <br>
                        <input class="btn btn-success" type="submit" name="UpdatePassword" value="Update">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Подписка</label>
                        <br>

                        <select name="SUBSCRIPTION" class="form-control">
                            <option value="">Choose option</option>
                            <option value="1">Оформить подписку</option>
                            <option value="0">Отказаться от подписки</option>
                        </select>
                        <br>
                        <input class="btn btn-success" type="submit" name="UpdateSubscription" value="Update">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Почта</label>
                        <br>
                        <input class="form-control" type="text" name="EMAIL">
                        <br>
                        <input class="btn btn-success" type="submit" name="UpdateEmail" value="Update">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Город</label>
                        <br>
                        <input class="form-control" type="text" name="CITY">
                        <br>
                        <input class="btn btn-success" type="submit" name="UpdateCity" value="Update">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Возраст</label>
                        <br>
                        <input class="form-control" type="text" name="AGE">
                        <br>
                        <input class="btn btn-success" type="submit" name="UpdateAge" value="Update">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Ссылка ВК</label>
                        <br>
                        <input class="form-control" type="text" name="VK_LINK">
                        <br>
                        <input class="btn btn-success" type="submit" name="UpdateVK" value="Update">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>









    <div class="navbar-fixed-bottom row-fluid">
        <div class="navbar-inner">
            <div class="container" style="background: darkgray; color: black; text-align: center; margin-top: 40; padding: 10">
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