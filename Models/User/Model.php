<?php

namespace User;

class Model {
    function SelectInfoAboutUser($f3, $login){
        $db =$f3->get('db');
        $rows = $db->exec('SELECT * FROM users WHERE LOGIN=:LOGIN',array(':LOGIN' =>$login));
        return $rows;
    }

    function SelectInfoAboutUserByID($f3, $id){
        $db =$f3->get('db');
        $rows = $db->exec('SELECT * FROM users WHERE USER_ID=:USER_ID',array(':USER_ID' =>$id));
        return $rows;
    }
    
    function SelectAllUsers($f3,$login){
        $db =$f3->get('db');
        $rows = $db->exec('SELECT * FROM users WHERE LOGIN NOT IN (SELECT LOGIN FROM users WHERE LOGIN=:LOGIN)',array(':LOGIN' =>$login));
        return $rows;
    }

    function SelectUsersForSubscription($f3){
        $db =$f3->get('db');
        $rows = $db->exec('SELECT `EMAIL` FROM users WHERE SUBSCRIPTION=1 ');
        return $rows;
    }

    function DeleteUser($f3,$userid){
        $db =$f3->get('db');
        $db->exec('DELETE FROM users WHERE USER_ID=:USER_ID',array(':USER_ID' =>$userid));
    }

    function UpdateFirstname($f3,$userid, $firstname){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET FIRSTNAME=:FIRSTNAME WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':FIRSTNAME'=>$firstname));
    }

    function UpdateLastname($f3,$userid, $lastname){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET LASTNAME=:LASTNAME WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':LASTNAME'=>$lastname));
    }

    function UpdateLogin($f3,$userid, $login){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET LOGIN=:LOGIN WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':LOGIN'=>$login));
    }

    function UpdatePassword($f3,$userid, $password){
        $db =$f3->get('db');
        $pwd = md5($password);
        $db->exec('UPDATE users SET PASSWORD=:PASSWORD WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':PASSWORD'=>$pwd));
    }

    function UpdateSubscription($f3,$userid, $SUBSCRIPTION){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET SUBSCRIPTION=:SUBSCRIPTION WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':SUBSCRIPTION'=>$SUBSCRIPTION));
    }

    function UpdateEmail($f3,$userid, $email){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET EMAIL=:EMAIL WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':EMAIL'=>$email));
    }

    function UpdateCity($f3,$userid, $city){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET CITY=:CITY WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':CITY'=>$city));
    }

    function UpdateAge($f3,$userid, $age){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET AGE=:AGE WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':AGE'=>$age));
    }

    function UpdateVK($f3,$userid, $vk_link){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET VK_LINK=:VK_LINK WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':VK_LINK'=>$vk_link));
    }

    function UpdateAccessCode($f3,$userid, $acccode){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET ACCESS_CODE=:ACCESS_CODE WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':ACCESS_CODE'=>$acccode));
    }

    function UpdateStatus($f3,$userid, $status){
        $db =$f3->get('db');
        $db->exec('UPDATE users SET STATUS=:STATUS WHERE USER_ID=:USER_ID', array(':USER_ID'=>$userid, ':STATUS'=>$status));
    }

    function SelectStatus($f3, $id){
        $db =$f3->get('db');
        $rows = $db->exec('SELECT STATUS FROM users WHERE USER_ID=:USER_ID',array(':USER_ID' =>$id));
        return $rows;
    }
}