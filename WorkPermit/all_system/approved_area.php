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
if (isset($_GET['permit_sheet_ordinal'])) {
  $colname_Recordset1 = $_GET['permit_sheet_ordinal'];
}
mysql_select_db($database_workpermit, $workpermit);
$query_Recordset1 = sprintf("SELECT * FROM permit_sheet WHERE permit_sheet_ordinal = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $workpermit) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE permit_sheet SET permit_sheet_ordinal=%s, permit_sheet_issued_date=%s, permit_sheet_expined_date=%s, permit_sheet_incharge_name=%s, permit_sheet_incharge_email=%s, permit_sheet_area_owner_name=%s, permit_sheet_area_owner_dept=%s, permit_sheet_area_owner_section=%s, permit_sheet_area_owner_email=%s, permit_sheet_area_owner_sig=%s, permit_sheet_area_owner_answer=%s, permit_sheet_pm_staff_name=%s, permit_sheet_pm_staff_dept=%s, permit_sheet_pm_staff_section=%s, permit_sheet_pm_staff_email=%s, permit_sheet_manager_approved__name=%s, permit_sheet_manager_approved__dept=%s, permit_sheet_manager_approved_section=%s, permit_sheet_manager_approved_email=%s, permit_sheet_soh_div_name=%s, permit_sheet_soh_div_dept=%s, permit_sheet_soh_div_section=%s, permit_sheet_soh_div_email=%s WHERE permit_sheet_no_id=%s",
                       GetSQLValueString($_POST['permit_sheet_ordinal'], "text"),
                       GetSQLValueString($_POST['permit_sheet_issued_date'], "date"),
                       GetSQLValueString($_POST['permit_sheet_expined_date'], "date"),
                       GetSQLValueString($_POST['permit_sheet_incharge_name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_incharge_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_dept'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_sig'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_answer'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_dept'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved__name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved__dept'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_dept'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_no_id'], "int"));

  mysql_select_db($database_workpermit, $workpermit);
  $Result1 = mysql_query($updateSQL, $workpermit) or die(mysql_error());

