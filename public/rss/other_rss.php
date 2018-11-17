<?php


 include "con_db.php";

  

  /* ОБРАБОТКА ДАННЫХ И ПОСТРОЕНИЕ XML ФАЙЛА */


/* Показываем браузеру, что это xml-документ */


header("content-type:text/xml");
date_default_timezone_set('Europe/Kiev');

$result=mysqli_query($db,"SELECT * FROM `articles` WHERE `datetime` > DATE_SUB(NOW(), INTERVAL 2 DAY) and `datetime` < DATE_ADD(NOW(), INTERVAL 1 HOUR)   ORDER BY `datetime` DESC LIMIT 10");

echo "<?xml version=\"1.0\"?>
   <rss version=\"2.0\">
        <channel>
           <title>East Fruit Новости</title>
           <link>https://east-fruit.com/</link>
           <description>Информация о рынках овощей и фруктов на восток от Евросоюза</description>
           <language>ru-ru</language>";

   while ($myrow = mysqli_fetch_array($result)){;


		 echo "<item>".


		 "<title>".strip_tags($myrow['title'])."</title>".



		 "<link>https://east-fruit.com/article/".$myrow['slug']."</link>".


		 "<description><![CDATA[".$myrow['lid']."]]></description>".


		 "<pubDate>".date("r",strtotime($myrow['datetime']))."</pubDate>".


		 "</item>";

	}

  


echo "</channel></rss>";
?>