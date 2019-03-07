<?php

namespace Book;

class BookController {
    public function AddAuthor($f3){
        (new Model)->AddAuthor($f3,$_POST['AUTHOR']);
        $f3->reroute('/adding-book');
    }

    public function AddGenre($f3){
        (new Model)->AddGenre($f3,$_POST['GENRE']);
        $f3->reroute('/adding-book');
    }

    public function SelectGenresByBookId($f3,$a){
        $row = (new Model)->SelectGenresByBookId($f3,$a);
        return $row;
    }


    public function AdminPageBooks($f3){
        session_start();
        if(isset($_SESSION['login'])){
            $AccCode = $_SESSION['access_code'];
            $f3->set('AccCode',$AccCode);
            $allbooks = (new Model)->SelectAllBooks($f3);
            $f3->set('allbooks',$allbooks);
            $f3->set('GetGenres',function($a){
                $rows = (new Model)->SelectGenresByBookId($f3,$a);
                foreach ($rows as $row)
                    echo $row['GENRE_NAME'].'<br>';
            });
            $f3->set('GetAuthors',function($a){
                $rows = (new Model)->SelectAuthorsByBookId($f3,$a);
                foreach ($rows as $row)
                    echo $row['AUTHOR_NAME'].'<br>';
            });
            (new \User\View)->ShowPageBooks($f3);
        } else {
            $f3->reroute('/login');
        }
    }

    public function DeleteBook($f3,$bookid){
        (new Model)->DeleteBook($f3,$_POST['BOOK_ID']);
        $f3->reroute('/books');
    }

    public function AddBook($f3){
        $uploaddir = 'IMG/';
        $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
        $row1 = $_POST['AUTHORS'];
        $row2 = $_POST['GENRES'];
        // Копируем файл из каталога для временного хранения файлов:
        if (copy($_FILES['userfile']['tmp_name'], $uploadfile)){
            (new Model)->AddBook($f3,$_POST['NAME'],$_POST['LINK'],$uploadfile,$_POST['YEAR']);
            $name = (new Model)->Sbook($f3,$_POST['NAME']);
            $f3->set('name',$name);
            foreach ($name as $sn)
                $bid = $sn['BOOK_ID'];
            foreach ($row1 as $sn)
                (new Model)->AddA($f3,$sn,$bid);
            foreach ($row2 as $sn)
                (new Model)->AddG($f3,$sn,$bid);
            $emails = (new \User\Model)->SelectUsersForSubscription($f3);
            for ($i=0; $i < count($emails); $i++) {
                $to = $emails[$i]['EMAIL'];
                $subject = 'ОБНОВЛЕНИЕ. LIBRARY.';
                $message = 'Здравствуйте. На сайте Library обновление. Добавлена книга '.$_POST['NAME'];
                $headers = 'From: admin@sviridovden.ru' . "\r\n";

                mail($to, $subject, $message, $headers);
            }
            $f3->reroute('/books');
        }
        else {
            $f3->reroute('/books');
        }
    }

    public function AdminAddingBook($f3){
        session_start();
        if(isset($_SESSION['login'])){
            if($_SESSION['access_code']<=1){
                $AccCode = $_SESSION['access_code'];
                $f3->set('AccCode',$AccCode);
                $allauthors = (new Model)->SelectAuthors($f3);
                $f3->set('allauthors',$allauthors);
                $allgenres = (new Model)->SelectGenres($f3);
                $f3->set('allgenres',$allgenres);
                (new \User\View)->ShowPageAddingBook($f3);
            } else {
                $f3->reroute('/admin-dashboard');
            }
        } else {
            $f3->reroute('/login');
        }
    }

