<?php require_once('../Connections/workpermit.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_workpermit, $workpermit);
$query_Recordset1 = "SELECT * FROM files";
$Recordset1 = mysql_query($query_Recordset1, $workpermit) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
	
	$strSQL = "SELECT * FROM files";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
	<table width="336" border="1">
	<tr>
	<th width="70"> <div align="center">Files ID </div></th>
	<th width="250"> <div align="center">Files Name </div></th>
	</tr>
	<?php
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<tr>
	<td><div align="center"><?php echo $objResult["FilesID"];?></div></td>
	<td><center><a href="files_upload/<?php echo $objResult["FilesName"];?>"><?php echo $objResult["FilesName"];?></a></center></td>
	</tr>
	<?php
	}
	?>
	</table>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
