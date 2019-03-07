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
            <div class="col-md-2 nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <form class="form-inline pull-xs-right" method="get" action="<?= ($BASE) ?>/admin-dashboard">
                    <input type="submit" value="Главная" class="form-control btn btn-primary">
                </form>
                <form class="form-inline pull-xs-right" method="post" action="<?= ($BASE) ?>/exit">
                    <input type="submit" value="Выход" class="form-control btn btn-primary">
                </form>
            </div>
            <?php foreach (($rows1?:[]) as $row1): ?>
                <div class="col-md-4">
                    <?php if ($row1['STATUS']==1): ?>
                        
                            <p>Редактировать нельзя так как пользователь онлайн.</p>
                        
                        <?php else: ?>

                            <div class="card-text">
                                <?php foreach (($rows1?:[]) as $row): ?>
                                    <p>ID: <?= ($row['USER_ID']) ?></p>
                                    <p>Имя: <?= ($row['FIRSTNAME']) ?></p>
                                    <p>Фамилия: <?= ($row['LASTNAME']) ?></p>
                                    <p>Почта: <?= ($row['EMAIL']) ?></p>
                                    <p>Логин: <?= ($row['LOGIN']) ?></p>
                                    <p>Пароль: <?= ($row['PASSWORD']) ?></p>
                                    <p>Город: <?= ($row['CITY']) ?></p>
                                    <p>Возраст: <?= ($row['AGE']) ?></p>
                                    <p>Роль: <?= ($funcRole( $row['ACCESS_CODE'] )) ?></p>
                                    <p>
                                        <a href="https://<?= ($row['VK_LINK']) ?>" class="btn btn-primary" target="_blank">VK</a>
                                    </p>
                                    <p>Подписка: 
                                    <?php if ($row['SUBSCRIPTION']==1): ?>
                                        Оформлена
                                    <?php endif; ?>
                                    <?php if ($row['SUBSCRIPTION']==0): ?>
                                        Не оформлена
                                    <?php endif; ?>
                                </p>
                                    <br>
                                <?php endforeach; ?>
                            </div> 
                </div>
                <div class="col-md-6">
                    <hr>
                    <h2>Обновление пользователя, <?= ($User_ID) ?></h2>
                    <form method="post" action="<?= ($BASE) ?>/UpdateUser">
                        <input type="hidden" name="USER_ID" value="<?= ($User_ID) ?>">
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
                            <label>Роль</label>
                            <br>
                            <select class="form-control" name="ACCESS_CODE">
                                <option value="0">Администратор</option>
                                <option value="1">Редактор</option>
                                <option value="2">Пользователь</option>
                            </select>
                            <br>
                            <input class="btn btn-success" type="submit" name="UpdateAccessCode" value="Update">
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
                
                <?php endif; ?>
            <?php endforeach; ?>
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