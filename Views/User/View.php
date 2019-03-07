<?php

namespace User;

class View {

    public function ShowPage($f3){
        echo \Template::instance()->render('UI/admin-dashboard.html');
    }

    public function ShowPageUsers($f3){
        echo \Template::instance()->render('UI/users.html');
    }

    public function ShowPageBooks($f3){
        echo \Template::instance()->render('UI/books.html');
    }

    public function ShowPageAddingUser($f3){
        echo \Template::instance()->render('UI/adding-user.html');
    }

    public function ShowPageAddingBook($f3){
        echo \Template::instance()->render('UI/adding-book.html');
    }

    public function ShowAdminEditPage($f3){
        echo \Template::instance()->render('UI/admin-edit.html');
    }

    public function ShowPageUserEdit($f3){
        echo \Template::instance()->render('UI/user-edit.html');
    }

    public function ShowBookPage($f3){
        echo \Template::instance()->render('UI/book.html');
    }
}