<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/bootstrap.min.css">
    <title>Админка | Пользователи - <?= ($_SESSION['firstname']) ?> </title>
</head>

<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php if ($AccCode>=0): ?>
                        <a class="nav-link" href="admin-dashboard">Главная</a>
                        <a class="nav-link" href="books">Книги</a>
                    <?php endif; ?>
                    <?php if ($AccCode==0): ?>
                        <a class="nav-link active" href="users">Пользователи</a>
                    <?php endif; ?>
                    <br>
                    <form class="form-inline pull-xs-right" method="post" action="<?= ($BASE) ?>/exit">
                        <input type="submit" value="Выход" class="form-control btn btn-primary">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <hr>
                <section id="users">
                    <h2>{ Все пользователи. } </h2>
                    <a class="btn btn-danger" href="adding-user">Добавить</a>
                    <div class="form-group">
                        <input type="text" class="form-control pull-right" id="search" placeholder="Поиск по таблице">
                    </div>
                    <table class="table table-hover table-responsive   " id="mytable">
                        <thead>
                            <td># </td>
                            <td>Имя </td>
                            <td>Фамилия</td>
                            <td>Почта</td>
                            <td>Логин</td>
                            <td>Ссылка ВК</td>
                            <td>Уровень</td>
                            <td>Действие</td>
                        </thead>
                        <tbody>
                            <?php foreach (($rows2?:[]) as $row): ?>
                                <tr>
                                    <td><?= ($row['USER_ID']) ?></td>
                                    <td id="sell"><?= ($row['FIRSTNAME'])."
" ?>
                                        <?php if ($row['STATUS']==1): ?>
                                            
                                                <span class="badge badge-pill badge-success">online</span>
                                            
                                            <?php else: ?>
                                                <span class="badge badge-pill badge-dark"></span>
                                            
                                        <?php endif; ?>
                                    </td>
                                    <td><?= ($row['LASTNAME']) ?></td>
                                    <td><?= ($row['EMAIL']) ?></td>
                                    <td><?= ($row['LOGIN']) ?></td>
                                    <td>
                                        <a href="https://<?= ($funcVK( $row['VK_LINK'] )) ?>" class="btn btn-success" target="_blank">GoToVk</a>
                                    </td>
                                    <td>
                                        <?= ($funcRole( $row['ACCESS_CODE'] ))."
" ?>
                                    </td>
                                    <td>
                                        <form method="POST" action="<?= ($BASE) ?>/delete">
                                            <input type="submit" name="DeleteUser" value="Delete" class="btn btn-danger">
                                            <input type="hidden" name="USER_ID" value="<?= ($row['USER_ID']) ?>">
                                        </form>
                                        <form method="POST" action="<?= ($BASE) ?>/user-edit">
                                            <input type="submit" name="UpdateUser" value="Update" class="btn btn-primary">
                                            <input type="hidden" name="USER_ID" value="<?= ($row['USER_ID']) ?>">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </section>
                <hr>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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


        $(document).ready(function () {
            $("#search").keyup(function () {
                _this = this;
                $.each($("#mytable tbody tr"), function () {
                    if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });

    </script>
</body>

</html>
