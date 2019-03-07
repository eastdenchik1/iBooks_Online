<?php

namespace Book;

class Model {

    public function AddAuthor($f3, $author){
        $db=$f3->get('db');
        $db->exec('INSERT INTO authors (AUTHOR_NAME) VALUES (:AUTHOR_NAME)',array(':AUTHOR_NAME'=>$author));
    }

    public function AddGenre($f3, $genre){
        $db=$f3->get('db');
        $db->exec('INSERT INTO genres (GENRE_NAME) VALUES (:GENRE_NAME)',array(':GENRE_NAME'=>$genre));
    }

    public function AddBook($f3,$name,$link,$image,$year){
        $db=$f3->get('db');
        $db->exec('INSERT INTO books (BOOK_NAME,BOOK_LINK,BOOK_IMG,BOOK_YEAR) VALUES (:BOOK_NAME,:BOOK_LINK,:BOOK_IMAGE,:BOOK_YEAR)',array(':BOOK_NAME'=>$name,':BOOK_LINK'=>$link,':BOOK_IMAGE'=>$image,':BOOK_YEAR'=>$year));
    }

    public function AddA($f3,$author,$bid){
        $db=$f3->get('db');
        $db->exec('INSERT INTO book_author (BOOK_ID, AUTHOR_ID) VALUES (:BOOK_ID, :AUTHOR_ID)',array(':BOOK_ID'=>$bid,':AUTHOR_ID'=>$author));
    }

    public function AddG($f3,$genre,$bid){
        $db=$f3->get('db');
        $db->exec('INSERT INTO book_genre (BOOK_ID, GENRE_ID) VALUES (:BOOK_ID, :GENRE_ID)',array(':BOOK_ID'=>$bid,':GENRE_ID'=>$genre));
    }

    public function DelA($f3,$bid){
        $db=$f3->get('db');
        $db->exec('DELETE FROM book_author WHERE (BOOK_ID=:BOOK_ID)',array(':BOOK_ID'=>$bid));
    }

    public function DelG($f3,$bid){
        $db=$f3->get('db');
        $db->exec('DELETE FROM book_genre WHERE (BOOK_ID=:BOOK_ID)',array(':BOOK_ID'=>$bid));
    }

    public function Sbook($f3, $name){
        $db=$f3->get('db');
        $row = $db->exec('SELECT BOOK_ID FROM books WHERE BOOK_NAME=:BOOK_NAME',array(':BOOK_NAME' => $name));
        return $row;
    }

    public function SelectAuthors($f3){
        $db=$f3->get('db');
        $row = $db->exec('SELECT * FROM authors');
        return $row;
    }

    public function SelectGenres($f3){
        $db=$f3->get('db');
        $row = $db->exec('SELECT * FROM genres');
        return $row;
    }

    public function SelectAuthorsByBookId($f3,$id){
        $db= new \DB\SQL('mysql:host=localhost;port=3306;dbname=denchik_Library','denchik_denis','Eastdenchik1');
        $row = $db->exec('SELECT * FROM authors WHERE AUTHOR_ID IN (SELECT AUTHOR_ID FROM book_author WHERE BOOK_ID=:BOOK_ID)',array(':BOOK_ID'=>$id));
        return $row;
    }

    public function SelectGenresByBookId($f3,$id){
        $db= new \DB\SQL('mysql:host=localhost;port=3306;dbname=denchik_Library','denchik_denis','Eastdenchik1');
        $row = $db->exec('SELECT * FROM genres WHERE GENRE_ID IN (SELECT GENRE_ID FROM book_genre WHERE BOOK_ID=:BOOK_ID)',array(':BOOK_ID'=>$id));
        return $row;
    }

    public function SelectAllBooks($f3){
        $db=$f3->get('db');
        $row = $db->exec('SELECT * FROM books');
        return $row;
    }

    public function SelectAllBooksPages($f3, $from, $to){
        $db=$f3->get('db');
        $row = $db->exec('SELECT * FROM books ORDER BY BOOK_ID DESC LIMIT :FROM_P, :TO_P',array(':FROM_P'=>$from, ':TO_P'=>$to));
        return $row;
    }

    public function SelectAllBooksCount($f3){
        $db=$f3->get('db');
        $row = $db->exec('SELECT COUNT(*) FROM books');
        return $row;
    }

    public function SelectBookByID($f3,$id){
        $db=$f3->get('db');
        $row = $db->exec('SELECT p.* FROM books p WHERE BOOK_ID=:BOOK_ID',array(':BOOK_ID'=>$id));
        return $row;
    }

    public function SelectBookByQuery($f3, $query){
        $db=$f3->get('db');
        $tmp = array();
        $final = array();
        foreach ($query as $val) {
            $row = $db->exec("SELECT b.* FROM books b WHERE BOOK_NAME LIKE '%$val%'");
            array_push($tmp, $row);
        }
        $final = array_unique($tmp);
        // $row = $db->exec('SELECT b.* FROM books b WHERE BOOK_NAME=:BOOK_NAME', array(':BOOK_NAME' => $query[0]));
        return $final;
    }

    public function DeleteBook($f3,$bookid){
        $db =$f3->get('db');
        $db->exec('DELETE FROM books WHERE BOOK_ID=:BOOK_ID',array(':BOOK_ID' =>$bookid));
    }

    public function UpdateName($f3,$bookid,$bookname){
        $db =$f3->get('db');
        $db->exec('UPDATE books SET BOOK_NAME=:BOOK_NAME WHERE BOOK_ID=:BOOK_ID', array(':BOOK_ID'=>$bookid, ':BOOK_NAME'=>$bookname));
    }

    public function UpdateLink($f3,$bookid,$booklink){
        $db =$f3->get('db');
        $db->exec('UPDATE books SET BOOK_LINK=:BOOK_LINK WHERE BOOK_ID=:BOOK_ID', array(':BOOK_ID'=>$bookid, ':BOOK_LINK'=>$booklink));
    }

    public function UpdateImg($f3,$bookid,$bookimg){
        $db =$f3->get('db');
        $db->exec('UPDATE books SET BOOK_IMG=:BOOK_IMG WHERE BOOK_ID=:BOOK_ID', array(':BOOK_ID'=>$bookid, ':BOOK_IMG'=>$bookimg));
    }

    public function UpdateYear($f3,$bookid,$bookyear){
        $db =$f3->get('db');
        $db->exec('UPDATE books SET BOOK_YEAR=:BOOK_YEAR WHERE BOOK_ID=:BOOK_ID', array(':BOOK_ID'=>$bookid, ':BOOK_YEAR'=>$bookyear));
    }




}
