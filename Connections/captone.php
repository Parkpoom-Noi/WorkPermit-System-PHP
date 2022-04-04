<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_captone = "localhost";
$database_captone = "capstone";
$username_captone = "root";
$password_captone = "P@88w0rd";
$captone = mysql_pconnect($hostname_captone, $username_captone, $password_captone) or trigger_error(mysql_error(),E_USER_ERROR); 
?>