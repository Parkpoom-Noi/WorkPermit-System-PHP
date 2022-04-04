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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
  $updateSQL = sprintf("UPDATE member SET Username=%s, Password=%s, Name=%s, Status=%s WHERE UserID=%s",
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString($_POST['Password'], "text"),
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['Status'], "text"),
                       GetSQLValueString($_POST['UserID'], "int"));

  mysql_select_db($database_workpermit, $workpermit);
  $Result1 = mysql_query($updateSQL, $workpermit) or die(mysql_error());

  $updateGoTo = "all_member.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['UserID'])) {
  $colname_Recordset1 = $_GET['UserID'];
}
mysql_select_db($database_workpermit, $workpermit);
$query_Recordset1 = sprintf("SELECT * FROM member WHERE UserID = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $workpermit) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Member </title>
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>

<body>
<h1 align="center"> Edit Member </h1>

<form method="post" name="form1" id="form1" action="<?php echo $editFormAction; ?>" >
<table width="458" height="247" border="0" align="center"   class="table table-hover"  style="width: auto; height:auto;" >
  <tr>
    <td width="140">Name</td>
    <td><input type="text" name="Name" value="<?php echo htmlentities($row_Recordset1['Name'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control" style="width: auto;"  /></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input type="text" name="Username" value="<?php echo htmlentities($row_Recordset1['Username'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control" style="width: auto;" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="Password" value="<?php echo htmlentities($row_Recordset1['Password'], ENT_COMPAT, 'utf-8'); ?>" size="32" class="form-control" style="width: auto;" /></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><select name="Status" class="form-control" style="width: auto;" >
      <option value="<?php echo htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'utf-8'); ?>"><?php echo htmlentities($row_Recordset1['Status'], ENT_COMPAT, 'utf-8'); ?></option>
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
      <input type="submit" name="button" id="button" value="Submit" class="btn"  />
    </label>
      <input type="hidden" name="UserID" value="<?php echo $row_Recordset1['UserID']; ?>" />
      <input type="hidden" name="MM_update" value="form2" />
      <input name="button2" type="button" id="button2" onclick="MM_goToURL('parent','all_member.php');return document.MM_returnValue" value="Back"  class="btn"  /></td>
  </tr>
</table>
<p>&nbsp;</p>
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
