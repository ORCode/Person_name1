<?php
$db_host        ='localhost';
$db_user        ='admin1';
$db_pass        ='123456';
$db_database    ='db_estor';

$link = mysql_connect($db_host,$db_user,$db_pass);

mysql_select_db($db_database,$link) or die("Нет соединение с БД".mysql_error());
mysql_query("SET name cp1251")

?>