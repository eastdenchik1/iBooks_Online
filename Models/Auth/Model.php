<?php

namespace Auth;

class Model {

    /*
    Получение кода доступа пользователя
     */
    function GetAccessCodeOfUser($f3,$login){
        $db=$f3->get('db');
        $rows=$db->exec('SELECT ACCESS_CODE FROM users WHERE LOGIN=:LOGIN',array(':LOGIN' =>$login));
        foreach($rows as $row)
            $ACC_CODE = $row['ACCESS_CODE'];
        return $ACC_CODE;
    }

    function isLogin($f3,$login){
        $db=$f3->get('db');
        if ($db->exec('SELECT ACCESS_CODE FROM users WHERE LOGIN=:LOGIN',array(':LOGIN' =>$login))!=NULL){
            return true;
        } else 
            return false;
        }

    function GetPwdOfUser($f3,$login){
        $db =$f3->get('db');
        $rows = $db->exec('SELECT PASSWORD FROM users WHERE LOGIN=:LOGIN',array(':LOGIN' =>$login));
        foreach($rows as $row)
            $log = $row['PASSWORD'];
        return $log;
    }
 
    }