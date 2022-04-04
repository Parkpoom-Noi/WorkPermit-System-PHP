<?php require_once('../../Connections/workpermit.php');  
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frmMain")) {
  $insertSQL = sprintf("INSERT INTO permit_sheet (permit_sheet_company, permit_sheet_date, permit_sheet_permit_to, permit_sheet_no_of_work, permit_sheet_hot_work, permit_sheet_high_work, permit_sheet_space_work, permit_sheet_elec_work, permit_sheet_chemical_work, permit_sheet_anouther_work, permit_sheet_anouther_detail, permit_sheet_support_work, permit_sheet_detail, permit_sheet_start_date, permit_sheet_end_date, permit_sheet_start_time, permit_sheet__end_time, permit_sheet_area_of, permit_sheet_area_other, permit_sheet_chief, permit_sheet_telephone_no, permit_sheet_chemical, permit_sheet_waste_form_work, permit_sheet_ordinal, permit_sheet_incharge_name, permit_sheet_inchange_dept, permit_sheet_incharge_section, permit_sheet_incharge_email, permit_sheet_area_owner_name, permit_sheet_area_owner_status, permit_sheet_area_owner_dept, permit_sheet_area_owner_section, permit_sheet_area_owner_email, permit_sheet_pm_staff_name, permit_sheet_pm_staff_dept, permit_sheet_pm_staff_section, permit_sheet_pm_staff_email, permit_sheet_manager_approved__name, permit_sheet_manager_approved_status, permit_sheet_manager_approved__dept, permit_sheet_manager_approved_section, permit_sheet_manager_approved_email, permit_sheet_soh_div_name, permit_sheet_soh_div_dept, permit_sheet_soh_div_section, permit_sheet_soh_div_email) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['permit_sheet_company'], "text"),
                       GetSQLValueString($_POST['permit_sheet_date'], "text"),
                       GetSQLValueString($_POST['permit_sheet_permit_to'], "text"),
                       GetSQLValueString($_POST['permit_sheet_no_of_work'], "int"),
                       GetSQLValueString($_POST['permit_sheet_hot_work'], "text"),
                       GetSQLValueString($_POST['permit_sheet_high_work'], "text"),
                       GetSQLValueString($_POST['permit_sheet_space_work'], "text"),
                       GetSQLValueString($_POST['permit_sheet_elec_work'], "text"),
                       GetSQLValueString($_POST['permit_sheet_chemical_work'], "text"),
                       GetSQLValueString($_POST['permit_sheet_anouther_work'], "text"),
                       GetSQLValueString($_POST['permit_sheet_anouther_detail'], "text"),
                       GetSQLValueString($_POST['permit_sheet_support_work'], "text"),
                       GetSQLValueString($_POST['permit_sheet_detail'], "text"),
                       GetSQLValueString(date('Y-m-d', strtotime($_POST["permit_sheet_start_date"])), "date"),
                       GetSQLValueString(date('Y-m-d', strtotime($_POST['permit_sheet_end_date'])), "date"),
                       GetSQLValueString($_POST['permit_sheet_start_time'], "date"),
                       GetSQLValueString($_POST['permit_sheet__end_time'], "date"),
                       GetSQLValueString($_POST['permit_sheet_area_of'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_other'], "text"),
                       GetSQLValueString($_POST['permit_sheet_chief'], "text"),
                       GetSQLValueString($_POST['permit_sheet_telephone_no'], "text"),
                       GetSQLValueString($_POST['permit_sheet_chemical'], "text"),
                       GetSQLValueString($_POST['permit_sheet_waste_form_work'], "text"),
                       GetSQLValueString($_POST['permit_sheet_ordinal'], "text"),
                       GetSQLValueString($_POST['permit_sheet_incharge_name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_inchange_dept'], "text"),
                       GetSQLValueString($_POST['permit_sheet_incharge_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_incharge_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_name'], "text"),
					   GetSQLValueString($_POST['permit_sheet_area_owner_status'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_dept'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_dept'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved__name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved__dept'], "text"),
					   GetSQLValueString($_POST['permit_sheet_manager_approved_status'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_dept'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_email'], "text"));

  mysql_select_db($database_workpermit, $workpermit);
  $Result1 = mysql_query($insertSQL, $workpermit) or die(mysql_error());

}
	for($i=0;$i<count($_FILES["filUpload"]["name"]);$i++)
	{
		if($_FILES["filUpload"]["name"][$i] != "")
		{
			if(move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i],"../files_upload/".$_POST['permit_sheet_ordinal'].$_FILES["filUpload"]["name"][$i]))
			{
 
				$strSQL = "INSERT INTO files ";
				$strSQL .="(Filesordinal,FilesName) VALUES ('" .$_POST['permit_sheet_ordinal']."','".$_POST['permit_sheet_ordinal'].$_FILES["filUpload"]["name"][$i]."')";
				$objQuery = mysql_query($strSQL);
			}
		}
	}
	
	
if( $_POST ["permit_sheet_elec_work"] == '' )
	{
		if( $_POST ["permit_sheet_area_owner_status"] == 'M&AREA' ){
					ini_set("SMTP","170.95.36.198");

					$strTo = $_POST['permit_sheet_area_owner_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: ".$_POST['permit_sheet_incharge_name']." < ".$_POST['permit_sheet_incharge_email']. ">\r\nReply-To:  " .$_POST['permit_sheet_incharge_email']."";
					$strMessage = nl2br( "<h3>To : ".$_POST['permit_sheet_area_owner_name']." (Area owner) </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n<a href='http://localhost/WorkPermit/member_m&area/approved_area.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."'>http://localhost/WorkPermit/member_m&area/approved_area.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."</a>
						\n
						\n====================================================================================\n
						<b><u>E-mail Send from Work permit System. </b></u>
						\n====================================================================================" 
						) ;
					$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
						if($flgSend)
					{
						header ("Location:workpermit_sending.php");
					}
				else
					{
						header ("Location:workpermit_cantsend.php");
					}
		}
					
		else  {
			
			ini_set("SMTP","170.95.36.198");

					$strTo =   $_POST['permit_sheet_area_owner_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: ".$_POST['permit_sheet_incharge_name']." < ".$_POST['permit_sheet_incharge_email']. ">\r\nReply-To:  " .$_POST['permit_sheet_incharge_email']."";
					$strMessage = nl2br( "<h3>To : ".$_POST['permit_sheet_area_owner_name']." (Area owner) </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n<a href='http://localhost/WorkPermit/member_area/approved_area.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."'>http://localhost/WorkPermit/member_area/approved_area.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."</a>
						\n
						\n====================================================================================\n
						<b><u>E-mail Send from Work permit System. </b></u>
						\n====================================================================================" 
						) ;
					$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
						if($flgSend)
					{
						header ("Location:workpermit_sending.php");
					}
				else
					{
						header ("Location:workpermit_cantsend.php");
					}
		}
	
	
	}
else
	{
		ini_set("SMTP","170.95.36.198");

					$strTo =  $_POST['permit_sheet_incharge_email'];  
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: ".$_POST['permit_sheet_incharge_name']." < ".$_POST['permit_sheet_incharge_email']. ">\r\nReply-To:  " .$_POST['permit_sheet_incharge_email']. " ";
					$strMessage = nl2br( "<h3>To : ".$_POST['permit_sheet_pm_staff_name']." (PM Staff) </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n<a href='http://localhost/WorkPermit/member_pm/approved_pm.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."'>http://localhost/WorkPermit/member_pm/approved_pm.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."</a>
						\n
						\n====================================================================================\n
						<b><u>E-mail Send from Work permit System. </b></u>
						\n====================================================================================" 
						) ;
		$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
				if($flgSend)
					{
						header ("Location:workpermit_sending.php");
					}
				else
					{
						header ("Location:workpermit_cantsend.php");
					}
	
	}
	



?>

