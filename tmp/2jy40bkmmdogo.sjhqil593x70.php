<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="yandex-verification" content="7ee1fe0671f7bab4" />
    <title><?= ($title) ?></title>
    <link rel="shortcut icon" href="<?= ($BASE) ?>/IMG/qwe.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/style.css">
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/loaders.min.css">
</head>

<body>

      <div data-loader="circle"></div>

    <div style=" text-align: center; text-transform:uppercase; margin: 35px; padding: 20px; color: black; font-size: 36px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
        <a style="text-decoration: none; color: #333" href="<?= ($BASE) ?>/"><?= ($title) ?></a>
    </div>

    <div class="container">
<div class="ya-site-form ya-site-form_inited_no" onclick="return {'action':'https://library.sviridovden.ru/search','arrow':true,'bg':'#ffcc00','fontsize':12,'fg':'#000000','language':'ru','logo':'rb','publicname':'Поиск по библиотеке','suggest':true,'target':'_blank','tld':'ru','type':2,'usebigdictionary':false,'searchid':2336062,'input_fg':'#000000','input_bg':'#ffffff','input_fontStyle':'normal','input_fontWeight':'normal','input_placeholder':'Поиск по сайту','input_placeholderColor':'#ff0000','input_borderColor':'#7f9db9'}"><form action="https://yandex.ru/search/site/" method="get" target="_blank" accept-charset="utf-8"><input type="hidden" name="searchid" value="2336062"/><input type="hidden" name="l10n" value="ru"/><input type="hidden" name="reqenc" value=""/><input type="search" name="text" value=""/><input type="submit" value="Найти"/></form></div><style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';}s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
<!--
      <form method="POST" action="search">

          <label>Введите название книги или произведения.</label>    
            <div class="form-row">
              <div class="col-md-10">
                <input type="text" class="form-control" name="search_form" value="">
              </div>
              <div class="col-md-2">
                <input type="submit" name="search" class="btn btn-success" style="width:100%" Value="ПОИСК" placeholder="Введите название книги или произведения.">
              </div>
            </div>
          </form>
-->
        <div class="row" id="mytable">
            <?php foreach (($allbooks?:[]) as $row): ?>

              <div class="col-md-4 col-lg-4 col-s-3 col-xs-10" style="margin-top: 20px">
                <div class="card">
                    <img src="<?= ($BASE) ?>/<?= ($row['BOOK_IMG']) ?>" alt="" class="card-img-top">
                    <div class="card-body">
                        <strong><?= ($row['BOOK_NAME']) ?></strong><hr>
                        <a href="<?= ($BASE) ?>/book=<?= ($row['BOOK_ID']) ?>" class="btn btn-primary" style="width: 100%; text-transform: uppercase;">скачать</a>
                    </div>
                </div>
              </div><br>

                <!-- <div class="col-md-4">
                    <div class="border">
                        <div class="wrap">
                            <div class="product-wrap">
                                <a href="">
                                    <img src="<?= ($BASE) ?>/<?= ($row['BOOK_IMG']) ?>" width="60">
                                </a>
                            </div>
                            <div class="loop-action">
                                <a href="<?= ($row['BOOK_LINK']) ?>" data-modal="#modal1" class="add-to-cart" target="__blank">CРєР°С‡Р°С‚СЊ</a>
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
                </div> -->

            <?php endforeach; ?>
        </div>
        <div class="pagination">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center pagination-lg " style="margin: 50px auto; ">
                <?php foreach (($allPages?:[]) as $page): ?>
                    <li class="page-item"><a class="page-link" href="<?= ($BASE) ?>/page=<?= ($page) ?>"><?= ($page) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>



<div class="navbar-fixed-bottom row-fluid">
        <div class="navbar-inner">
            <div class="container" style="background: darkgray; color: black; text-align: center; margin-top: 40; padding: 10">
                <a class="navbar-brand" href="<?= ($BASE) ?>/" style="text-decoration: none; color: black">Library.</a>
                <p>Все права защищены. &copy;</p>
		<p>admin@sviridovden.ru</p>
            </div>
        </div>
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
