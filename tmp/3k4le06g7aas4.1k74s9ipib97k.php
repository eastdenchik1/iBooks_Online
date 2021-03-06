<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/bootstrap.min.css">
    <title>Админка | Добавление книги - <?= ($_SESSION['firstname']) ?> </title>
</head>

<body>
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php if ($AccCode>=0): ?>
                        <a class="nav-link " href="admin-dashboard">Главная</a>
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
                <section id="addbooks">
                    <h2>{ Добавление книг. }</h2>
                    <div class="row">
                        <?php if ($AccCode==0): ?>
                            <div class="col-md-6">
                                <form action="<?= ($BASE) ?>/AddAuthor" method="POST">
                                    <fieldset class="form-group">
                                        <label>Авторы:</label>
                                        <input type="text" class="form-control" name="AUTHOR">
                                    </fieldset>
                                    <fieldset>
                                        <input type="submit" class="btn btn-success" value="Adding Author">
                                    </fieldset>
                                </form>
                                <form action="<?= ($BASE) ?>/AddGenre" method="POST">
                                    <fieldset class="form-group">
                                        <label>Категории:</label>
                                        <input type="text" class="form-control" name="GENRE">
                                    </fieldset>
                                    <fieldset>
                                        <input type="submit" class="btn btn-success" value="Adding Category">
                                    </fieldset>
                                </form>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-6">
                            <form action="<?= ($BASE) ?>/AddBook" method="POST" enctype="multipart/form-data">
                                <fieldset class="form-group">
                                    <label>Название книги:</label>
                                    <input type="text" class="form-control" name="NAME">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label>Ссылка на книгу:</label>
                                    <input type="text" class="form-control" name="LINK">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label>Авторы книги:</label>
                                    <select name="AUTHORS[]" id="" class="form-control" multiple="multiple">
                                        <option>Выберите автора(-ов)</option>
                                        <?php foreach (($allauthors?:[]) as $author): ?>
                                            <option value="<?= ($author['AUTHOR_ID']) ?>"><?= ($author['AUTHOR_NAME']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label>Категории книги:</label>
                                    <select name="GENRES[]" id="" class="form-control" multiple="multiple">
                                        <option>Выберите категорию(-ии)</option>
                                        <?php foreach (($allgenres?:[]) as $genre): ?>
                                            <option value="<?= ($genre['GENRE_ID']) ?>"><?= ($genre['GENRE_NAME']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleFormControlFile1">Image:</label>
                                    <div class="custom-file">
                                        <input name="userfile" type="file" class="custom-file-input" id="customFile" placeholder="Load">
                                        <label class="custom-file-label" for="customFile">Выберите файл</label>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label>Год издания:</label>
                                    <input type="text" class="form-control" name="YEAR">
                                </fieldset>
                                <fieldset>
                                    <input type="submit" class="btn btn-success" value="Adding Book">
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </section>
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
    </script>
</body>

</html>
