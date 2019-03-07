<?php

// Kickstart the framework
$f3=require('lib/base.php');
$f3->set('DEBUG',1);
$f3->set('AUTOLOAD','Controllers/,Models/,Views/');

$f3->set('db', new \DB\SQL('mysql:host=localhost;port=3306;dbname=denchik_Library','denchik_denis','Eastdenchik1'));

$f3->route('GET /', 'Main\MainController->IndexFunc');

$f3->route('GET|POST /login', 'Auth\AuthController->LoginPage');
$f3->route('GET|POST /reg', 'Registration\RegistrationController->RegPage');
$f3->route('GET|POST /user-edit', 'User\UserController->UserPageEdit');
$f3->route('GET /search', 'Main\MainController->SearchFunction');

$f3->route('GET /admin-dashboard', 'User\UserController->AdminPage');
$f3->route('GET /users', 'User\UserController->AdminPageUsers');
$f3->route('GET /adding-user', 'User\UserController->AdminAddingUser');
$f3->route('GET /admin-edit', 'User\UserController->AdminEditPage');
$f3->route('GET /books', 'Book\BookController->AdminPageBooks');
$f3->route('GET /adding-book', 'Book\BookController->AdminAddingBook');
$f3->route('GET /book_@id',  'Book\BookController->BookUpdate');
$f3->route('GET /page=@id_page', 'Main\MainController->PaginationPage');
$f3->route('GET /book=@id_book', 'Book\BookController->Single_Page');


$f3->route('POST /exit', 'User\UserController->ExitPage');
$f3->route('POST /delete', 'User\UserController->DeleteUser');
$f3->route('POST /AddUser', 'User\UserController->AddUser');
$f3->route('POST /UpdateCurrentUser', 'User\UserController->UpdateCurrentUser');
$f3->route('POST /UpdateUser', 'User\UserController->UpdateUser');
$f3->route('POST /AddAuthor', 'Book\BookController->AddAuthor');
$f3->route('POST /AddGenre', 'Book\BookController->AddGenre');
$f3->route('POST /DeleteBook', 'Book\BookController->DeleteBook');
$f3->route('POST /AddBook', 'Book\BookController->AddBook');
$f3->route('POST /UpdatingBook', 'Book\BookController->UpdatingBook');


$f3->route('GET /ERROR','ONEERROR');

$f3->set('ONERROR',
    function($f3) {
	// recursively clear existing output buffers:
        while (ob_get_level())
            ob_end_clean();
        // your fresh page here:
        echo $f3->get('ERROR.text');
    }
);

$f3->run();
