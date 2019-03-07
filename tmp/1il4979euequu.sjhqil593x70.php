<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ($title) ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/style.css">
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/fontawesome-all.css">
</head>

<body>

    <!-- Блок, который будет отображаться над страницей -->
    <div id="before-load">
        <!-- Иконка Font Awesome -->
        <i class="fa fa-spinner"></i>
    </div>

    <div style="text-align: center; text-transform:uppercase; margin: 35px; padding: 20px; color: black; font-size: 36px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <?= ($title)."
" ?>
    </div>

    <div class="container">
        <div class="form-group">
            <input type="text" class="form-control pull-right" id="search" placeholder="Поиск по таблице">
        </div>
        <div class="row" id="mytable">
            <?php foreach (($allbooks?:[]) as $row): ?>
                <div class="col-md-4">
                    <div class="border">
                        <div class="wrap">
                            <div class="product-wrap">
                                <a href="">
                                    <img src="<?= ($BASE) ?>/<?= ($row['BOOK_IMG']) ?>" width="60">
                                </a>
                            </div>
                            <div class="loop-action">
                                <a href="<?= ($BASE) ?>/reg" data-modal="#modal1" class="add-to-cart">Cкачать</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                                <strong><?= ($row['BOOK_NAME']) ?></strong>
                            </h3>
                            <div><?= ($GetGenres($row['BOOK_ID'])) ?></div>
                            <hr>
                            <div><?= ($GetAuthors($row['BOOK_ID'])) ?></div>
                        </div>
                    </div>
                    <br>
                </div>
            <?php endforeach; ?>
        </div>
    </div>









    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?= ($BASE) ?>/UI/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>
    <script>
        $(window).load(function () {
            $('#before-load').find('i').fadeOut().end().delay(400).fadeOut('slow');
        });
        $(document).ready(function () {
            $("#search").keyup(function () {
                _this = this;
                $.each($("#mytable .border"), function () {
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