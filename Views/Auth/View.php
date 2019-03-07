<?php

namespace Auth;

class View {
    function ShowPage($f3){
        echo \Template::instance()->render('UI/login.html');
    }
}