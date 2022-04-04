<?php require_once('../Connections/workpermit.php');  

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
  $insertSQL = sprintf("INSERT INTO contract_admin (contract_admin_name, contract_admin_surname, contract_admin_e_mail, contract_admin_dept, contract_admin_section, contract_admin_permit_no, contract_admin_detail) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['contract_admin_name'], "text"),
                       GetSQLValueString($_POST['contract_admin_surname'], "text"),
                       GetSQLValueString($_POST['contract_admin_e_mail'], "text"),
                       GetSQLValueString($_POST['contract_admin_dept'], "text"),
                       GetSQLValueString($_POST['contract_admin_section'], "text"),
                       GetSQLValueString($_POST['contract_admin_permit_no'], "int"),
                       GetSQLValueString($_POST['contract_admin_detail'], "text"));

  mysql_select_db($database_workpermit, $workpermit);
  $Result1 = mysql_query($insertSQL, $workpermit) or die(mysql_error());
}

$colname_Recordset1 = "-1";
if (isset($_GET['contract_admin_id'])) {
  $colname_Recordset1 = $_GET['contract_admin_id'];
}
mysql_select_db($database_workpermit, $workpermit);
$query_Recordset1 = sprintf("SELECT * FROM contract_admin WHERE contract_admin_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $workpermit) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['contract_admin_ordinal'])) {
  $colname_Recordset2 = $_GET['contract_admin_ordinal'];
}
mysql_select_db($database_workpermit, $workpermit);
$query_Recordset2 = sprintf("SELECT * FROM contract_admin WHERE contract_admin_ordinal = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysql_query($query_Recordset2, $workpermit) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Admin report</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>

<body>
<br />
<br />

<h3 align="center"> Contact Admin</h3>

<form id="form1" name="form1" method="post"  >
  <table width="770" height="281" border="0" cellpadding="5" cellspacing="0" align="center"  class="table table-hover"  style="width: auto; height:auto;">
    <tr>
      <td height="33">Contract Admin No. <U> <font color="#0000FF">  <?php echo $row_Recordset1['contract_admin_id']; ?><?php echo $row_Recordset2['contract_admin_id']; ?> </font>  </u> </td>
    </tr>
    <tr>
      <td height="45">ชื่อ (Name) :  <U> <font color="#0000FF">  <?php echo $row_Recordset1['contract_admin_name']; ?> <?php echo $row_Recordset2['contract_admin_name']; ?> </font>  </u></td>
    </tr>
    <tr>
      <td height="42">E-mail address : <U> <font color="#0000FF">  <?php echo $row_Recordset1['contract_admin_e_mail']; ?><?php echo $row_Recordset2['contract_admin_e_mail']; ?> </font>  </u> </td>
    </tr>
    <tr>
      <td height="42">ฝ่าย (Dept.)
        
      : <u> <font color="#0000FF"> <?php echo $row_Recordset1['contract_admin_dept']; ?><?php echo $row_Recordset2['contract_admin_dept']; ?></font></u></td>
    </tr>
    <tr>
      <td height="37"><p>หน่วยงาน/แผนก (Section/Div) : <U> <font color="#0000FF">  <?php echo $row_Recordset1['contract_admin_section']; ?> <?php echo $row_Recordset2['contract_admin_section']; ?></font> </u> </p></td>
    </tr>
    <tr>
      <td height="39">เลขที่ใบเวิร์กเพอมิท (Permit No.) : <U> <font color="#0000FF">  <?php echo $row_Recordset1['contract_admin_permit_no']; ?><?php echo $row_Recordset2['contract_admin_permit_no']; ?> </font>  </u> </td>
    </tr>
    <tr>
      <td height="41"><p>รายละเอียด (Detail) :  <U> <font color="#0000FF"> <?php echo $row_Recordset1['contract_admin_detail']; ?><?php echo $row_Recordset2['contract_admin_detail']; ?> </font>  </u> </p></td>
    </tr>
    
  </table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
