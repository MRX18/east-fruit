<?php


 include "con_db.php";

  

  /* ОБРАБОТКА ДАННЫХ И ПОСТРОЕНИЕ XML ФАЙЛА */


/* Показываем браузеру, что это xml-документ */


header("content-type:text/xml");
date_default_timezone_set('Europe/Kiev');

/* Выводим название и описание канала*/

//windows-1251
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>


<rss version=\"2.0\" xmlns=\"http://backend.userland.com/rss2\"  xmlns:yandex=\"http://news.yandex.ru\">


<channel>


<title>East Fruit Новости</title>


<link>https://east-fruit.com/</link>


<description>Информация о рынках овощей и фруктов на восток от Евросоюза</description>
<image>
            <url>https://east-fruit.com/images/east-fruit.png</url>
            <title>Новости сайта EAST-FRUIT</title>
            <link>https://east-fruit.com/</link>
        </image>

<language>ru-ru</language>";


/* В цикле выводим все заметки из базы данных 

  из таблицы articles (у Вас будет другая таблица)*/


$result=mysqli_query($db,"SELECT * FROM `articles` WHERE `datetime` > DATE_SUB(NOW(), INTERVAL 2 DAY) and `datetime` < DATE_ADD(NOW(), INTERVAL 1 HOUR) and `id_country`=5   ORDER BY `datetime` DESC LIMIT 10");



 while ($myrow = mysqli_fetch_array($result)){;


 echo "<item>".


 "<title>".strip_tags($myrow['title'])."</title>".



 "<link>https://east-fruit.com/article/".$myrow['slug']."</link>".


 "<description><![CDATA[".$myrow['lid']."]]></description>".
 "<category>Экономика</category>".
 "<enclosure url=\"https://east-fruit.com/".$myrow['img']."\" type=\"image/jpeg\" />".


 "<pubDate>".date("r",strtotime($myrow['datetime']))."</pubDate>".
 "<yandex:full-text>".
 htmlspecialchars(strip_tags($myrow['text'])).
 //html_entity_decode(strip_tags($myrow['text'])).
 "</yandex:full-text>".


 "</item>";

  }

  


echo "</channel></rss>";


?>