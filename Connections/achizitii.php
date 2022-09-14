<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_achizitii = "localhost";
$database_achizitii = "achizitii";
$username_achizitii = "root";
$password_achizitii = "";
$achizitii = mysql_pconnect($hostname_achizitii, $username_achizitii, $password_achizitii) or trigger_error(mysql_error(),E_USER_ERROR); 
?>