<?php

namespace Registration;

class View {
    function ShowPage($f3){
        echo \Template::instance()->render('UI/reg.html');
    }
}