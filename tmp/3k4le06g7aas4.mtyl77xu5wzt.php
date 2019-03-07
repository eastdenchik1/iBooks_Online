<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="<?= ($genres) ?>,Books, online, ibooks, online, exams, python, c++,учебники, школьные, электронные учебники, библиотека, онлайн">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?= ($name) ?>">
  <title><?= ($title) ?> | <?= ($name) ?></title>
  <link rel="stylesheet" href="<?= ($BASE) ?>/UI/css/bootstrap.min.css">
</head>
<body>
  <div style=" text-align: center; text-transform:uppercase; margin: 35px; padding: 20px; color: black; font-size: 36px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
      <a style="text-decoration: none; color: #333" href="<?= ($BASE) ?>/"><?= ($title) ?></a>
  </div>

  <div class="container">
      <div class="card">
          <div class="card-header">
              <h1><?= ($name) ?></h1>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <img src="<?= ($BASE) ?>/<?= ($img) ?>" width="250px">
                </div>
                <div class="col-md-9">
                    Год: <h3><?= ($year) ?></h3>
                    Жанры:<?php foreach (($genres?:[]) as $row): ?>
                        <h3><?= ($row['GENRE_NAME']) ?></h3>
                    <?php endforeach; ?>
                    Автор(ы):<?php foreach (($authors?:[]) as $row): ?>
                        <h3><?= ($row['AUTHOR_NAME']) ?></h3>
                    <?php endforeach; ?>
                    <a href="<?= ($BASE) ?>/" class="btn btn-warning" style="color: darkred; text-transform: uppercase">На главную</a>
                    <a href="<?= ($link) ?>" class="btn btn-primary">СКАЧАТЬ</a>
                </div>
            </div>
          </div>
          <div class="card-footer">
              <?= ($curryear)."
" ?>
          </div>
      </div>
  </div>
</body>
</html>
