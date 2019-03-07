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
            <div class="col-md-2">
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
            <div class="col-md-5">
                <div class="card" style="font-size: 20px; text-align: center">
                    <?php foreach (($books?:[]) as $book): ?>
                        <fieldset>
                            <div class="card title">
                                <strong>Название книги:</strong>
                                <?= ($book['BOOK_NAME'])."
" ?>
                            </div>
                        </fieldset>
                        <fieldset>
                            <p>
                                <strong>Ссылка на книгу:</strong>
                                <?= ($book['BOOK_LINK'])."
" ?>
                            </p>
                        </fieldset>
                        <fieldset>
                            <p>
                                <strong>Картинка:</strong>
                                <img src="<?= ($book['BOOK_IMG']) ?>" alt="" width="100">
                            </p>
                        </fieldset>
                        <fieldset>
                            <p>
                                <strong>Год издания:</strong>
                                <?= ($book['BOOK_YEAR'])."
" ?>
                            </p>
                        </fieldset>
                        <fieldset>
                            <p>
                                <strong>Авторы книги:</strong>
                                <?= ($GetAuthors($book['BOOK_ID']))."
" ?>
                            </p>
                        </fieldset>
                        <fieldset>
                            <p>
                                <strong>Категории книги:</strong>
                                <?= ($GetGenres($book['BOOK_ID']))."
" ?>
                            </p>
                        </fieldset>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-5">
                <h2>Обновление книги, <?= ($BookId) ?></h2>
                <form action="<?= ($BASE) ?>/UpdatingBook" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="BookId" value="<?= ($BookId) ?>">
                    <fieldset class="form-group">
                        <label>Название книги</label>
                        <input type="text" class="form-control" name="NAME">
                        <br>
                        <input type="submit" name="UpdateName" value="UpdateName" class="btn btn-primary">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Ссылка на книгу</label>
                        <input type="text" class="form-control" name="LINK">
                        <br>
                        <input type="submit" name="UpdateLink" value="UpdateLink" class="btn btn-primary">
                    </fieldset>
                    <div class="row">
                        <div class="col-md-5">
                            <fieldset class="form-group">
                                <label>Авторы книги</label>
                                <select name="AUTHORS[]" id="" class="form-control" multiple="multiple">
                                    <option>Choose author</option>
                                    <?php foreach (($allauthors?:[]) as $author): ?>
                                        <option value="<?= ($author['AUTHOR_ID']) ?>"><?= ($author['AUTHOR_NAME']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <input type="submit" name="AddAuthor" value="AddAuthor" class="btn btn-success">
                                <hr>
                                <input type="submit" name="DelAuthor" value="ClearAuthors" class="btn btn-danger">
                            </fieldset>
                        </div>
                        <div class="col-md-5">
                                <fieldset class="form-group">
                                    <label>Категории книги</label>
                                    <select name="GENRES[]" id="" class="form-control" multiple="multiple">
                                        <option>Choose category</option>
                                        <?php foreach (($allgenres?:[]) as $genre): ?>
                                            <option value="<?= ($genre['GENRE_ID']) ?>"><?= ($genre['GENRE_NAME']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <br>
                                    <input type="submit" name="AddGenre" value="AddCategory" class="btn btn-success">
                                    <hr>
                                    <input type="submit" name="DelGenre" value="ClearCategory" class="btn btn-danger">
                                </fieldset>
                            </div>
                    </div>
                    <fieldset class="form-group">
                        <label for="exampleFormControlFile1">Картинка:</label>
                        <div class="custom-file">
                            <input name="userfile" type="file" class="custom-file-input" id="customFile" placeholder="Load">
                            <label class="custom-file-label" for="customFile">Выберите файл</label>
                            <br>
                        </div>
                        <br>
                        <input type="submit" name="UpdateImg" value="UpdateImg" class="btn btn-primary">
                    </fieldset>
                    <fieldset class="form-group">
                        <label>Год издания</label>
                        <input type="text" class="form-control" name="YEAR">
                        <br>
                        <input type="submit" name="UpdateYear" value="UpdateYear" class="btn btn-primary">
                    </fieldset>
                </form>
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