<?php

namespace Auth;

class AuthController{
    function LoginPage($f3){
        if(isset($_POST['log_in'])){
            if ((new Model)->GetAccessCodeOfUser($f3,$_POST['login'])>=0){
                if (($_POST['login']!="")&&($_POST['password']!="")){
                    if ((new Model)->isLogin($f3,$_POST['login'])){
                        if((new Model)->GetPwdOfUser($f3,$_POST['login'])==md5($_POST['password'])){
                            session_start();
                            $rows = (new \User\Model)->SelectInfoAboutUser($f3,$_POST['login']);
                            foreach($rows as $row)
                                $_SESSION['firstname'] = $row['FIRSTNAME'];
                                $_SESSION['lastname'] = $row['LASTNAME'];
                                $_SESSION['login'] = $row['LOGIN'];
                                $_SESSION['access_code'] = $row['ACCESS_CODE'];                                
                                $_SESSION['user_id'] = $row['USER_ID'];
                                (new \User\Model)->UpdateStatus($f3,$row['USER_ID'],1);
                            $f3->reroute('/admin-dashboard');
                        } else {
                            $f3->set('error', 'Упс... Не правильный пароль!!!');
                            (new View)->ShowPage($f3);
                        }
                    } else {
                        $f3->set('error', 'Упс... Такого пользователя нет!!!');
                        (new View)->ShowPage($f3);
                    }
                } else {
                    $f3->set('error', 'Упс... Введите логин или пароль!!!');
                }
            } 
            (new View)->ShowPage($f3);
        }
        (new View)->ShowPage($f3);
    }
}