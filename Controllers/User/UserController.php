<?php

namespace User;

class UserController {

    public function AdminPage($f3){ 
        session_start();
        if (isset($_SESSION['login'])){
            $AccCode = $_SESSION['access_code'];
            $f3->set('AccCode',$AccCode);
            $login = $_SESSION['login'];
            $f3->set('name',$login);
            $f3->set('title','Admin');
            $rows1 = (new Model)->SelectInfoAboutUser($f3,$login);
            $f3->set('rows1',$rows1);
            (new View)->ShowPage($f3);
        } else {
            $f3->set('error','Авторизуйтесь.');
            $f3->reroute('/login');
        }
    }



    public function ExitPage($f3){
        session_start();
        (new Model)->UpdateStatus($f3,$_SESSION['user_id'],0);
        $_SESSION = array();
        setcookie(session_name(), '', time() - 2592000, '/');
        session_destroy();
        $f3->reroute('/login');
    }

    public function DeleteUser($f3,$userid){
        (new Model)->DeleteUser($f3,$_POST['USER_ID']);
        $f3->reroute('users');
    }

    public function AddUser($f3){
        $pass = md5($_POST['PASSWORD']);
        $date_create = date("d.m.y");
        (new \Registration\Model)->AddUser($f3,$_POST['FIRSTNAME'],$_POST['LASTNAME'],$_POST['EMAIL'],$_POST['LOGIN'],$pass, $_POST['ACCESS_CODE'],$date_create, $_POST['CITY'], $_POST['AGE'],$_POST['VK_LINK']);
        $f3->reroute('/users');
    }

    public function AdminEditPage($f3){
        session_start();
        if(isset($_SESSION['login'])){
            if($_SESSION['access_code']==0){
                $Admin_ID = $_SESSION['user_id'];
                $f3->set('Admin_ID',$Admin_ID);
                (new View)->ShowAdminEditPage($f3);
            } else {
                $f3->reroute('/admin-dashboard');
            }
        } else {
            $f3->reroute('/login');
        }
    }

    public function UpdateCurrentUser($f3){
        if (isset($_POST['UpdateFirstname'])){
            session_start();
            (new Model)->UpdateFirstname($f3,$_POST['ADMIN_ID'],$_POST['FIRSTNAME']);
            $_SESSION['firstname'] = $_POST['FIRSTNAME'];
            $f3->reroute('/admin-dashboard');
        }
        if (isset($_POST['UpdateLastname'])){
            (new Model)->UpdateLastname($f3,$_POST['ADMIN_ID'],$_POST['LASTNAME']);
            $f3->reroute('/admin-dashboard');
        }
        if (isset($_POST['UpdateLogin'])){
            (new Model)->UpdateLogin($f3,$_POST['ADMIN_ID'],$_POST['LOGIN']);
            $f3->reroute('/admin-dashboard');
        }
        if (isset($_POST['UpdatePassword'])){
            (new Model)->UpdatePassword($f3,$_POST['ADMIN_ID'],$_POST['PASSWORD']);
            $f3->reroute('/admin-dashboard');
        }
        if (isset($_POST['UpdateSubscription'])){
            (new Model)->UpdateSubscription($f3,$_POST['ADMIN_ID'],$_POST['SUBSCRIPTION']);
            $f3->reroute('/admin-dashboard');
        }
        if (isset($_POST['UpdateEmail'])){
            (new Model)->UpdateEmail($f3,$_POST['ADMIN_ID'],$_POST['EMAIL']);
            $f3->reroute('/admin-dashboard');
        }
        if (isset($_POST['UpdateCity'])){
            (new Model)->UpdateCity($f3,$_POST['ADMIN_ID'],$_POST['CITY']);
            $f3->reroute('/admin-dashboard');
        }
        if (isset($_POST['UpdateAge'])){
            (new Model)->UpdateAge($f3,$_POST['ADMIN_ID'],$_POST['AGE']);
            $f3->reroute('/admin-dashboard');
        }
        if (isset($_POST['UpdateVK'])){
            (new Model)->UpdateVK($f3,$_POST['ADMIN_ID'],$_POST['VK_LINK']);
            $f3->reroute('/admin-dashboard');
        }
    }

