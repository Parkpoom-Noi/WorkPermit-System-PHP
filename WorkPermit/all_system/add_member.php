<?php require_once('../../Connections/workpermit.php'); ?>

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO member (UserID, Username, Password, Name, Status) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['UserID'], "int"),
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['Status'], "text"));

  mysql_select_db($database_workpermit, $workpermit);
  $Result1 = mysql_query($insertSQL, $workpermit) or die(mysql_error());

  $insertGoTo = "all_member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_workpermit, $workpermit);
$query_Recordset1 = "SELECT * FROM member";
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

<body><br>
<h1 align="center"> Add Member </h1>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<table width="458" height="247" border="0" align="center"  class="table table-hover"  style="width: auto; height:auto;" >
  <tr>
    <td width="140">Name</td>
    <td><input type="text" name="Name" value="" size="32" class="form-control" style="width: auto;" /></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input type="text" name="Username" value="" size="32" class="form-control" style="width: auto;"/></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="Password" value="" size="32"class="form-control" style="width: auto;" /></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><select name="Status"  class="form-control" style="width: auto;"  >
      <option value=""></option>
      <option value="USER">USER</option>
      <option value="ADMIN">ADMIN</option>
      <option value="APPROVED">APPROVED</option>
      <option value="AREA">AREA OWNER</option>
      <option value="PM">PM STAFF</option>
    </select></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td ><label>
      <input type="submit" name="button" id="button" value="Submit" class="btn" />
    </label>
      <input type="hidden" name="MM_insert" value="form1" /></td>
  </tr>
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
