<?php

namespace Registration;

class RegistrationController{
    function RegPage($f3){
        if (isset($_POST['reg_user'])){
            if($_POST['firstname']!=''){
                if($_POST['lastname']!=''){
                    if($_POST['email']!=''){
                        if($_POST['login']!=''){
                            if($_POST['password']!=''){
                                if($_POST['city']!=''){
                                    if($_POST['age']!=''){
                                        if($_POST['password2']!=''){
                                            if($_POST['password']==$_POST['password2']){
                                                $log = (new Model)->GetNameOfUser($f3,$_POST['login']);
                                                if ($log!=$_POST['login']){
                                                    $eml = (new Model)->GetEmailOfUser($f3,$_POST['email']);
                                                    if ($eml!=$_POST['email']){
                                                        $pass = md5($_POST['password']);
                                                        $date_create = date("d.m.y");	
                                                        $access_code = 2;	
                                                        (new Model)->AddUser($f3,$_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["login"], $pass, $access_code, $date_create, $_POST['city'], $_POST['age'],0);
                                                        $f3->set('good','Регистрация прошла успешно.');
                                                        (new View)->ShowPage($f3);
                                                    } else {
                                                        $f3->set('error','Пользователь с таким E-mail уже есть.');
                                                        (new View)->ShowPage($f3);
                                                    }
                                                } else {
                                                    $f3->set('error','Пользователь с таким логином уже есть.');
                                                    (new View)->ShowPage($f3);
                                                } 
                                            } else {
                                                $f3->set('error','Введенные пароли не совпадают.');
                                                (new View)->ShowPage($f3);
                                            }
                                        } else {
                                            $f3->set('error','Введите повторный пароль.');
                                            (new View)->ShowPage($f3);
                                        }
                                    } else {
                                        $f3->set('error','Введите возраст.');
                                        (new View)->ShowPage($f3);
                                    }
                                } else {
                                    $f3->set('error','Введите город.');
                                    (new View)->ShowPage($f3);
                                }
                            } else {
                                $f3->set('error','Введите пароль.');
                                (new View)->ShowPage($f3);
                            }
                        } else {
                            $f3->set('error','Введите логин.');
                            (new View)->ShowPage($f3);
                        }
                    } else {
                        $f3->set('error','Введите email.');
                        (new View)->ShowPage($f3);
                    }
                } else {
                    $f3->set('error','Введите фамилию.');
                    (new View)->ShowPage($f3);
                }
            } else {
                $f3->set('error','Введите имя.');
                (new View)->ShowPage($f3);
            }
		} else {
			(new View)->ShowPage($f3);
		}
    }
}