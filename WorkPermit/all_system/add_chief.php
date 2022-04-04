
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form")) {
  $updateSQL = sprintf("UPDATE permit_sheet SET permit_sheet_contractor_chief_name=%s, permit_sheet_contractor_chief_surname=%s, permit_sheet_contractor_chief_company=%s, permit_sheet_contractor_chief__position=%s WHERE permit_sheet_no_id=%s",
                       GetSQLValueString($_POST['permit_sheet_contractor_chief_name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_contractor_chief_surname'], "text"),
                       GetSQLValueString($_POST['permit_sheet_contractor_chief_company'], "text"),
                       GetSQLValueString($_POST['permit_sheet_contractor_chief__position'], "text"),
                       GetSQLValueString($_POST['permit_sheet_no_id'], "int"));

  mysql_select_db($database_workpermit, $workpermit);
  $Result1 = mysql_query($updateSQL, $workpermit) or die(mysql_error());

  $updateGoTo = "add_chief_succ.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['permit_sheet_no_id'])) {
  $colname_Recordset1 = $_GET['permit_sheet_no_id'];
}
mysql_select_db($database_workpermit, $workpermit);
$query_Recordset1 = sprintf("SELECT * FROM permit_sheet WHERE permit_sheet_no_id = %s", GetSQLValueString($colname_Recordset1, "int"));
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

<body>
<h2 align="center">Add Contractor Chief</h2>
<form action="<?php echo $editFormAction; ?>" name="form" method="POST" class="form-inline"  > 
<table width="594" height="235" border="0" align="center"   class="table table-hover"  style="width: auto; height:auto;">
  <tr>
    <td colspan="2" align="center">
       <strong>เลขที่ (Permit No.)
          
    </strong> <strong><strong>
    <input name="permit_sheet_no_id" type="text"  class="form-control" value="<?php echo $row_Recordset1['permit_sheet_no_id']; ?>" size="10" maxlength="10" readonly="readonly" style="width: auto;"  />
    </strong></strong>
    </td>
    </tr>
  <tr>
    <td width="185" align="center">ชื่อ (Name)</td>
    <td width="404"><label>
      <input name="permit_sheet_contractor_chief_name" type="text"   size="60" maxlength="60" class="form-control" style="width: auto;"  /> 
    </label></td>
  </tr>
  <tr>
    <td align="center" >นามสกุล (Surname)</td>
    <td><input name="permit_sheet_contractor_chief_surname" type="text" id="textfield2" size="60" maxlength="60" class="form-control" style="width: auto;"  /></td>
  </tr>
  <tr>
    <td align="center" >บริษัท (Company)</td>
    <td><input name="permit_sheet_contractor_chief_company" type="text" id="textfield3" size="60" maxlength="60" class="form-control" style="width: auto;"  /></td>
  </tr>
  <tr>
    <td align="center" >ตำแหน่ง (Position)</td>
    <td><input name="permit_sheet_contractor_chief__position" type="text" id="textfield4" size="60" maxlength="60" class="form-control" style="width: auto;"  /></td>
  </tr>
  <tr>
    <td colspan="2" align="center" ><label>
      <input type="submit" name="button"   value="Add" class="btn" />
    </label></td>
    </tr>
</table>
<input type="hidden" name="MM_update" value="form" />
  
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