if( $_POST['permit_sheet_area_owner_answer'] == 'accept')

	{
		if( $_POST ["manager_approved_status"] == 'M&AREA' )
		
				   {
					ini_set("SMTP","170.95.36.198");

					$strTo =     $_POST['permit_sheet_manager_approved_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: ".$_POST['permit_sheet_incharge_name']." < ".$_POST['permit_sheet_incharge_email']. ">\r\nReply-To:  " .$_POST['permit_sheet_incharge_email']."";
					$strMessage = nl2br( "<h3>To : ".$_POST['permit_sheet_manager_approved__name']." (Manager Approved) </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n<a href='http://localhost/WorkPermit/member_m&area/approved_manager.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."'>http://localhost/WorkPermit/member_m&area/approved_manager.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."</a>
						\n
						\n====================================================================================\n
						<b><u>E-mail Send from Work permit System. </b></u>
						\n====================================================================================" 
						) ;
					
					$strTo2 =   $_POST['permit_sheet_incharge_email'] ;  
					$strSubject2 =  "Your Work permit Area Owner Approved success" ;
					$strHeader2 = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader2 .= "From: ".$_POST['permit_sheet_area_owner_name']." < ".$_POST['permit_sheet_area_owner_email']. ">\r\nReply-To:  " .$_POST['permit_sheet_area_owner_email']. " ";
					$strMessage2 = nl2br( "<h3>To : ".$_POST['permit_sheet_incharge_name']." (Incharge) </h3>
						\n 
						<u><b>
Your Work permit Area Owner Approved success . </b></u>   \n
						\n
						\n====================================================================================\n
						<b><u>E-mail Send from Work permit System. </b></u>
						\n====================================================================================" 
						) ;
					
					$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
					$flgSend2 = @mail($strTo2,$strSubject2,$strMessage2,$strHeader2);  // @ = No Show Error //
						if($flgSend | $flgSend2)
					{
						header ("Location:workpermit_sending.php");
					}
				else
					{
						header ("Location:workpermit_cantsend.php");
					}
	
					
				}
				
		else 
		{
			ini_set("SMTP","170.95.36.198");

					$strTo =     $_POST['permit_sheet_manager_approved_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: ".$_POST['permit_sheet_incharge_name']." < ".$_POST['permit_sheet_incharge_email']. ">\r\nReply-To:  " .$_POST['permit_sheet_incharge_email']."";
					$strMessage = nl2br( "<h3>To : ".$_POST['permit_sheet_manager_approved__name']." (Manager Approved) </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n<a href='http://localhost/WorkPermit/member_manager/approved_manager.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."'>http://localhost/WorkPermit/member_manager/approved_manager.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."</a>
						\n
						\n====================================================================================\n
						<b><u>E-mail Send from Work permit System. </b></u>
						\n====================================================================================" 
						) ;
					
					$strTo2 =   $_POST['permit_sheet_incharge_email'] ;  
					$strSubject2 =  "Your Work permit Area Owner Approved success" ;
					$strHeader2 = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader2 .= "From: ".$_POST['permit_sheet_area_owner_name']." < ".$_POST['permit_sheet_area_owner_email']. ">\r\nReply-To:  " .$_POST['permit_sheet_area_owner_email']. " ";
					$strMessage2 = nl2br( "<h3>To : ".$_POST['permit_sheet_incharge_name']." (Incharge) </h3>
						\n 
						<u><b>
Your Work permit Area Owner Approved success . </b></u>   \n
						\n
						\n====================================================================================\n
						<b><u>E-mail Send from Work permit System. </b></u>
						\n====================================================================================" 
						) ;
					
					$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
					$flgSend2 = @mail($strTo2,$strSubject2,$strMessage2,$strHeader2);  // @ = No Show Error //
						if($flgSend | $flgSend2)
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

					$strTo =   $_POST['permit_sheet_incharge_email']  ;
					$strSubject =  "Reject case from Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: ".$_POST['permit_sheet_area_owner_name']." < ".$_POST['permit_sheet_area_owner_email']. ">\r\nReply-To:  " .$_POST['permit_sheet_area_owner_email']. " ";
					$strMessage = nl2br( "<h3>To : ".$_POST['permit_sheet_incharge_name']." (Incharge) </h3>
						\n 
						<u><b>
Your requirement not be approved. </b></u>   \n Reason : <u>".$_POST['areaowner']."</u>\n\n<b>Please login to Edit requirement on the following web pages.</b>\n\n
<a href='http://localhost/WorkPermit/index.php'>http://localhost/WorkPermit/index.php</a>
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

$colname_Recordset1 = "-1";
if (isset($_GET['permit_sheet_ordinal'])) {
  $colname_Recordset1 = $_GET['permit_sheet_ordinal'];
}
mysql_select_db($database_workpermit, $workpermit);
$query_Recordset1 = sprintf("SELECT * FROM permit_sheet WHERE permit_sheet_ordinal = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysql_query($query_Recordset1, $workpermit) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Area owner Approved</title>


  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script>
            
				$(document).ready(function() {
				$('input[name="permit_sheet_area_owner_answer"]').click(function() 
                {
                   
                    $('#areaowner').hide(); 
                    var value = $(this).val();
                    if (value == 'decline'){
                        $('#areaowner').show();
                    }
                    else{
                        $('#'+value).show();
                    }
                });
				 });
        </script>

<style type="text/css">
<!--
.signature {
	font-style: italic;
	font-size: 36px;
}
-->
</style>
</head>


<body>
<div align="center">
<form action="<?php echo $editFormAction; ?>" id="form1" name="form1" method="POST">
  <table width="" border="0" align="center" cellpadding="0" cellspacing="0"  >
    <tr>
      <td height="30" colspan="30" scope="row" ><strong>Hitachi chemical Automotive Products (Thailand) Co.,Ltd.</strong></td>
      </tr>
    <tr>
      <td scope="row" height="30" width="28"></td>
      <td height="30" colspan="21" ><strong>เอกสารขออนุญาติเข้าปฏิบัติงานของผู้รับเหมาหรือบุคคลภายนอก (Permit to Work)</strong></td>
      <td height="30" colspan="8" ><strong>เลขที่ (Permit No.) : </strong><u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_no_id']; ?></font></u></td>
      </tr>
    <tr>
      <td height="30" colspan="22" scope="row"><strong><U>ผู้รับเหมา/บุคคลภายนอก (Contrator/Outsouce)</U></strong></td>
      <td height="30" colspan="8" >วันที่(Date) :  <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_date']; ?></font> </u></td>
      </tr>
    <tr>
      <td height="30" colspan="21" scope="row">บริษัท (Company) : <U> <font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_permit_to']; ?> </font>  </u>  </td>
      <td height="30" colspan="9" >จำนวน (No of worker) : <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_no_of_work']; ?> </font>  </u>     <label>
          
      คน(Prs.) </label></td>
      </tr>
    <tr>
      <td height="30" colspan="30" scope="row">ขออนุญาตเพื่อ (Permit to) :  <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_permit_to']; ?></font> </u> </td>
      </tr>
    <tr>
      <td height="30" colspan="7" scope="row">ประเภทงาน (Type of work) :  </td>
      <td height="30" colspan="23" scope="row"> <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_hot_work']; ?> </font> </u><p>  <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_high_work']; ?> </font> </u> <p> <u> <font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_space_work']; ?> </font> </u> <p> <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_elec_work']; ?> </font> </u> <p> <u> <font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_chemical_work']; ?>  </font> </u><p>  <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_anouther_work']; ?> </font> </u>  <u> <font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_anouther_detail']; ?>  </font> </u> <p> <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_support_work']; ?></font> </u> </td>
      </tr>
    <tr>
      <td height="30" colspan="30" scope="row">ลักษณะงาน/รายละเอียด (Description/Detail) :  <u> <font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_detail']; ?> </font> </u> </td>
      </tr>
    <tr>
      <td height="30" colspan="16" scope="row">เข้ามาปฏิบัติงานในพื้นที่ตั้งแต่วันที่ (Start in date from) :  <u>  <font color="#0000FF"> <?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_start_date'])); ?> </font> </u>  </td>
      <td height="30" colspan="14" >ถึงวันที่ (To) :<u><font color="#0000FF"> <?php echo date("d-m-Y", strtotime ( $row_Recordset1['permit_sheet_end_date'])); ?></font></u> </td>
      </tr>
    <tr>
      <td height="30" colspan="10" scope="row">ช่วงเวลาตั้งแต่ (Period from) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_start_time']; ?></font> </u></td>
      <td height="30" colspan="6" >ถึง (To) : <U><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet__end_time']; ?> </font></U></td>
      <td height="30" colspan="14" >ในพื้นที่ (Area of): <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_area_of']; ?></font></u></td>
      </tr>
    <tr>
      <td height="30" colspan="20" scope="row">โดยมีหัวหน้างาน/ผู้ควบคุมงานชื่อ (Chief/foreman is) :  <U><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_chief']; ?> </font> </td>
      <td height="30" colspan="10" >เบอร์โทรศัพท์(Telephone NO.) : <U><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_telephone_no']; ?></font></U></td>
      </tr>
    <tr>
      <td height="30" colspan="30" scope="row">สารเคมีที่ใช้ (Chemical substancs) :
        <label> <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_chemical']; ?> </font></u></label></td>
      </tr>
    <tr>
      <td height="30" colspan="30" scope="row">ของเสียจากการปฏิบัติงาน (Waste from work ) :
      <label>  <U><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_waste_form_work']; ?> </font> </U>  </label></td>
      </tr>
    <tr>
      <td height="30" colspan="30" scope="row"><strong>เจ้าหน้าที่บริษัทฯ/ผู้รับผิดชอบผู้รับเหมา In chargr/Responsibility person</strong></td>
      </tr>
    <tr>
      <td height="30" colspan="15" scope="row">ชื่อ (Name) :  <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_incharge_name']; ?></font> </u></td>
      <td height="30" colspan="15" > ฝ่าย (Dept.) :  <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_inchange_dept']; ?> </font> </u> </td>
      </tr>
    <tr>
      <td height="30" colspan="15" scope="row">หน่วยงาน/แผนก (Section/Div.) : <U> <font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_incharge_section']; ?> </font> </U> </td>
      <td height="30" colspan="15" > E-mail :  <U> <font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_incharge_email']; ?> </font> </U> </td>
      </tr>
    <tr>
      <td height="30" colspan="24" scope="row"><strong>ผู้รับเหมา (Contractor chief)</strong></td>
      <td colspan="6" rowspan="4" scope="row"><table width="209" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td height="37" bgcolor="#A0A0A4" align="center">Contractor chief</td>
        </tr>
        <br />
        <tr>
          <td height="114"></td>
        </tr>
      </table></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row">ชื่อ (Name) : <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_contractor_chief_name']; ?></font></u> <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_contractor_chief_surname']; ?></font></u></td>
      <td height="30" colspan="12" >ตำแหน่ง (Position) : <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_contractor_chief__position']; ?></font></u></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row">บริษัท (Company) : <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_contractor_chief_company']; ?></font></u></td>
      <td height="30" colspan="12" ></td>
      </tr>
    <tr>
      <td colspan="24" scope="row"><div style="display: none"><label>
        <input name="permit_sheet_no_id" type="text" value="<?php echo $row_Recordset1['permit_sheet_no_id']; ?>"   />
        <input name="permit_sheet_incharge_email" type="text" id="textfield" value="<?php echo $row_Recordset1['permit_sheet_incharge_email']; ?>" />
        <input type="text" name="permit_sheet_ordinal" value="<?php echo $row_Recordset1['permit_sheet_ordinal']; ?>"   />
        <input name="permit_sheet_incharge_name" type="text" value="<?php echo $row_Recordset1['permit_sheet_incharge_name']; ?>"  />
      </label></div>เรียกดู เอกสารเพิ่มเติมประกอบเอกสารขออนุญาต <a href="additional_files.php?Filesordinal=<?php echo $row_Recordset1['permit_sheet_ordinal']; ?>">( Additional documents) </a></td>
    </tr>
    <tr>
      <td height="30" colspan="30" scope="row">กรณีที่มีการตัดต่อกระเเสไฟฟ้าหรือระบบพลังงาน ได้มีการแจ้งให้แผนก PM ทราบ และดำเนินการแล้ว<br />
In case of cut off or connect the power supply or electricity system , contracotor should infrom to PM to take an action.</td>
      </tr>
    <tr>
      <td height="30" colspan="24" scope="row"><strong>เจ้าหน้าที่แผนก PM</strong></td>
      <td colspan="6" rowspan="5" ><table width="209" border="1" cellpadding="0" cellspacing="0">
        <tr></tr>
        <tr>
          <td height="37" bgcolor="#A0A0A4" align="center">PM staff</td>
        </tr>
        <br />
        <tr>
          <td   height="114" align="center" class="signature"><?php echo $row_Recordset1['permit_sheet_pm_staff_sig']; ?></td>
        </tr>
      </table></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row">ชื่อ (Name) :
        <input name="permit_sheet_pm_staff_name" type="text"  value="<?php echo $row_Recordset1['permit_sheet_pm_staff_name']; ?>" size="40" maxlength="60" readonly="readonly" /></td>
      <td height="30" colspan="12" >หน่วยงาน/แผนก (Section/Div) :
        <label>
          <input name="permit_sheet_pm_staff_section" type="text"   value="<?php echo $row_Recordset1['permit_sheet_pm_staff_section']; ?>" size="25" maxlength="50" readonly="readonly" />
        </label></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row">ฝ่าย (Dept.) :
        <input name="permit_sheet_pm_staff_dept" type="text"   value="<?php echo $row_Recordset1['permit_sheet_pm_staff_dept']; ?>" size="40" maxlength="50" readonly="readonly" /></td>
      <td height="30" colspan="12" >E-mail :
        <input name="permit_sheet_pm_staff_email" type="text"  value="<?php echo $row_Recordset1['permit_sheet_pm_staff_email']; ?>" size="35" maxlength="50" readonly="readonly" /></td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td colspan="22" rowspan="3"  align="center">&nbsp;</td>
      <td width="28" height="30" ></td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" ></td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" ></td>
      <td width="32" height="30" ></td>
      <td width="32" height="30" ></td>
      <td width="32" height="30" ></td>
      <td width="32" height="30" ></td>
      <td width="32" height="30" ></td>
      <td width="32" height="30" ></td>
    </tr>
    <tr>
      <td height="30" colspan="24" scope="row" bgcolor="#FFFF00" ><strong>เจ้าของพื้นที่ปฏิบัติงาน (Area owner)</strong></td>
      <td colspan="6" rowspan="5" ><table width="209" height="154" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td  height="37" bgcolor="#A0A0A4" align="center">Area owner</td>
        </tr>
        <tr>
<td  height="112"></td>
        </tr>
      </table></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row" bgcolor="#FFFF00"  >ชื่อ (Name) :
        <input name="permit_sheet_area_owner_name" type="text" value="<?php echo $row_Recordset1['permit_sheet_area_owner_name']; ?>"  size="40" maxlength="60" readonly="readonly" /></td>
      <td height="30" colspan="12" bgcolor="#FFFF00"  >หน่วยงาน/แผนก (Section/Div) :
        <label>
<input name="permit_sheet_area_owner_section" type="text" value="<?php echo $row_Recordset1['permit_sheet_area_owner_section']; ?>"   size="25" maxlength="50" readonly="readonly" />
        </label></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row" bgcolor="#FFFF00"  >ฝ่าย (Dept.) :
        <input name="permit_sheet_area_owner_dept" type="text"   value="<?php echo $row_Recordset1['permit_sheet_area_owner_dept']; ?>" size="40" maxlength="50" readonly="readonly" /></td>
      <td height="30" colspan="12" bgcolor="#FFFF00"  >E-mail :
        <input name="permit_sheet_area_owner_email" type="text"  value="<?php echo $row_Recordset1['permit_sheet_area_owner_email']; ?>" size="35" maxlength="50" readonly="readonly" /></td>
      </tr>
    <tr>
      <td scope="row" height="30" bgcolor="#FFFF00"  ></td>
      <td colspan="22" rowspan="3" align="center" bgcolor="#FFFF00"  ><input type="radio" name="permit_sheet_area_owner_answer" value="accept" />
Accept
  <input type="radio" name="permit_sheet_area_owner_answer" value="decline" />
Decline
<div id="areaowner" style="display: none" > Please insert your comment.
  <input type="textbox" name="areaowner"   />
</div>
<br />
<input name="input2" type="submit" value="Send submit" />
<label>
  <input name="permit_sheet_area_owner_sig" type="text" value="<?php echo $objResult["Username"];?>" readonly="readonly"  style="display: none"  />
</label></td>
      <td height="30" bgcolor="#FFFF00" ></td>
      </tr>
    <tr>
      <td scope="row" height="30" bgcolor="#FFFF00"  ></td>
      <td height="30"bgcolor="#FFFF00"   ></td>
      </tr>
    <tr>
      <td scope="row" height="30"bgcolor="#FFFF00"  ></td>
      <td height="30"bgcolor="#FFFF00"  ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
    </tr>
    <tr>
      <td height="30" colspan="24" scope="row"><strong>หัวหน้าแผนก (Manager Approved)</strong></td>
      <td colspan="6" rowspan="5" ><table width="209" height="157" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td   height="37" align="center" bgcolor="#A0A0A4">Manager Approved</td>
        </tr>
        <tr>
          <td  height="115">&nbsp;</td>
        </tr>
      </table></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row">ชื่อ (Name) :
        <input name="permit_sheet_manager_approved__name" type="text"   value="<?php echo $row_Recordset1['permit_sheet_manager_approved__name']; ?>" size="40" maxlength="60" readonly="readonly" /></td>
      <td height="30" colspan="12" >หน่วยงาน/แผนก (Section/Div) :
        <label>
          <input name="permit_sheet_manager_approved_section" type="text"   value="<?php echo $row_Recordset1['permit_sheet_manager_approved_section']; ?>" size="25" maxlength="50" readonly="readonly" />
        </label></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row">ฝ่าย (Dept.) :
        <input name="permit_sheet_manager_approved__dept" type="text"   value="<?php echo $row_Recordset1['permit_sheet_manager_approved__dept']; ?>" size="40" maxlength="50" readonly="readonly" /></td>
      <td height="30" colspan="12" >E-mail :
        <input name="permit_sheet_manager_approved_email" type="text"   value="<?php echo $row_Recordset1['permit_sheet_manager_approved_email']; ?>" size="35" maxlength="50" readonly="readonly" /></td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td colspan="22" rowspan="3" align="center" > <input name="manager_approved_status" type="text" value="<?php echo $row_Recordset1['permit_sheet_manager_approved_status']; ?>"   size="14" maxlength="14" readonly="readonly" style="display: none" /></td>
      <td height="30" ></td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" ></td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
    </tr>
    <tr>
      <td height="30" colspan="24" scope="row"><strong>เจ้าหน้าที่ฝ่ายรักษาความปลอดภัย (SOH Div.)</strong></td>
      <td colspan="6" rowspan="5" ><table width="209" height="158" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td  height="37" bgcolor="#A0A0A4" align="center">SOH Div.</td>
        </tr>
        <tr>
          <td   height="115">&nbsp;</td>
        </tr>
      </table></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row">ชื่อ (Name) :
        <input name="permit_sheet_soh_div_name" type="text"   value="<?php echo $row_Recordset1['permit_sheet_soh_div_name']; ?>" size="40" maxlength="60" readonly="readonly" /></td>
      <td height="30" colspan="12" >หน่วยงาน/แผนก (Section/Div) :
        <label>
          <input name="permit_sheet_soh_div_section" type="text"   value="<?php echo $row_Recordset1['permit_sheet_soh_div_section']; ?>" size="25" maxlength="50" readonly="readonly" />
        </label></td>
      </tr>
    <tr>
      <td height="30" colspan="12" scope="row">ฝ่าย (Dept.) :
        <input name="permit_sheet_soh_div_dept" type="text"   value="<?php echo $row_Recordset1['permit_sheet_soh_div_dept']; ?>" size="40" maxlength="50" readonly="readonly" /></td>
      <td height="30" colspan="12" >E-mail :
        <input name="permit_sheet_soh_div_email" type="text"   value="<?php echo $row_Recordset1['permit_sheet_soh_div_email']; ?>" size="35" maxlength="50" readonly="readonly" /></td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="28"  align="center"></td>
      <td width="29"  align="center"></td>
      <td width="28"  align="center"></td>
      <td height="30" ></td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td height="30" ></td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td  align="center"></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
    </tr>
    <tr>
      <td height="30" colspan="3" scope="row">หมายเหตุ :</td>
      <td height="30" colspan="27" >กรณีตรวจพบว่าผู้รับเหมาไม่ปฏิบัติงานตามกฏความปลอดภัย หรือไม่ได้มีการเตรียมการป้องกันการเกิดอัคคีภัย อุบัติเหตุ </td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" colspan="27" >หรืออันตรายที่อาจเกิดขึ้นจากการปฏิบัติงาน บริษัทฯ จะไม่อนุญาตให้ปฏิบัติงานดังกล่าวจนกว่าจะมีการแก้ไขให้ปลอดภัย</td>
      </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td colspan="12" rowspan="2" ><table width="409" height="52" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="170" height="40" align="center" bgcolor="#A0A0A4"><p>วันที่ออกใบอนุญาต<br />
            Issued date </p></td>
          <td width="233" align="center"><input   name="permit_sheet_issued_date" id="permit_sheet_issued_date" type="text" value="" readonly="readonly"/></td>
        </tr>
      </table></td>
      <td colspan="12" rowspan="2" ><table width="409" height="49" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="170" height="40" align="center" bgcolor="#A0A0A4"><p>วันที่ใบอนุญาติหมดอายุ<br />
            Expired date </p></td>
          <td width="233" align="center"><input  name="permit_sheet_expined_date" id="permit_sheet_expined_date" type="text" value="" readonly="readonly" /></td>
        </tr>
      </table></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
    </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
    </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" colspan="26" rowspan="3" align="center" >&nbsp;</td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
    </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
    </tr>
    <tr>
      <td scope="row" height="30"></td>
      <td height="30" ></td>
      <td height="30" ></td>
      <td height="30" ></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