    public function BookUpdate($f3,$params) {
        session_start();
        if (isset($_SESSION['login'])){
            if($_SESSION['access_code']==0){
                $book_id = is_numeric($params['id']);
                if(!$book_id){
                    echo "Упссс... Вы пытаетесь GET запросом передать строку. Нет SQL иньекциям.";
                } else {
                    $f3->set('BookId',$params['id']);
                    $books  = (new Model)->SelectBookByID($f3,$params['id']);
                    $f3->set('books',$books);
                    $allauthors = (new Model)->SelectAuthors($f3);
                    $f3->set('allauthors',$allauthors);
                    $allgenres = (new Model)->SelectGenres($f3);
                    $f3->set('allgenres',$allgenres);
                    $f3->set('GetGenres',function($a){
                        $rows = (new Model)->SelectGenresByBookId($f3,$a);
                        foreach ($rows as $row)
                            echo $row['GENRE_NAME'].'<br>';
                    });
                    $f3->set('GetAuthors',function($a){
                        $rows = (new Model)->SelectAuthorsByBookId($f3,$a);
                        foreach ($rows as $row)
                            echo $row['AUTHOR_NAME'].'<br>';
                    });
                    $exactauthors = (new Model)->SelectAuthorsByBookId($f3,$params['id']);
                    $f3->set('exactauthors',$exactauthors);
                    $exactgenres = (new Model)->SelectGenresByBookId($f3,$params['id']);
                    $f3->set('exactgenres',$exactgenres);
                    (new \User\View)->ShowBookPage($f3);
                }
            } else {
                $f3->reroute('/admin-dashboard');
            }
        } else {
            $f3->set('error','Авторизуйтесь.');
            $f3->reroute('/login');
        }
    }

    public function UpdatingBook($f3){
        if (isset($_POST['UpdateName'])){
            (new Model)->UpdateName($f3,$_POST['BookId'],$_POST['NAME']);
            $f3->reroute('/books');
        }
        if (isset($_POST['UpdateLink'])){
            (new Model)->UpdateLink($f3,$_POST['BookId'],$_POST['LINK']);
            $f3->reroute('/books');
        }

        if (isset($_POST['UpdateImg'])){
            $uploaddir = 'IMG/';
            $uploadfile = $uploaddir.basename($_FILES['userfile']['name']);
            if (copy($_FILES['userfile']['tmp_name'], $uploadfile)){
                (new Model)->UpdateImg($f3,$_POST['BookId'],$uploadfile);
                $f3->reroute('/books');
            } else {
                $f3->reroute('/books');
            }
        }

        if (isset($_POST['UpdateYear'])){
            (new Model)->UpdateYear($f3,$_POST['BookId'],$_POST['YEAR']);
            $f3->reroute('/books');
        }

        if (isset($_POST['AddAuthor'])){
            $rows = $_POST['AUTHORS'];
            foreach ($rows as $sn)
                (new Model)->AddA($f3,$sn,$_POST['BookId']);
            $f3->reroute('/books');
        }

        if (isset($_POST['AddGenre'])){
            $rows = $_POST['GENRES'];
            foreach ($rows as $sn)
                (new Model)->AddG($f3,$sn,$_POST['BookId']);
            $f3->reroute('/books');
        }

        if (isset($_POST['DelAuthor'])){
            (new Model)->DelA($f3,$_POST['BookId']);
            $f3->reroute('/books');
        }

        if (isset($_POST['DelGenre'])){
            (new Model)->DelG($f3,$_POST['BookId']);
            $f3->reroute('/books');
        }
    }


    public function Single_Page($f3, $params){
      $title = 'Библиотека';
      $curryear = date('Y');
      $f3->set('curryear',$curryear);
      $f3->set('title', $title);
      $tmp = explode('=',$params[0]);
      $book = intval($tmp[1]);
      if ($book!=0){
        $getBook = (new Model)->SelectBookByID($f3, $book);
        $getAuthors = (new Model)->SelectAuthorsByBookId($f3, $book);
        $getGenres = (new Model)->SelectGenresByBookId($f3, $book);
        $name = $getBook[0]['BOOK_NAME'];
        $img = $getBook[0]['BOOK_IMG'];
        $year = $getBook[0]['BOOK_YEAR'];
        $link = $getBook[0]['BOOK_LINK'];
        $f3->set('name',$name);
        $f3->set('img',$img);
        $f3->set('year',$year);
        $f3->set('link',$link);
        $f3->set('genres',$getGenres);
        $f3->set('authors',$getAuthors);

        (new View)->ShowSinglePage($f3, $params);
      } else {
        $f3->reroute('/');
      }
    }

}
