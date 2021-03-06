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
                    <?php if ($AccCode>=0): ?>
                        <a class="nav-link active" href="admin-dashboard">Главная</a>
                        <a class="nav-link" href="books">Книги</a>
                    <?php endif; ?>
                    <?php if ($AccCode==0): ?>
                        <a class="nav-link" href="users">Пользователи</a>
                    <?php endif; ?>
                    <br>
                    <form class="form-inline pull-xs-right" method="post" action="<?= ($BASE) ?>/exit">
                        <input type="submit" value="Выход" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col-md-8 " id="v-pills-tabContent">
                <div class="container">
                    <div class="card">
                        <div class="card-title">
                            <h2>Добрый день, { <?= ($_SESSION['firstname']) ?> }</h2>
                        </div>
                        <div class="card-text">
                            <?php foreach (($rows1?:[]) as $row): ?>
                                <p>ID: <?= ($row['USER_ID']) ?></p>
                                <p>Имя: <?= ($row['FIRSTNAME']) ?></p>
                                <p>Фамилия: <?= ($row['LASTNAME']) ?></p>
                                <p>Почта: <?= ($row['EMAIL']) ?></p>
                                <p>Логин: <?= ($row['LOGIN']) ?></p>
                                <p>Город: <?= ($row['CITY']) ?></p>
                                <p>Возраст: <?= ($row['AGE']) ?></p>
                                <p>
                                    <a href="https://<?= ($row['VK_LINK']) ?>" class="btn btn-primary" target="_blank">My VK</a>
                                </p>
                                <?php if ($AccCode==0): ?>
                                    <a class="btn btn-warning" value="Change Profile" href="<?= ($BASE) ?>/admin-edit">Редактировать профиль.</a>
                                <?php endif; ?>
                                <br>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
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
        if ($(document).height() <= $(window).height())
            $("footer.footer").addClass("navbar-fixed-bottom");
    </script>
</body>

</html>