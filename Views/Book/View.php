<?php

namespace Book;

class View {
    function ShowSinglePage($f3){
        echo \Template::instance()->render('UI/book-page.html');
    }
}
