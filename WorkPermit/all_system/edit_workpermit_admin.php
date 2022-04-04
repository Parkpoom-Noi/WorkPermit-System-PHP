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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "frmMain")) {
  $updateSQL = sprintf("UPDATE permit_sheet SET permit_sheet_company=%s, permit_sheet_date=%s, permit_sheet_permit_to=%s, permit_sheet_no_of_work=%s, permit_sheet_hot_work=%s, permit_sheet_high_work=%s, permit_sheet_space_work=%s, permit_sheet_elec_work=%s, permit_sheet_chemical_work=%s, permit_sheet_anouther_work=%s, permit_sheet_anouther_detail=%s, permit_sheet_support_work=%s, permit_sheet_detail=%s, permit_sheet_start_date=%s, permit_sheet_end_date=%s, permit_sheet_start_time=%s, permit_sheet__end_time=%s, permit_sheet_area_of=%s, permit_sheet_chief=%s, permit_sheet_telephone_no=%s, permit_sheet_chemical=%s, permit_sheet_waste_form_work=%s, permit_sheet_ordinal=%s, permit_sheet_incharge_name=%s, permit_sheet_inchange_dept=%s, permit_sheet_incharge_section=%s, permit_sheet_incharge_email=%s, permit_sheet_area_owner_name=%s, permit_sheet_area_owner_dept=%s, permit_sheet_area_owner_section=%s, permit_sheet_area_owner_email=%s, permit_sheet_pm_staff_name=%s, permit_sheet_pm_staff_dept=%s, permit_sheet_pm_staff_section=%s, permit_sheet_pm_staff_email=%s, permit_sheet_manager_approved__name=%s, permit_sheet_manager_approved__dept=%s, permit_sheet_manager_approved_section=%s, permit_sheet_manager_approved_email=%s, permit_sheet_soh_div_name=%s, permit_sheet_soh_div_dept=%s, permit_sheet_soh_div_section=%s, permit_sheet_soh_div_email=%s WHERE permit_sheet_no_id=%s",
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
                       GetSQLValueString($_POST['permit_sheet_area_owner_dept'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_section'], "text"),
                       GetSQLValueString($_POST['permit_sheet_area_owner_email'], "text"),
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


	for($i=0;$i<count($_FILES["filUpload"]["name"]);$i++)
	{
		if($_FILES["filUpload"]["name"][$i] != "")
		{
			if(move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i],"files_upload/".$_POST['permit_sheet_ordinal'].$_FILES["filUpload"]["name"][$i]))
			{
 
				$strSQL = "INSERT INTO files ";
				$strSQL .="(Filesordinal,FilesName) VALUES ('" .$_POST['permit_sheet_ordinal']."','".$_POST['permit_sheet_ordinal'].$_FILES["filUpload"]["name"][$i]."')";
				$objQuery = mysql_query($strSQL);
			}
		}
	}
	
	
if( $_POST ["permit_sheet_elec_work"] == '' )
	{
		
	if( $_POST ["permit_sheet_area_owner_status"] == 'M&AREA' )
	
	{
					if( $_POST ["permit_sheet_area_owner_status"] == 'M&AREA' ){
					ini_set("SMTP","170.95.36.198");

					$strTo = "poom_nura@hotmail.com";// $_POST['permit_sheet_area_owner_email'] ; 
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

					$strTo = "poom_nura@hotmail.com";// $_POST['permit_sheet_area_owner_email'] ; 
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

					$strTo = $_POST['permit_sheet_pm_staff_email']  ;
					$strSubject =  "Please Approved Work permit" ;
					$strHeader = "Content-type: text/html; charset=UTF-8\r\n"; 
					$strHeader .= "From: ".$_POST['permit_sheet_incharge_name']." < ".$_POST['permit_sheet_incharge_email']. ">\r\nReply-To:  " .$_POST['permit_sheet_incharge_email']. " ";
					$strMessage = nl2br( "<h3>To : ".$_POST['permit_sheet_pm_staff_name']." (PM Staff) </h3>
						\n 
						<u><b>
Request you to approve details in work permit. </b></u>   \n\n<b>Please login to approve or reject requirement on the following web pages.</b>\n\n<a href='http://localhost/WorkPermit/approved_pm.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."'>http://localhost/WorkPermit/approved_area.php?permit_sheet_ordinal=".$_POST['permit_sheet_ordinal']."</a>
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
<title>Edit Workpermit</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#chkAnother").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvAnother").show();
                } else {
                    $("#dvAnother").hide();
                }
            });
        });
		
		function generateRow() {
			var d=document.getElementById("div");
				d.innerHTML+='<p><div><input type="file" name="filUpload[]" /> </div>  ';
					}
					
 
    </script>
    
    
<script language="JavaScript">
	function pm_staffName(str_pm_staffName)
	{
			frmMain.permit_sheet_pm_staff_name.value = str_pm_staffName.split("|")[0];
			frmMain.permit_sheet_pm_staff_section.value = str_pm_staffName.split("|")[1];
			frmMain.permit_sheet_pm_staff_dept.value = str_pm_staffName.split("|")[2];
			frmMain.permit_sheet_pm_staff_email.value = str_pm_staffName.split("|")[3];
	}
	function area_ownerName(str_area_ownerName)
	{
			frmMain.permit_sheet_area_owner_status.value = str_area_ownerName.split("|")[0];
			frmMain.permit_sheet_area_owner_name.value = str_area_ownerName.split("|")[1];
			frmMain.permit_sheet_area_owner_section.value = str_area_ownerName.split("|")[2];
			frmMain.permit_sheet_area_owner_dept.value = str_area_ownerName.split("|")[3];
			frmMain.permit_sheet_area_owner_email.value = str_area_ownerName.split("|")[4];
	}
	function manager_approvedName(str_manager_approvedName)
	{
			frmMain.permit_sheet_manager_approved_status.value  = str_manager_approvedName.split("|")[0];
			frmMain.permit_sheet_manager_approved__name.value  = str_manager_approvedName.split("|")[1];
			frmMain.permit_sheet_manager_approved_section.value = str_manager_approvedName.split("|")[2];
			frmMain.permit_sheet_manager_approved__dept.value = str_manager_approvedName.split("|")[3];
			frmMain.permit_sheet_manager_approved_email.value = str_manager_approvedName.split("|")[4];
	}
	function soh_divName(str_soh_divName)
	{
			frmMain.permit_sheet_soh_div_name.value = str_soh_divName.split("|")[0];
			frmMain.permit_sheet_soh_div_section.value = str_soh_divName.split("|")[1];
			frmMain.permit_sheet_soh_div_dept.value = str_soh_divName.split("|")[2];
			frmMain.permit_sheet_soh_div_email.value = str_soh_divName.split("|")[3];
	}
</script>
 
 
 <link rel="stylesheet" media="all" type="text/css" href="../jquery/jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="../jquery/jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="../jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui.min.js"></script>

<script type="text/javascript" src="../jquery/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui-sliderAccess.js"></script>

<script type="text/javascript">


$(function(){

	var startDateTextBox = $('#permit_sheet_start_date');
	var endDateTextBox = $('#permit_sheet_end_date');
	var now = new Date();
	var afterDate =(now.getDate( ) + 3)+ "-" + (now.getMonth() + 1) + "-" + now.getFullYear()  ;
	
	
	startDateTextBox.datepicker({ 
		dateFormat: 'dd-mm-yy', minDate: afterDate,
		onClose: function(dateText, inst) {
			if (endDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					endDateTextBox.datetimepicker('setDate', testStartDate);
			}
			else {
				endDateTextBox.val(dateText);
			}
		},
		onSelect: function (selectedDateTime){
			endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
		}

	});
	endDateTextBox.datepicker({ 
		dateFormat: 'dd-mm-yy', 
		onClose: function(dateText, inst) {
			if (startDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					startDateTextBox.datetimepicker('setDate', testEndDate);
			}
			else {
				startDateTextBox.val(dateText);
			}
		},
		onSelect: function (selectedDateTime){
			startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
		}
	});

});



$(function(){
	$("#permit_sheet_start_time").timepicker({
		timeFormat: "HH:mm"
	});
});


$(function(){
	$("#permit_sheet__end_time").timepicker({
		timeFormat: "HH:mm"
	});
});





</script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />
</head>

<body >
<form action="<?php echo $editFormAction; ?>" method="POST" enctype="multipart/form-data"  name="frmMain"   >

 <table width="1022" border="0" align="center">
  <tr>
    <td colspan="30" height="30"> <strong>Hitachi chemical Automotive Products (Thailand) Co.,Ltd. </strong></td>
    </tr>
  <tr>
    <td colspan="20" height="30"><strong>เอกสารขออนุญาติเข้าปฏิบัติงานของผู้รับเหมาหรือบุคคลภายนอก (Permit to Work)</strong></td>
    <td colspan="10" height="30"><strong>เลขที่ (Permit No.) 
      <input name="permit_sheet_no_id" type="text" value="<?php echo $row_Recordset1['permit_sheet_no_id']; ?>" readonly="readonly"   />
    </strong></td>
    </tr>
  <tr>
    <td colspan="20" height="30" >ผู้รับเหมา/บุคคลภายนอก (Contrator/Outsouce)</td>
    <td colspan="10" height="30" >วันที่(Date)        <span id="sprytextfield3">
      <label>
        <input name="permit_sheet_date" type="text" value="<?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_date'])); ?>" readonly="readonly"/>
      </label>
      <span class="textfieldRequiredMsg">*</span></span></td>
    </tr>
  <tr>
    <td colspan="17" height="30" >บริษัท (Company) :<span id="sprytextfield1">
      <label>
        <input name="permit_sheet_company"type="text" value="<?php echo $row_Recordset1['permit_sheet_company']; ?>" size="40" maxlength="80" />
        </label>
      <span class="textfieldRequiredMsg">* </span></span></td>
    <td height="30" colspan="13" >จำนวน (No of worker) :
      <label>
        <span id="sprytextfield2">
        <input name="permit_sheet_no_of_work"  type="text" value="<?php echo $row_Recordset1['permit_sheet_no_of_work']; ?>"  size="3" maxlength="3" />
คน(Prs.) <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></label></td>
    </tr>
  <tr>
    <td colspan="30" height="30">ขออนุญาตเพื่อ (Permit to) :
<span id="sprytextfield4">  <input  name="permit_sheet_permit_to" type="text" value="<?php echo $row_Recordset1['permit_sheet_permit_to']; ?>"  size="100" maxlength="100" />
<span class="textfieldRequiredMsg">*</span></span></td>
    </tr>
    <span id="sprycheckbox1">
  <tr>
    <td colspan="6" height="30">ประเภทงาน (Type of work) :</td>
    <td colspan="24" height="30">   <label>
             <input <?php if (!(strcmp($row_Recordset1['permit_sheet_hot_work'],"งานก่อเกิดประกายไฟ/ความร้อน (Hot work)"))) {echo "checked=\"checked\"";} ?> type="checkbox" name="permit_sheet_hot_work" value="งานก่อเกิดประกายไฟ/ความร้อน (Hot work)"/>
          งานก่อเกิดประกายไฟ/ความร้อน (Hot work)</label></td>
    </tr>
  <tr>
    <td colspan="6" rowspan="6"></td>
    <td colspan="24" height="34"> <label>
            <input <?php if (!(strcmp($row_Recordset1['permit_sheet_high_work'],"งานที่สูงจากพื้นดิน/พื้นระดับตั้งแต่ 1.5 ม.ขึ้นไป (High level work)"))) {echo "checked=\"checked\"";} ?> type="checkbox" name="permit_sheet_high_work" value="งานที่สูงจากพื้นดิน/พื้นระดับตั้งแต่ 1.5 ม.ขึ้นไป (High level work)" />
          งานที่สูงจากพื้นดิน/พื้นระดับตั้งแต่ 1.5 ม.ขึ้นไป (High levelwork)</label></td>
    </tr>
  <tr>
    <td colspan="24" height="30"> <label>
            <input <?php if (!(strcmp($row_Recordset1['permit_sheet_space_work'],"งานในพื้นที่อับอากาศ (Confined space work)"))) {echo "checked=\"checked\"";} ?> type="checkbox" name="permit_sheet_space_work" value="งานในพื้นที่อับอากาศ (Confined space work)"  />
          งานในพื้นที่อับอากาศ (Confined space work)</label></td>
    </tr>
  <tr>
    <td colspan="24" height="30"><label for="chkPM">
            <input <?php if (!(strcmp($row_Recordset1['permit_sheet_elec_work'],"งานที่เกี่ยวข้องกับกระเเสไฟฟ้ามากกว่า 220 V. (Electrical work)"))) {echo "checked=\"checked\"";} ?> type="checkbox" id="chkPM" name="permit_sheet_elec_work" value="งานที่เกี่ยวข้องกับกระเเสไฟฟ้ามากกว่า 220 V. (Electrical work)"  />
          งานที่เกี่ยวข้องกับกระเเสไฟฟ้ามากกว่า 220 V. (Electrical work)</label></td>
    </tr>
  <tr>
    <td colspan="24" height="30">  <label>
            <input <?php if (!(strcmp($row_Recordset1['permit_sheet_chemical_work'],"งานที่เกี่ยวข้องกับสารเคมีอันตราย (Hazardous chemical substanes work)"))) {echo "checked=\"checked\"";} ?> type="checkbox" name="permit_sheet_chemical_work" value="งานที่เกี่ยวข้องกับสารเคมีอันตราย (Hazardous chemical substanes work)" />
          งานที่เกี่ยวข้องกับสารเคมีอันตราย (Hazardous chemical substanes work)</label></td>
    </tr>
  <tr>
    <td colspan="10" height="30"><label for="chkAnother">
  <input <?php if (!(strcmp($row_Recordset1['permit_sheet_anouther_work'],"งานอันตรายอื่น ๆ (Another hazardous work) ระบุ :"))) {echo "checked=\"checked\"";} ?> name="permit_sheet_anouther_work" type="checkbox" id="chkAnother" value="งานอันตรายอื่น ๆ (Another hazardous work) ระบุ :"  />
      งานอันตรายอื่น ๆ (Another hazardous work) ระบุ :   
      
      </label>
      
    </td>
    <td colspan="14"><div id="dvAnother" style="display: none" > 
      <input name="permit_sheet_anouther_detail" type="text" id="permit_sheet_anouther_detail" size="50" maxlength="50" />
      
 	</div></td>
    </tr>
  <tr>
    <td colspan="24" height="30" > <label>
            <input <?php if (!(strcmp($row_Recordset1['permit_sheet_support_work'],"งานบริการ หรืองานสนับสนุนอื่น ๆ (Services/support)"))) {echo "checked=\"checked\"";} ?> type="checkbox" name="permit_sheet_support_work" value="งานบริการ หรืองานสนับสนุนอื่น ๆ (Services/support)"  />
          งานบริการ หรืองานสนับสนุนอื่น ๆ (Services/support)</label>
          
      </td>
    </tr> <span class="textareaRequiredMsg">*</span>
    </span>
  <tr>
    <td colspan="9" height="30">ลักษณะงาน/รายละเอียด (Description/Detail):</td>
    <td width="30" colspan="21" rowspan="2" height="30"> <span id="sprytextarea1">
      <textarea name="permit_sheet_detail" cols="70" rows="2"><?php echo $row_Recordset1['permit_sheet_detail']; ?></textarea>  
      <span class="textareaRequiredMsg">*</span></span></td>
    </tr>
  <tr>
    <td height="21" colspan="9"></td>
    </tr>
  <tr>
    <td colspan="18" height="30">เข้ามาปฏิบัติงานในพื้นที่ตั้งแต่วันที่ (Start in date from) :
      
      
      <span id="sprytextfield5">
        <input name="permit_sheet_start_date" type="text" id="permit_sheet_start_date" value="<?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_start_date'])); ?>" readonly="readonly" /> 
      <span class="textfieldRequiredMsg">*</span></span></td>
    <td height="30" colspan="12">ถึงวันที่ (To) :
        <span id="sprytextfield6">
        <label>
         <input name="permit_sheet_end_date" type="text" id="permit_sheet_end_date" value="<?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_end_date'])); ?>" readonly="readonly" />  

        </label>
      <span class="textfieldRequiredMsg">*</span></span></td>
    </tr>
  <tr>
    <td colspan="12" height="30">ช่วงเวลาตั้งแต่ (Period from) :<span id="sprytextfield7">
      <label>
        
        <input name="permit_sheet_start_time" type="text" id="permit_sheet_start_time" value="<?php echo $row_Recordset1['permit_sheet_start_time']; ?>" readonly="readonly" />  
        </label>
      <span class="textfieldRequiredMsg">*</span></span></td>
    <td height="30" colspan="8">ถึง (To) :
      <span id="sprytextfield8">
        <label>
          <input name="permit_sheet__end_time" type="text" id="permit_sheet__end_time" value="<?php echo $row_Recordset1['permit_sheet__end_time']; ?>" readonly="readonly" />  
        </label>
      <span class="textfieldRequiredMsg">*</span></span></td>
<td height="30" colspan="10"> ในพื้นที่ (Area of) :<span id="spryselect1">
           <select name="permit_sheet_area_of">
             <option value="<?php echo $row_Recordset1['permit_sheet_area_of']; ?>"><?php echo $row_Recordset1['permit_sheet_area_of']; ?></option>
             <option value="Warehouse 1">Warehouse 1</option>
             <option value="Warehouse 2">Warehouse 2</option>
             <option value="Warehouse 3">Warehouse 3</option>
             <option value="Paint">Paint</option>
             <option value="Injection F1">Injection F1</option>
             <option value="Injection F2">Injection F2</option>
             <option value="Assembly 1">Assembly 1</option>
             <option value="Assembly 2">Assembly 2</option>
             <option value="All">All</option>
             <option value="Other……">Other……</option>
           </select>
      <span class="selectRequiredMsg">*</span></span></label></td>
    </tr>
  <tr>
    <td colspan="30" height="30">โดยมีหัวหน้างาน/ผู้ควบคุมงานชื่อ (Chief/foreman is) :
      <label>
        <span id="sprytextfield9">
          <input name="permit_sheet_chief"  type="text" id="chiefname2" value="<?php echo $row_Recordset1['permit_sheet_chief']; ?>" size="30" maxlength="50" />
      <span class="textfieldRequiredMsg">*</span></span></label></td>
    </tr>
     <tr>
    <td height="30" colspan="30">เบอร์โทรศัพท์ที่สามารถติดต่อได้(Telephone NO.) :
        <label>
       <span id="sprytextfield10">
       <input name="permit_sheet_telephone_no" type="text" value="<?php echo $row_Recordset1['permit_sheet_telephone_no']; ?>" size="10" maxlength="10" />
       <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span> </label></td>
    </tr>
  <tr>
    <td colspan="30" height="30" >สารเคมีที่ใช้ (Chemical substancs) : 
<label><span id="sprytextfield11">
           <input  name="permit_sheet_chemical"  type="text" value="<?php echo $row_Recordset1['permit_sheet_chemical']; ?>"  size="95" maxlength="200" />
      <span class="textfieldRequiredMsg">*</span></span></label></td>
    </tr>
  <tr>
    <td colspan="30" height="30" >ของเสียจากการปฏิบัติงาน (Waste from work ) : 
        <label><span id="sprytextfield12">
          <input  name="permit_sheet_waste_form_work" type="text" value="<?php echo $row_Recordset1['permit_sheet_waste_form_work']; ?>" size="81" maxlength="200" />
          <span class="textfieldRequiredMsg">*</span></span>
          
        </label></td>
    </tr>
  <tr>
    <td colspan="30" height="30" >เจ้าหน้าที่บริษัทฯ/ผู้รับผิดชอบผู้รับเหมา In chargr/Responsibility person</td>
    </tr>
  <tr>
    <td colspan="15" height="30" >ชื่อ (Name)<span id="sprytextfield13">
      <label>
        <input name="permit_sheet_incharge_name"  type="text" value="<?php echo $row_Recordset1['permit_sheet_incharge_name']; ?>"  size="48" maxlength="30" />
      </label>
    </span></td>
    <td height="30" colspan="15" > ฝ่าย (Dept.) 
        <span id="spryselect3">
        <select name="permit_sheet_inchange_dept" >
        	<option value="<?php echo $row_Recordset1['permit_sheet_inchange_dept']; ?>"> <?php echo $row_Recordset1['permit_sheet_inchange_dept']; ?> </option>
            <option value="Sales ">Sales </option>
            <option value="Finance &amp; Accounting">Finance &amp; Accounting</option>
            <option value="Human Resource">Human Resource</option>
            <option value="Products Planning &amp; Development">Products Planning &amp; Development</option>
            <option value="Purchasing">Purchasing</option>
            <option value="Monozukuri">Monozukuri</option>
            <option value="Production Engineering">Production Engineering</option>
            <option value="Production">Production</option>
            <option value="Quality Assurance">Quality Assurance</option>
            <option value="Risk Management">Risk Management</option>
            <option value="Supplier Quality Development">Supplier Quality Development</option>
            <option value="ESM">ESM</option>
            <option value="Factory Manager">Factory Manager</option>
            <option value="Reserch &amp; Development">Reserch &amp; Development</option>
            <option value="Administration">Administration</option>
        </select>
        <span class="selectRequiredMsg">*</span></span></label> 
      </td>
    </tr>
  <tr>
    <td colspan="15" height="30" >หน่วยงาน/แผนก (Section/Div.)
<span id="spryselect2">
<select name="permit_sheet_incharge_section">
  <option value="<?php echo $row_Recordset1['permit_sheet_incharge_section']; ?>"><?php echo $row_Recordset1['permit_sheet_incharge_section']; ?></option>
  <option value="Delivery">Delivery</option>
  <option value="Sales">Sales</option>

  <option value="Warehouse">Warehouse</option>
  <option value="Package Control">Package Control</option>
  <option value="Finance &amp; Accounting">Finance &amp; Accounting</option>
  <option value="Human Resource &amp; Administration">Human Resource &amp; Administration</option>
  <option value="Marketing">Marketing</option>
  <option value="Products Planning &amp; Development">Products Planning &amp; Development</option>
  <option value="Purchasing">Purchasing</option>
  <option value="Material &amp; Parts Control">Material &amp; Parts Control</option>
  <option value="Monozukuri">Monozukuri</option>
  <option value="PE (Facilities &amp; Utilities)">PE (Facilities &amp; Utilities)</option>
  <option value="PE (Preventive Maintenance)">PE (Preventive Maintenance)</option>
  <option value="PE (Process Engineering)">PE (Process Engineering)</option>
  <option value="Production">Production</option>
  <option value="Production (Assembly)">Production (Assembly)</option>
  <option value="Production (Injection F1)">Production (Injection F1)</option>
  <option value="Production Planning">Production Planning</option>
  <option value="Production (Injection F2)">Production (Injection F2)</option>
  <option value="Production (Paint)">Production (Paint)</option>
  <option value="QA (Customer Support)">QA (Customer Support)</option>
  <option value="QA (Engineering)">QA (Engineering)</option>
  <option value="QA (Process Control)">QA (Process Control)</option>
  <option value="QA (Quality Management System)">QA (Quality Management System)</option>
  <option value="Risk Management">Risk Management</option>
  <option value="Supplier Quality Development">Supplier Quality Development</option>
</select>
<span class="selectRequiredMsg">*</span></span> </td>
    <td height="30" colspan="15" >E-mail : 
      <span id="sprytextfield14">
      <label>
        <input name="permit_sheet_incharge_email" type="text" size="50" maxlength="50" value="<?php echo $row_Recordset1['permit_sheet_incharge_email']; ?>"   />
      </label>
      <span class="textfieldRequiredMsg">*</span></span></td>
    </tr>
  <tr>
    <td colspan="3" align="right" height="30" >หมายเหตุ : &nbsp;&nbsp;</td>
    <td colspan="27" height="30" >กรณีตรวจพบว่า ผู้รับเหมาไม่ปฏิบัติงานตามกฏความปลอดภัย หรือไม่ได้มีการเตรียมการป้องกันการเกิดอัคคีภัยอุบัติเหตุ หรืออันตราย </td>
    </tr>
  <tr>
    <td colspan="3" rowspan="4"></td>
    <td colspan="27" height="30" >ที่อาจเกิดขึ้นจากการปฏิบัติงาน บริษัทฯ จะไม่อนุญาตให้ปฏิบัติงานดังกล่าวจนกว่าจะมีการแก้ไขให้ปลอดภัย</td>
    </tr>
  <tr>
    <td colspan="10" align="center" height="30" >เอกสารเพิ่มเติม( Additional documents)</td>
    <td colspan="17" rowspan="3"><label>
        <input type="text" name="permit_sheet_ordinal" value="<?php echo $row_Recordset1['permit_sheet_ordinal']; ?>" style="display: none" />
      เรียกดู เอกสารเพิ่มเติมประกอบเอกสารขออนุญาต <a href="additional_files.php?Filesordinal=<?php echo $row_Recordset1['permit_sheet_ordinal']; ?>">( Additional documents) </a></label><br />เพิ่มข้อมูลผู้รับเหมา  
      <a href="add_chief.php?permit_sheet_no_id=<?php echo $row_Recordset1['permit_sheet_no_id']; ?>">Add Contractor Chief</a></td>
    </tr>
  <tr>
    <td colspan="10" align="center" height="30">  <input type="file" name="filUpload[]" />
      
      </td>
    </tr>
  <tr>
    <td height="30" colspan="10" align="center"><input type="button" value="Add" onclick="generateRow()"/></td>
    </tr>
  <tr>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
     <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
   <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
     <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
     <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
    <td width="30" height="21"></td>
  </tr>
</table>
<div id="pmstaff" width="1022" height="36"  >
  <table width="1022" height="36" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <th  width="160" height="30" bgcolor="#808080" scope="row">PM Staff</th>
      <td width="358" height="30" bgcolor="#FFFFFF" ><select name="pm_staff" onchange="pm_staffName(this.value);">
        <option value="">&lt;-- Please Select Item --&gt;</option>
        <?php  
			$strSQL = "SELECT * FROM pm_staff ORDER BY pm_staff_name ASC";
			$objQuery = mysql_query($strSQL);
			while($objResult = mysql_fetch_array($objQuery))
			{
			?>
        <option value="<?php echo $objResult["pm_staff_name"];?>|<?php echo $objResult["pm_staff_dept"];?>|<?php echo $objResult["pm_staff_section"];?>|<?php echo $objResult["pm_staff_e_mail"];?>"  ><?php echo $objResult["pm_staff_name"];?></option>
        <?php
			}
			?>
      </select></td>
      <td width="160" height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_pm_staff_name" type="text" value="" size="25" maxlength="50" readonly="readonly" style="display: none"  />
        <input name="permit_sheet_pm_staff_section" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
      <td width="160" height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_pm_staff_dept" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
      <td width="160" height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_pm_staff_email" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
    </tr>
  </table>
</div>
<table width="1022" height="132" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th width="160" height="30" bgcolor="#808080" scope="row" >Area onwer </th>
    <td width="358" height="30" bgcolor="#FFFFFF" ><span id="spryselect4">
      <select name="area_owner" onchange="area_ownerName(this.value);">
        <option value="">&lt;-- Please Select Item --&gt;</option>
        <?php
			$strSQL = "SELECT * FROM area_owner ORDER BY area_owner_name ASC";
			$objQuery = mysql_query($strSQL);
			while($objResult = mysql_fetch_array($objQuery))
			{
			?>
        <option value="<?php echo $objResult["area_owner_status"];?>|<?php echo $objResult["area_owner_name"];?>|<?php echo $objResult["area_owner_dept"];?>|<?php echo $objResult["area_owner_section"];?>|<?php echo $objResult["area_owner_e_mail"];?>"  ><?php echo $objResult["area_owner_name"];?></option>
        <?php
			}
			?>
      </select>
      <span class="selectRequiredMsg">*</span></span>
      <input name="permit_sheet_area_owner_status" type="text"  size="14" maxlength="14" readonly="readonly"  style="display: none" /></td>
    <td width="160" height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_area_owner_name" type="text" value="" size="25" maxlength="50" readonly="readonly" style="display: none"  />
      <input name="permit_sheet_area_owner_section" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
    <td width="160" height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_area_owner_dept" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
    <td width="160" height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_area_owner_email" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
  </tr>
  <tr>
    <th width="160" height="30" bgcolor="#808080" scope="row">Approved </th>
    <td width="358" height="30" bgcolor="#FFFFFF" ><span id="spryselect5">
      <select name="manager_approved" onchange="manager_approvedName(this.value);">
        <option value="">&lt;-- Please Select Item --&gt;</option>
        <?php
			$strSQL = "SELECT * FROM manager_approved ORDER BY manager_approved_name ASC";
			$objQuery = mysql_query($strSQL);
			while($objResult = mysql_fetch_array($objQuery))
			{
			?>
        <option value="<?php echo $objResult["manager_approved_status"];?>|<?php echo $objResult["manager_approved_name"];?>|<?php echo $objResult["manager_approved_dept"];?>|<?php echo $objResult["manager_approved_section"];?>|<?php echo $objResult["manager_approved_e_mail"];?>"  ><?php echo $objResult["manager_approved_name"];?></option>
        <?php
			}
			?>
      </select>
      <span class="selectRequiredMsg">*</span></span>
      <input name="permit_sheet_manager_approved_status" type="text"   size="14" maxlength="14" readonly="readonly" style="display: none" /></td>
    <td width="160" height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_manager_approved__name" type="text" value="" size="25" maxlength="50" readonly="readonly" style="display: none"  />
      <input name="permit_sheet_manager_approved_section" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
    <td width="160" height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_manager_approved__dept" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
    <td width="160" height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_manager_approved_email" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
  </tr>
  <tr>
    <th height="30" bgcolor="#808080" scope="row" >SOH Div.</th>
    <td height="30" bgcolor="#FFFFFF" ><span id="spryselect6">
      <select name="soh_div" onchange="soh_divName(this.value);">
        <option value="">&lt;-- Please Select Item --&gt;</option>
        <?php
			$strSQL = "SELECT * FROM soh_div ORDER BY soh_div_name ASC";
			$objQuery = mysql_query($strSQL);
			while($objResult = mysql_fetch_array($objQuery))
			{
			?>
        <option value="<?php echo $objResult["soh_div_name"];?>|<?php echo $objResult["soh_div_dept"];?>|<?php echo $objResult["soh_div_section"];?>|<?php echo $objResult["soh_div_e_mail"];?>"  ><?php echo $objResult["soh_div_name"];?></option>
        <?php
			}
			?>
      </select>
      <span class="selectRequiredMsg">*</span></span></td>
    <td height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_soh_div_name" type="text" value="" size="25" maxlength="50" readonly="readonly" style="display: none"  />
      <input name="permit_sheet_soh_div_section" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
    <td height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_soh_div_dept" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
    <td height="30" bgcolor="#FFFFFF" ><input name="permit_sheet_soh_div_email" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
  </tr>
  <tr>
    <th width="160" height="30" bgcolor="#FFFFFF" scope="row" >&nbsp;</th>
    <td width="358" height="30" bgcolor="#FFFFFF" >&nbsp;</td>
    <td width="160" height="30"  align="center" bgcolor="#FFFFFF"><input type="submit" value="Save Change" /></td>
    <td width="160" height="30" bgcolor="#FFFFFF" >&nbsp;</td>
    <td width="160" height="30" bgcolor="#FFFFFF" >&nbsp;</td>
  </tr>
  <tr> </tr>
  <tr> </tr>
  <tr> </tr>
</table>
<input type="hidden" name="MM_update" value="frmMain" />

</form>

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "integer");
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12");
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");

var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6");
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