    public function AdminPageUsers($f3){
        session_start();
        if(isset($_SESSION['login'])){
            if($_SESSION['access_code']==0){
                $AccCode = $_SESSION['access_code'];
                $f3->set('AccCode',$AccCode);
                $Admin_ID = $_SESSION['user_id'];
                $f3->set('Admin_ID',$Admin_ID);
                $login = $_SESSION['login'];
                $rows2 = (new Model)->SelectAllUsers($f3,$login);
                $f3->set('rows2',$rows2);
                $f3->set('funcVK',function($a) {
                    if ($a!="0") {
                        echo $a;
                    } else {
                        echo " - ";
                    }                        
                }
            );
                $f3->set('funcRole',function($a) {
                 if ($a=="0") {
                     echo "Админ";
                 } elseif ($a=="1") {
                    echo "Редактор";
                } else {
                    echo "Пользователь";
                }                        
            }
        );
                (new View)->ShowPageUsers($f3);
            } else {                
                $f3->reroute('/admin-dashboard');
            }
        } else {
            $f3->reroute('/login');
        }
    }

    public function AdminAddingUser($f3){
        session_start();
        if(isset($_SESSION['login'])){
            if($_SESSION['access_code']==0){
                (new View)->ShowPageAddingUser($f3);
            } else {                
                $f3->reroute('/admin-dashboard');
            }
        } else {
            $f3->reroute('/login');
        }
    }

    public function UserPageEdit($f3){
        session_start();
        if(isset($_SESSION['login'])){
            if($_SESSION['access_code']==0){
                $f3->set('funcRole',function($a) {
                    if ($a=="0") {
                        echo "Админ";
                    } elseif ($a=="1") {
                       echo "Редактор";
                   } else {
                       echo "Пользователь";
                   }                        
               }
           );
                $rows1 = (new Model)->SelectInfoAboutUserByID($f3,$_POST['USER_ID']);
                $f3->set('rows1',$rows1);
                $f3->set('User_ID',$_POST['USER_ID']);
                (new View)->ShowPageUserEdit($f3);
            } else {
                $f3->reroute('/admin-dashboard');
            }
        } else {
            $f3->reroute('/login');
        }
    }

    public function UpdateUser($f3){
        if (isset($_POST['UpdateFirstname'])){
            (new Model)->UpdateFirstname($f3,$_POST['USER_ID'],$_POST['FIRSTNAME']);
            $f3->reroute('/users');
        }
        if (isset($_POST['UpdateLastname'])){
            (new Model)->UpdateLastname($f3,$_POST['USER_ID'],$_POST['LASTNAME']);
            $f3->reroute('/users');
        }
        if (isset($_POST['UpdateLogin'])){
            (new Model)->UpdateLogin($f3,$_POST['USER_ID'],$_POST['LOGIN']);
            $f3->reroute('/users');
        }
        if (isset($_POST['UpdatePassword'])){
            (new Model)->UpdatePassword($f3,$_POST['USER_ID'],$_POST['PASSWORD']);
            $f3->reroute('/users');
        }
        if (isset($_POST['UpdateSubscription'])){
            (new Model)->UpdateSubscription($f3,$_POST['USER_ID'],$_POST['SUBSCRIPTION']);
            $f3->reroute('/admin-dashboard');
        }
        if (isset($_POST['UpdateEmail'])){
            (new Model)->UpdateEmail($f3,$_POST['USER_ID'],$_POST['EMAIL']);
            $f3->reroute('/users');
        }
        if (isset($_POST['UpdateCity'])){
            (new Model)->UpdateCity($f3,$_POST['USER_ID'],$_POST['CITY']);
            $f3->reroute('/users');
        }
        if (isset($_POST['UpdateAge'])){
            (new Model)->UpdateAge($f3,$_POST['USER_ID'],$_POST['AGE']);
            $f3->reroute('/users');
        }
        if (isset($_POST['UpdateVK'])){
            (new Model)->UpdateVK($f3,$_POST['USER_ID'],$_POST['VK_LINK']);
            $f3->reroute('/users');
        }
        if (isset($_POST['UpdateAccessCode'])){
            (new Model)->UpdateAccessCode($f3,$_POST['USER_ID'],$_POST['ACCESS_CODE']);
            $f3->reroute('/users');
        }
    }

    
}
