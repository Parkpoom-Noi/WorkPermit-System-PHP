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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE permit_sheet SET permit_sheet_area_owner_email=%s, permit_sheet_area_owner_sig=%s, permit_sheet_pm_staff_name=%s, permit_sheet_pm_staff_email=%s, permit_sheet_pm_staff_sig=%s, permit_sheet_manager_approved_email=%s, permit_sheet_manager_approved__sig=%s, permit_sheet_soh_div_email=%s, permit_sheet_soh_div_sig=%s WHERE permit_sheet_no_id=%s",
                       GetSQLValueString($_POST['permit_sheet_area_owner_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_sig'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_name'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_pm_staff_sig'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_manager_approved__sig'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_email'], "text"),
                       GetSQLValueString($_POST['permit_sheet_soh_div_sig'], "text"),
                       GetSQLValueString($_POST['permit_sheet_no_id'], "int"));

  mysql_select_db($database_workpermit, $workpermit);
  $Result1 = mysql_query($updateSQL, $workpermit) or die(mysql_error());



if( $_POST ["permit_sheet_pm_staff_name"] == '' )
	{
	  if( $_POST ["permit_sheet_area_owner_sig"] == '' )
		{
	 		ini_set("SMTP","170.95.36.198");

					$strTo = $_POST['permit_sheet_area_owner_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: Work permit System \r\n Please Do Noy Reply This E-mail ";
					$strMessage = nl2br( "<h3>To : Area owner </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n
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
	else if( $_POST ["permit_sheet_manager_approved__sig"] == '' )
		{
	 		ini_set("SMTP","170.95.36.198");

					$strTo = $_POST['permit_sheet_manager_approved_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: Work permit System \r\n Please Do Noy Reply This E-mail ";
					$strMessage = nl2br( "<h3>To : Manager Approved </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n
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
	else if ( $_POST ["permit_sheet_soh_div_sig"] == '' )
		{
	 		ini_set("SMTP","170.95.36.198");

					$strTo = $_POST['permit_sheet_soh_div_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: Work permit System \r\n Please Do Noy Reply This E-mail ";
					$strMessage = nl2br( "<h3>To : SOH Div. </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n
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
		if( $_POST ["permit_sheet_pm_staff_sig"] == '' )
		{
	 			ini_set("SMTP","170.95.36.198");

					$strTo = $_POST['permit_sheet_pm_staff_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: Work permit System \r\n Please Do Noy Reply This E-mail ";
					$strMessage = nl2br( "<h3>To : PM Staff </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n
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
		 if( $_POST ["permit_sheet_area_owner_sig"] == '' )
		{
	 			ini_set("SMTP","170.95.36.198");

					$strTo = $_POST['permit_sheet_area_owner_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: Work permit System \r\n Please Do Noy Reply This E-mail ";
					$strMessage = nl2br( "<h3>To : Area owner </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n
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
	if( $_POST ["permit_sheet_manager_approved__sig"] == '' )
		{
	 			ini_set("SMTP","170.95.36.198");

					$strTo = $_POST['permit_sheet_manager_approved_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: Work permit System \r\n Please Do Noy Reply This E-mail ";
					$strMessage = nl2br( "<h3>To : Manager Approved </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n
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
	if ( $_POST ["permit_sheet_soh_div_sig"] == '' )
		{
	 			ini_set("SMTP","170.95.36.198");

					$strTo = $_POST['permit_sheet_soh_div_email'] ; 
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: Work permit System \r\n Please Do Noy Reply This E-mail ";
					$strMessage = nl2br( "<h3>To : SOH Div. </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n
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
<title>Workpermit No.<?php echo $row_Recordset1['permit_sheet_no_id']; ?>  </title>
<style type="text/css">
<!--
.italic {
	font-style: italic;
	font-size: 36px;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
 

</head>
<body>
<div align="center">
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="976" height="1400" border="0" align="center"  >
    <tr>
      <th height="35" colspan="29" scope="col" align="left" ><h3> Hitachi chemical Automotive Products (Thailand) Co.,Ltd.</h3></th>
    </tr>
    <tr>
      <td width="29" height="25" > </td>
      <td height="25" colspan="18" ><strong>เอกสารขออนุญาตเข้าปฏิบัติงานของผู้รับเหมาหรือบุคคลภายนอก (Permit to Work)</strong>                   </td>
      <td height="25" colspan="10" > <strong>เลขที่ (Permit No.) :</strong><u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_no_id']; ?> 
        <label>
          <input type="text" name="permit_sheet_no_id" id="permit_sheet_no_id"  value="<?php echo $row_Recordset1['permit_sheet_no_id']; ?>" style="display: none" />
        </label>
      </font></u></td>
    </tr>
    <tr>
      <td height="25" colspan="21" ><strong><U>ผู้รับเหมา/บุคคลภายนอก (Contrator/Outsouce)</U></strong></td>
      <td height="25" colspan="8" >วันที่(Date) : <u><font color="#0000FF">   <?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_date'])); ?></font> </u></td>
    </tr>
    <tr>
      <td height="25" colspan="19" >บริษัท (Company) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_company']; ?> </font> </u></td>
      <td height="25" colspan="10" >จำนวน (No of worker) : <u><font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_no_of_work']; ?></font> </u>
        <label>
          
      คน(Prs.) </label> </td>
    </tr>
    <tr>
      <td height="25" colspan="29" >ขออนุญาตเพื่อ (Permit to) :  <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_permit_to']; ?> </font> </u> </td>
    </tr>
    <tr>
      <td height="25" colspan="6" >ประเภทงาน (Type of work) :  </td>
      <td height="25" colspan="23" > <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_hot_work']; ?> </font> </u><p>  <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_high_work']; ?> </font> </u> <p> <u> <font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_space_work']; ?> </font> </u> <p> <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_elec_work']; ?> </font> </u> <p> <u> <font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_chemical_work']; ?>  </font> </u><p>  <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_anouther_work']; ?> </font> </u>  <u> <font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_anouther_detail']; ?>  </font> </u> <p> <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_support_work']; ?></font> </u>  </td>
    </tr>
    <tr>
      <td height="25" colspan="29" >ลักษณะงาน/รายละเอียด (Description/Detail):  <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_detail']; ?> </font> </u></td>
    </tr>
    <tr>
      <td height="25" colspan="14" >เข้ามาปฏิบัติงานในพื้นที่ตั้งแต่วันที่ (Start in date from) :  <u>  <font color="#0000FF"> <?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_start_date'])); ?> </font> </u> </td>
      <td height="25" colspan="6" >ถึง (To) : <u><font color="#0000FF"> <?php echo date("d-m-Y", strtotime ( $row_Recordset1['permit_sheet_end_date'])); ?></font></u></td>
      <td height="25" colspan="9" ></td>
    </tr>
    <tr>
      <td height="25" colspan="9" >ช่วงเวลาตั้งแต่ (Period from) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_start_time']; ?>  </font></u></td>
      <td height="25" colspan="7" >ถึง (To) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet__end_time']; ?> </font></u></td>
      <td height="25" colspan="13" >ในพื้นที่ (Area of): <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_area_of']; ?> <?php echo $row_Recordset1['permit_sheet_area_other']; ?> </font></u></td>
    </tr>
    <tr>
      <td height="25" colspan="17" >โดยมีหัวหน้างาน/ผู้ควบคุมงานชื่อ (Chief/foreman is) :  <U><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_chief']; ?>  </font></U></td>
      <td height="25" colspan="12" > เบอร์โทรศัพท์ (Telephone NO.) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_telephone_no']; ?></font></u></td>
    </tr>
    <tr>
      <td height="25" colspan="29" >สารเคมีที่ใช้ (Chemical substancs) :
      <label>  <u><font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_chemical']; ?> </font> </u> </label></td>
    </tr>
    <tr>
      <td height="25" colspan="29" >ของเสียจากการปฏิบัติงาน (Waste from work ) :
      <label>  <U><font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_waste_form_work']; ?> </font></U>  </label></td>
    </tr>
    <tr>
      <td height="25" colspan="29" ><u><strong>เจ้าหน้าที่บริษัทฯ/ผู้รับผิดชอบผู้รับเหมา In charge/Responsibility person </strong></u></td>
    </tr>
    <tr>
      <td height="25" colspan="15" >ชื่อ (Name) :  <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_incharge_name']; ?> </font></u></td>
      <td height="25" colspan="14" >ฝ่าย (Dept.) : <u> <font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_inchange_dept']; ?> </font></u></td>
    </tr>
    <tr>
      <td height="25" colspan="15" >หน่วยงาน/แผนก (Section/Div.) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_incharge_section']; ?> </font></u></td>
      <td height="25" colspan="14" >E-mail :  <u><font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_incharge_email']; ?> </font></u></td>
      </tr>
    <tr>
      <td height="25" colspan="29" ><u><strong>ผู้รับเหมา (Contractor chief) </strong></u></td>
    </tr>
    <tr>
      <td height="25" colspan="15" >ชื่อ (Name) : <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_contractor_chief_name']; ?> &nbsp; &nbsp; <?php echo $row_Recordset1['permit_sheet_contractor_chief_surname']; ?></font></u></td>
      <td height="25" colspan="14" >บริษัท (Company) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_contractor_chief_company']; ?> </font></u> </td>
    </tr>
    <tr>
      <td height="25" colspan="29" > ตำแหน่ง (Position) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_contractor_chief__position']; ?> </font></u></td>
    </tr>
    <tr>
      <td height="47" colspan="29"  >กรณีที่มีการตัดต่อกระเเสไฟฟ้าหรือระบบพลังงาน ได้มีการแจ้งให้แผนก PM ทราบ และดำเนินการแล้ว <br />In case of cut off or connect the power supply or electricity system , contracotor should infrom to PM to take an action.</td>
    </tr>
    <tr>
      <td height="25" colspan="29" ><u><strong>เจ้าหน้าที่แผนก PM (PM Staff)</strong></u></td>
    </tr>
    <tr>
      <td height="25" colspan="15" >ชื่อ (Name) : <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_pm_staff_name']; ?> 
        <input type="text" name="permit_sheet_pm_staff_name" id="permit_sheet_pm_staff_name" value="<?php echo $row_Recordset1['permit_sheet_pm_staff_name']; ?>" style="display: none" />
      </font></u></td>
      <td height="25" colspan="14" >ฝ่าย (Dept.) : <u><font color="#0000FF"><?php echo $row_Recordset1['permit_sheet_pm_staff_dept']; ?></font></u></td>
    </tr>
    <tr>
      <td height="25" colspan="15" >หน่วยงาน/แผนก (Section/Div) : <u><font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_pm_staff_section']; ?></font></u></td>
      <td height="25" colspan="14" >E-mail :  <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_pm_staff_email']; ?>
        <label></label>
        
      </font></u><input type="text" name="permit_sheet_pm_staff_email" id="permit_sheet_pm_staff_email"  value="<?php echo $row_Recordset1['permit_sheet_pm_staff_email']; ?>" style="display: none" /></td>
      </tr>
    <tr>
      <td height="25" colspan="29" ><u><strong>เจ้าของพื้นที่ปฏิบัติงาน (Area owner)</strong></u></td>
    </tr>
    <tr>
      <td height="25" colspan="15" >ชื่อ (Name) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_area_owner_name']; ?> </font></u> </td>
      <td height="25" colspan="14" >ฝ่าย (Dept.) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_area_owner_dept']; ?> </font></u> </td>
    </tr>
    <tr>
      <td height="25" colspan="15" >หน่วยงาน/แผนก (Section/Div) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_area_owner_section']; ?> </font></u> </td>
      <td height="25" colspan="14" >E-mail :  <u><font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_area_owner_email']; ?> 
        
      </font></u><input type="text" name="permit_sheet_area_owner_email" id="permit_sheet_area_owner_email"  value="<?php echo $row_Recordset1['permit_sheet_area_owner_email']; ?>" style="display: none" /></td>
      </tr>
    <tr>
      <td height="25" colspan="29" ><u><strong>หัวหน้าแผนก (Manager Approved)</strong></u></td>
    </tr>
    <tr>
      <td height="25" colspan="15" >ชื่อ (Name) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_manager_approved__name']; ?> </font></u> </td>
      <td height="25" colspan="14" >ฝ่าย (Dept.) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_manager_approved__dept']; ?> </font></u> </td>
    </tr>
    <tr>
      <td height="25" colspan="15" >หน่วยงาน/แผนก (Section/Div) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_manager_approved_section']; ?> </font></u> </td>
      <td height="25" colspan="14" >E-mail :  <u><font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_manager_approved_email']; ?> 
       
      </font></u>  <input type="text" name="permit_sheet_manager_approved_email" id="permit_sheet_manager_approved_email" value="<?php echo $row_Recordset1['permit_sheet_manager_approved_email'];?>" style="display: none" />  </td>
      </tr>
    <tr>
      <td height="25" colspan="29" ><u><strong>เจ้าหน้าที่ฝ่ายรักษาความปลอดภัย (SOH Div.)</strong></u></td>
    </tr>
    <tr>
      <td height="25" colspan="15" >ชื่อ (Name) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_soh_div_name']; ?> </font></u> </td>
      <td height="25" colspan="14" >ฝ่าย (Dept.) : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_soh_div_dept']; ?> </font></u> </td>
    </tr>
    <tr>
      <td height="25" colspan="15" >หน่วยงาน/แผนก (Section/Div)  : <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_soh_div_section']; ?> </font></u> </td>
      <td height="25" colspan="14" >E-mail : <u><font color="#0000FF">  <?php echo $row_Recordset1['permit_sheet_soh_div_email']; ?> 
        
      </font></u> <input type="text" name="permit_sheet_soh_div_email" id="permit_sheet_soh_div_email" value="<?php echo $row_Recordset1['permit_sheet_soh_div_email']; ?>" style="display: none" /> </td>
      </tr>
    <tr>
      <td height="155" colspan="6" ><table width="190" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="196" height="37" align="center" bgcolor="#808080"><strong>Contractor chief</strong></td>
        </tr>
        <br />
        <tr>
          <td height="114" align="center" class="italic"    ><?php echo $row_Recordset1['permit_sheet_contractor_chief_name']; ?></td>
        </tr>
      </table>                              </td>
      <td colspan="6" ><table width="190" border="1" cellpadding="0" cellspacing="0">
        <tr></tr>
        <tr>
          <td height="37" bgcolor="#808080" align="center"><strong>PM staff</strong></td>
        </tr>
        <br />
        <tr>
          <td   height="114" align="center" class="italic"  ><?php echo $row_Recordset1['permit_sheet_pm_staff_sig']; ?></td>
        </tr>
      </table>                              </td>
      <td colspan="6" ><table width="190" border="1" cellpadding="0" cellspacing="0">
        <tr></tr>
        <tr>
          <td height="37" bgcolor="#808080" align="center"><strong>Area owner</strong></td>
        </tr>
        <br />
        <tr>
          <td   height="114" align="center" class="italic"   ><?php echo $row_Recordset1['permit_sheet_area_owner_sig']; ?></td>
        </tr>
      </table>                              </td>
      <td colspan="6" ><table width="190" border="1" cellpadding="0" cellspacing="0">
        <tr></tr>
        <tr>
          <td height="37" bgcolor="#808080" align="center"><strong>Manager Approved</strong></td>
        </tr>
        <br />
        <tr>
          <td   height="114"align="center" class="italic"    ><?php echo $row_Recordset1['permit_sheet_manager_approved__sig']; ?></td>
        </tr>
      </table>                              </td>
      <td colspan="5" ><table width="190" border="1" cellpadding="0" cellspacing="0">
        <tr></tr>
        <tr>
          <td height="37" bgcolor="#808080" align="center"><strong>SOH Div.</strong></td>
        </tr>
        <br />
        <tr>
          <td   height="114 "  align="center" class="italic"   ><?php echo $row_Recordset1['permit_sheet_soh_div_sig']; ?></td>
        </tr>
      </table>                         </td>
    </tr>
    <tr>
      <td height="25" colspan="3" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หมายเหตุ :   </td>
      <td height="25" colspan="26" >กรณีตรวจพบว่าผู้รับเหมาไม่ปฏิบัติงานตามกฏความปลอดภัย หรือไม่ได้มีการเตรียมการป้องกันการเกิดอัคคีภัย อุบัติเหตุ หรืออันตราย                          
        <label>
          <input type="text" name="permit_sheet_pm_staff_sig" id="permit_sheet_pm_staff_sig" value="<?php echo $row_Recordset1['permit_sheet_pm_staff_sig']; ?>" style="display: none" />

          <input type="text" name="permit_sheet_area_owner_sig" id="permit_sheet_area_owner_sig" value="<?php echo $row_Recordset1['permit_sheet_area_owner_sig']; ?>" style="display: none" />

          <input type="text" name="permit_sheet_manager_approved__sig" id="permit_sheet_manager_approved__sig" value="<?php echo $row_Recordset1['permit_sheet_manager_approved__sig']; ?>" style="display: none" />

          <input type="text" name="permit_sheet_soh_div_sig" id="permit_sheet_soh_div_sig"  value="<?php echo $row_Recordset1['permit_sheet_soh_div_sig']; ?>" style="display: none" />
        </label></td>
    </tr>
    <tr>
      <td width="29" height="25" ></td>
      <td width="29" height="25" ></td>
      <td width="29" height="25" ></td>
      <td height="25" colspan="26" >ที่อาจเกิดขึ้นจากการปฏิบัติงาน บริษัทฯ จะไม่อนุญาตให้ปฏิบัติงานดังกล่าวจนกว่าจะมีการแก้ไขให้ปลอดภัย                          </td>
    </tr>
    <tr>
      <td colspan="4" rowspan="3" ></td>
      <td colspan="11" rowspan="3" >
      <div>
      <table width="344" height="54" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="170" height="52" align="center" bgcolor="#808080"><p>วันที่ออกใบอนุญาต<br />
            Issued date </p></td>
          <td width="168" height="50" align="center">
          <div align="center"> <label>
            <input name="textfield" type="text" id="textfield" value="<?php  echo date("d-m-Y", strtotime ( $row_Recordset1['permit_sheet_issued_date'])); ?>" size="11" maxlength="11" readonly="readonly" />
          </label>
          </div>
          </td>
          </tr>
          
      </table>
      </div>                                 </td>
      <td width="35" height="25" ></td>
      <td colspan="10" rowspan="3" >
      <div>
      <table width="344" height="54" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="170" height="50" align="center" bgcolor="#808080"><p>วันที่ใบอนุญาตหมดอายุ<br />
Expired date </p></td>
          <td width="168" align="center">
            <div align="center"> <label> <input name="textfield2" type="text" id="textfield2" value="<?php  echo date("d-m-Y", strtotime ( $row_Recordset1['permit_sheet_expined_date'])); ?>" size="11" maxlength="11" readonly="readonly" />
          </label> </div> </td>
        </tr>
      </table>    
      </div>                          </td>
      <td colspan="2" rowspan="3" ></td>
      <td width="1" rowspan="5" ></td>
    </tr>
    <tr>
      <td width="35" height="25" ></td>
    </tr>
    <tr>
      <td width="35" height="21" ></td>
    </tr>
    <tr>
      <td height="21" ></td>

      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" ></td>
      <td height="21" colspan="12" ><label>
        <input type="button" name="button" id="button" value="Print Report Workpermit" onclick="MM_goToURL('parent','print_report_workpermit.php?permit_sheet_no_id=<?php echo $row_Recordset1['permit_sheet_no_id']; ?>');return document.MM_returnValue"   >
        <input type="submit" name="button2" id="button2" value="Alert Workpermit"  />
      </label></td>
      </tr>
    <tr>
      <td width="29" height="21" ></td>
      <td width="29" height="21" ></td>
      <td width="29" height="21" ></td>
      <td width="29" height="21" ></td>
      <td width="29" height="21" ></td>
      <td width="25" height="21" ></td>
      <td width="28" height="21" ></td>
      <td width="28" height="21" ></td>
      <td width="28" height="21" ></td>
      <td width="30" height="21" ></td>
      <td width="30" height="21" ></td>
      <td width="26" height="21" ></td>
      <td width="31" height="21" ></td>
      <td width="31" height="21" ></td>
      <td width="37" height="21" ></td>
      <td width="35" height="21" ></td>
      <td width="37" height="21" ></td>
      <td width="3" height="21" ></td>
      <td width="77" height="21" ></td>
      <td width="27" height="21" ></td>
      <td width="22" height="21" ></td>
      <td width="22" height="21" ></td>
      <td width="22" height="21" > </td>
      <td width="3" height="21" ></td>
      <td width="76" height="21" ></td>
      <td width="38" height="21" ></td>
      <td width="38" height="21" ></td>
      <td width="21" height="21" ></td>
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
