<?php
/**
 * Created by PhpStorm.
 * User: eastden4ik
 * Date: 25.02.19
 * Time: 22:31
 */

set_time_limit(0);
include("sitemap.php");
$sitemap = new sitemap();

//игнорировать ссылки с расширениями:
$sitemap->set_ignore(array("javascript:", ".css", ".js", ".ico", ".jpg", ".png", ".jpeg", ".swf", ".gif"));

//ссылка Вашего сайта:
$sitemap->get_links("https://library.sviridovden.ru");

//если нужно вернуть просто массив с данными:
//header ("content-type: text/xml");

//$arr = $sitemap->get_array();
//echo "<pre>";
//print_r($arr);
//echo "</pre>";

$map = $sitemap->generate_sitemap();

$fd = fopen("Sitemap.xml", 'w') or die("Не удалось создать файл");

fwrite($fd, $map);

fclose($fd);
