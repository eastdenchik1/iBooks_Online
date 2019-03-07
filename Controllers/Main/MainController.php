<?php
namespace Main;

class MainController {
    function IndexFunc($f3){
        $f3->set('title','iBooks-Online.');
        // $allbooks = (new \Book\Model)->SelectAllBooks($f3);
        $startBook = 0;
        $kolBooks = 9;
        $allbooks = (new \Book\Model)->SelectAllBooksPages($f3, $startBook, $kolBooks);
        $f3->set('allbooks',$allbooks);
        $f3->set('GetGenres',function($a){
            $rows = (new \Book\Model)->SelectGenresByBookId($f3,$a);
            foreach ($rows as $row)
                echo $row['GENRE_NAME'].'<br>';
        });
        $f3->set('GetAuthors',function($a){
            $rows = (new \Book\Model)->SelectAuthorsByBookId($f3,$a);
            foreach ($rows as $row)
                echo $row['AUTHOR_NAME'].'<br>';
        });
        (new View)->ShowPage($f3);
    }

    function SearchFunction($f3, $params){
/*      if (isset($_POST['search'])){
        $query = trim($_POST['search_form']);
        $query = htmlspecialchars($query);
        $f3->set('query',$query);
        $query = explode(' ', $query);
        $res = (new \Book\Model)->SelectBookByQuery($f3, $query);
        $count = count($res[0]);
        $f3->set('title','iBooks-Online.');
        $f3->set('count', $count);
        // echo "<pre>";
        // var_dump($res);
        // echo "</pre>";
        $f3->set('books', $res[0]);
        (new View)->ShowSearchPage($f3);
      }*/
        $f3->set('title','iBooks-Online.');
	(new View)->ShowSearchPage($f3);
    }


    function PaginationPage($f3, $params){
        $currentPage = $params['id_page'];
        $kolBooks = 9;
        $startBook = 0;
        for ($i=1; $i < $currentPage; $i++) {
            $startBook += $kolBooks;
        }
        $allbooks = (new \Book\Model)->SelectAllBooksPages($f3, $startBook, $kolBooks);
        $f3->set('allbooks',$allbooks);
        $f3->set('GetGenres',function($a){
            $rows = (new \Book\Model)->SelectGenresByBookId($f3,$a);
            foreach ($rows as $row)
                echo $row['GENRE_NAME'].'<br>';
        });
        $f3->set('GetAuthors',function($a){
            $rows = (new \Book\Model)->SelectAuthorsByBookId($f3,$a);
            foreach ($rows as $row)
                echo $row['AUTHOR_NAME'].'<br>';
        });
        (new View)->ShowPage($f3);
    }
}
