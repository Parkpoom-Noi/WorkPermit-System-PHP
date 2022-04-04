<?php require_once("../../Connections/workpermit.php"); 

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
  $insertSQL = sprintf("INSERT INTO contract_admin (contract_admin_ordinal, contract_admin_name, contract_admin_e_mail, contract_admin_dept, contract_admin_section, contract_admin_permit_no, contract_admin_detail) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['contract_admin_ordinal'], "text"),
					   GetSQLValueString($_POST['contract_admin_name'], "text"),
                       GetSQLValueString($_POST['contract_admin_e_mail'], "text"),
                       GetSQLValueString($_POST['contract_admin_dept'], "text"),
                       GetSQLValueString($_POST['contract_admin_section'], "text"),
                       GetSQLValueString($_POST['contract_admin_permit_no'], "int"),
                       GetSQLValueString($_POST['contract_admin_detail'], "text"));

  mysql_select_db($database_workpermit, $workpermit);
  $Result1 = mysql_query($insertSQL, $workpermit) or die(mysql_error());
}
 
ini_set("SMTP","170.95.36.198");
//ini_set("sendmail_from","poom@hitachi-chem-at.co.th");
	$strTo =  " juthamas@hitachi-chem-at.co.th , Jeerapa@hitachi-chem-at.co.th ";
	$strSubject =  "Contract Admin Workpermit System" ;
	$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; // or UTF-8 //
	$strHeader .= "From: ".$_POST["contract_admin_name"]."<".$_POST["contract_admin_e_mail"].">\r\nReply-To: ".$_POST["contract_admin_e_mail"]."";
	$strMessage = nl2br( "<h3>To : Admin Workpermit System </h3>
						\n 
						<b><font color='#0000FF'>Workpermit No.</font></b><u> ".$_POST["contract_admin_permit_no"]. "</u> \n\n<b>Request to change details in work permit. </b>\n<u>"  .$_POST["contract_admin_detail"]."</u>\n\n\nPlease login to approve or reject requirement on the following web pages.\n <a href='http://localhost/WorkPermit/member_admin/report_contactadmin.php?contract_admin_ordinal=".$_POST["contract_admin_ordinal"]."'>http://localhost/WorkPermit/member_admin/report_contactadmin.php?contract_admin_ordinal=".$_POST["contract_admin_ordinal"]."</a>
						\n
						\n====================================================================================\n
						<b><u>E-mail นี้ส่งผ่านระบบ Workpermit System </b></u>
						\n====================================================================================" 
						) ;
	$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
	if($flgSend)
	{
		header ("Location:contactadmin_sending.php");
	}
	else
	{
	    header ("Location:contactadmin_cantsend.php");
	}
?>
