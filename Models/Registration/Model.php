<?php

namespace Registration;

class Model {
    /*
    Проверка логина на наличие
    */
    function GetNameOfUser($f3,$login){
        $db =$f3->get('db');
        $rows = $db->exec('SELECT LOGIN FROM users WHERE LOGIN=:LOGIN',array(':LOGIN' =>$login));
        foreach($rows as $row)
            $log = $row['LOGIN'];
        return $log;
    }
    /*
    Проверка почты на наличие
    */
    function GetEmailOfUser($f3,$email){
        $db =$f3->get('db');
        $rows = $db->exec('SELECT EMAIL FROM users WHERE EMAIL=:EMAIL',array(':EMAIL' =>$email));
        foreach($rows as $row)
            $log = $row['EMAIL'];
        return $log;
    }
    /*
    Добавление пользователей
    */
    public function AddUser($f3,$firstname,$lastname,$email,$login,$password, $access_code,$date_create, $city, $age,$vk_link){
        $db =$f3->get('db');
		$db->exec('INSERT INTO users (FIRSTNAME, LASTNAME, EMAIL, LOGIN, PASSWORD, ACCESS_CODE, DATE_CREATE, CITY, VK_LINK, AGE,STATUS,SUBSCRIPTION) 
        VALUES(:FIRSTNAME, :LASTNAME, :EMAIL, :LOGIN, :PASSWORD, :ACCESS_CODE, :DATE_CREATE, :CITY, :VK_LINK, :AGE, :STATUS,:SUBSCRIPTION)',
        array(
            ':FIRSTNAME'=>$firstname,
            ':LASTNAME'=>$lastname,
            ':EMAIL'=>$email,
            ':LOGIN'=>$login,
            ':PASSWORD'=>$password, 
            ':ACCESS_CODE'=>$access_code,
            ':DATE_CREATE'=>$date_create, 
            ':CITY'=>$city, 
            ':VK_LINK'=>$vk_link, 
            ':AGE'=>$age,
            ':STATUS'=>0,
            ':SUBSCRIPTION'=>1
        ));
    }
}
