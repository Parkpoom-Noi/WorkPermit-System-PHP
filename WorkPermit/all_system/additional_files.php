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

$colname_Recordset1 = "-1";
if (isset($_GET['Filesordinal'])) {
  $colname_Recordset1 = $_GET['Filesordinal'];
}
mysql_select_db($database_workpermit, $workpermit);
$query_Recordset1 = sprintf("SELECT * FROM files WHERE Filesordinal = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $workpermit) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>

<body><br />
<br />
<h2 align="center">เอกสารเพิ่มเติม( Additional documents)</h2>
<br /><form action="" method="get"><table width="550" height="77" border="1" cellpadding="0" cellspacing="0" align="center"  class="table table-hover"  style="width: auto; height:auto;" >
  <tr>
    <td width="100" height="30" bgcolor="#808080" align="center"><strong>Files No.</strong></td>
    <td width="300" bgcolor="#808080" align="center"><strong>Files Name </strong></td>
    <td width="142" bgcolor="#808080" align="center"><strong>Menu</strong></td>
  </tr>
  <?php  $c=1; for ($i = 1; $i <= $row_Recordset1; $i++) { ?>
  <?php do { ?>
    <tr>
      <td align="center" height="40"><?php echo $c;  ?></td>
      <td align="center"><a href="../files_upload/<?php echo $row_Recordset1['FilesName']; ?>"><?php echo $row_Recordset1['FilesName']; ?></a></td>
      <td align="center"><a onclick="return confirm ('Sure To Delete This Document ?');"  href="delete_file.php?FilesID=<?php echo $row_Recordset1['FilesID']; ?>">Delete</a></td>
    </tr>
      <?php count($c++)  ?>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    <?php } ?>
</table>
</form>
<br>
    <br> <br>
    <br>
    <br>
    <br> <br>
    <br>
    <br>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
