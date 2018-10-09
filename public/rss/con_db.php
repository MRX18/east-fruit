<?php 


$DB_host = "127.0.0.1"; // имя сервера MySQL


$DB_user = "eastfrui_admin"; // имя пользователя MySQL


$DB_pass = "MW#w?HMN~M!i"; // пароль на сервере MySQL


$DB_name = "eastfrui_db"; // имя базы данных 


/* Соединяемся с сервером MySQL */


$db=mysqli_connect($DB_host,$DB_user,$DB_pass);


/* Выбираем необходимую базу данных */


mysqli_select_db( $db, $DB_name);


/* Устанавливаем кодировку */


mysqli_query($db,'SET NAMES UTF-8');