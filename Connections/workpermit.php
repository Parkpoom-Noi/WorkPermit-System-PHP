<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_workpermit = "localhost";
$database_workpermit = "workpermit";
$username_workpermit = "root";
$password_workpermit = "P@88w0rd";
$workpermit = mysql_pconnect($hostname_workpermit, $username_workpermit, $password_workpermit) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES UTF8");
?>