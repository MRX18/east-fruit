<?php


 include "con_db.php";

  

  /* ОБРАБОТКА ДАННЫХ И ПОСТРОЕНИЕ XML ФАЙЛА */


/* Показываем браузеру, что это xml-документ */


header("content-type:text/xml");


/* Выводим название и описание канала*/

//windows-1251
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>


<rss version=\"2.0\">


<channel>


<title>East Fruit RSS</title>


<link>https://east-fruit.com/</link>


<description>Информация о рынках овощей и фруктов на восток от Евросоюза</description>


<language>ru-ru</language>";


/* В цикле выводим все заметки из базы данных 

  из таблицы articles (у Вас будет другая таблица)*/


$result=mysqli_query($db,"SELECT * FROM `articles` WHERE `date` > DATE_SUB(NOW(), INTERVAL 2 DAY) ORDER BY `datetime` DESC");



 while ($myrow = mysqli_fetch_array($result)){;


 echo "<item>".


 "<title>".strip_tags($myrow['title'])."</title>".



 "<link>https://east-fruit.com/article/".$myrow['slug']."</link>".


 "<description><![CDATA[".$myrow['lid']."]]></description>".


 "<pubDate>".date("r",strtotime($myrow['datetime']))."</pubDate>".


 "<guid>https://east-fruit.com/article/".$myrow['slug']."</guid>".


 "</item>";

  }

  


echo "</channel></rss>";


?>