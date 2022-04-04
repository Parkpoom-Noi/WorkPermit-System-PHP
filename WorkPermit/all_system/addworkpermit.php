
<?php 

	mysql_connect("localhost","root","P@88w0rd") or die(mysql_error());
	mysql_select_db("workpermit");

 
function workpermit_ordinal_number($length=5) {
      $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $number = '';
      for ( $i = 0; $i < $length; $i++ )
         $number .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
      return $number;
   } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AddWorkpermit</title>
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
					
		 $(function () {
            $("#chkPM").click(function () {
                if ($(this).is(":checked")) {
                    $("#pmstaff").show();
                } else {
                    $("#pmstaff").hide();
                }
            });
        });
		
 
    </script>
 
 
 
 <link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>

<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>

<script type="text/javascript">
$(document).ready(function(){

$("#box").hide();

$("#permit_sheet_area_of").change(function(){
	var permit_sheet_area_of = $("#permit_sheet_area_of").val();
	if(permit_sheet_area_of == 'Other'){
		$("#box").show();
		$("#permit_sheet_area_other").val("").focus();
	}else{
		$("#box").hide();
		$("#permit_sheet_area_other").val("");
	}
	
});

});

</script>

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
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />



</head>

<body>

<form action="addworkpermit_sys.php" method="POST" enctype="multipart/form-data"  name="frmMain"   >
  <table width="1093" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>  
  <tr>
    <td height="30" colspan="33"><h3  > &nbsp; Hitachi chemical Automotive Products (Thailand) Co.,Ltd. </h3></td>
  </tr>
  <tr>
    <td height="30" colspan="23"><strong> &nbsp;เอกสารขออนุญาติเข้าปฏิบัติงานของผู้รับเหมาหรือบุคคลภายนอก (Permit to Work)</strong></td>
    <td height="30" colspan="10"><strong>เลขที่ (Permit No.) </strong></td>
  </tr>
  <tr>
    <td height="30" colspan="23" >&nbsp;ผู้รับเหมา/บุคคลภายนอก (Contrator/Outsouce)</td>
    <td height="30" colspan="10" >วันที่(Date) <span id="sprytextfield3">
      <label>
        <input name="permit_sheet_date" type="text" value="<?php echo date("d-m-Y");   ?> " readonly="readonly"/>
      </label>
    </span></td>
  </tr>
  <tr>
    <td height="30" colspan="20" >&nbsp;บริษัท (Company) :<span id="sprytextfield1">
      <label>
        <input name="permit_sheet_company"type="text" size="40" maxlength="80" />
      </label>
    </span></td>
    <td height="30" colspan="13" >จำนวน (No of worker) :
      <label> <span id="sprytextfield2">
        <input name="permit_sheet_no_of_work"  type="text"  size="3" maxlength="3" />
        คน(Prs.) <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></label></td>
  </tr>
  <tr>
    <td height="30" colspan="33">&nbsp;ขออนุญาตเพื่อ (Permit to) : <span id="sprytextfield4">
      <input  name="permit_sheet_permit_to" type="text"  size="100" maxlength="100" />
    </span></td>
  </tr>
  
  <tr>
    <td height="30" colspan="9">&nbsp;ประเภทงาน (Type of work) :</td>
    <td colspan="24" rowspan="2"><span id="sprycheckbox2">
      <label> <br />
        <input type="checkbox" name="permit_sheet_hot_work" value="งานก่อเกิดประกายไฟ/ความร้อน (Hot work)"/>
        งานก่อเกิดประกายไฟ/ความร้อน (Hot work)</label>
      <label> <br />
        <br />
        <input type="checkbox" name="permit_sheet_high_work" value="งานที่สูงจากพื้นดิน/พื้นระดับตั้งแต่ 1.5 ม.ขึ้นไป (High level work)" />
        งานที่สูงจากพื้นดิน/พื้นระดับตั้งแต่ 1.5 ม.ขึ้นไป (High levelwork)</label>
      <label> <br />
        <br />
        <input type="checkbox" name="permit_sheet_space_work" value="งานในพื้นที่อับอากาศ (Confined space work)"  />
        งานในพื้นที่อับอากาศ (Confined space work)</label>
      <label for="chkPM"> <br />
        <br />
        <input type="checkbox" id="chkPM" name="permit_sheet_elec_work" value="งานที่เกี่ยวข้องกับกระเเสไฟฟ้ามากกว่า 220 V. (Electrical work)"  />
        งานที่เกี่ยวข้องกับกระเเสไฟฟ้ามากกว่า 220 V. (Electrical work)</label>
      <label> <br />
        <br />
        <input type="checkbox" name="permit_sheet_chemical_work" value="งานที่เกี่ยวข้องกับสารเคมีอันตราย (Hazardous chemical substanes work)" />
        งานที่เกี่ยวข้องกับสารเคมีอันตราย (Hazardous chemical substanes work)</label>
      <label for="chkAnother"> <br />
        <br />
        <input type="checkbox" id="chkAnother" name="permit_sheet_anouther_work" value="งานอันตรายอื่น ๆ (Another hazardous work) ระบุ :"  />
        งานอันตรายอื่น ๆ (Another hazardous work) ระบุ</label>
      </span>
      <div id="dvAnother" style="display: none" > <span id="sprycheckbox2">
        <input name="permit_sheet_anouther_detail" type="text" id="permit_sheet_anouther_detail" size="50" maxlength="50" />
      </span></div>
      <span id="sprycheckbox2"><br />
        <br />
        <label>
          <input type="checkbox" name="permit_sheet_support_work" value="งานบริการ หรืองานสนับสนุนอื่น ๆ (Services/support)"  />
          งานบริการ หรืองานสนับสนุนอื่น ๆ (Services/support)</label>
        Please make a selection.</span> <br />
      <br /></td>
  </tr>
  <tr>
    <td height="141" colspan="9">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="12">&nbsp;ลักษณะงาน/รายละเอียด (Description/Detail):</td>
    <td height="30" colspan="21" rowspan="2"><span id="sprytextarea1">
      <textarea name="permit_sheet_detail" cols="70" rows="2"></textarea>
    </span></td>
  </tr>
  <tr>
    <td height="21" colspan="12"></td>
  </tr>
  <tr>
    <td height="30" colspan="21">&nbsp;เข้ามาปฏิบัติงานในพื้นที่ตั้งแต่วันที่ (Start in date from) : <span id="sprytextfield5">
      <input name="permit_sheet_start_date" type="text" id="permit_sheet_start_date" value="" readonly="readonly" />
    </span></td>
    <td height="30" colspan="12">ถึงวันที่ (To) : <span id="sprytextfield6">
      <label>
        <input name="permit_sheet_end_date" type="text" id="permit_sheet_end_date" value="" readonly="readonly" />
      </label>
    </span></td>
  </tr>
  <tr>
    <td height="30" colspan="15">&nbsp;ช่วงเวลาตั้งแต่ (Period from) :<span id="sprytextfield7">
      <label>
        <input name="permit_sheet_start_time" type="text" id="permit_sheet_start_time" value="" readonly="readonly" />
      </label>
    </span></td>
    <td height="30" colspan="8">ถึง (To) : <span id="sprytextfield8">
      <label>
        <input name="permit_sheet__end_time" type="text" id="permit_sheet__end_time" value="" readonly="readonly" />
      </label>
    </span></td>
    <td height="30" colspan="10">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="15">&nbsp;ในพื้นที่ (Area of) :
      <select name="permit_sheet_area_of" id="permit_sheet_area_of" >
        <option value="">&lt;-- Please Select Item --&gt;</option>
        <option value="Warehouse 1">Warehouse 1</option>
        <option value="Warehouse 2">Warehouse 2</option>
        <option value="Warehouse 3">Warehouse 3</option>
        <option value="Paint">Paint</option>
        <option value="Injection F1">Injection F1</option>
        <option value="Injection F2">Injection F2</option>
        <option value="Assembly 1">Assembly 1</option>
        <option value="Assembly 2">Assembly 2</option>
        <option value="Office 1st floor">Office 1st floor</option>
        <option value="Office 2nd floor">Office 2nd floor</option>
        <option value="Server room">Server room</option>
        <option value="Technical Center">Technical Center</option>
        <option value="Chemical Storage">Chemical Storage</option>
        <option value="PM Shop">PM Shop</option>
        <option value="FU Shop">FU Shop</option>
        <option value="LPG&amp; Boiler Station">LPG &amp; Boiler Station</option>
        <option value="All">All</option>
        <option value="Other">Other</option>
      </select></td>
    <td height="30" colspan="8"><div id="box">
      <label>ระบุ  : </label>
      <input type="text" name="permit_sheet_area_other" id="permit_sheet_area_other" />
    </div></td>
    <td height="30" colspan="10">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="33">&nbsp;โดยมีหัวหน้างาน/ผู้ควบคุมงานชื่อ (Chief/foreman is) :
      <label> <span id="sprytextfield9">
        <input name="permit_sheet_chief"  type="text" id="chiefname2" size="30" maxlength="50" />
      </span></label></td>
  </tr>
  <tr>
    <td height="30" colspan="33">&nbsp;เบอร์โทรศัพท์ที่สามารถติดต่อได้(Telephone NO.) :
      <label> <span id="sprytextfield10">
        <input name="permit_sheet_telephone_no" type="text" size="10" maxlength="10" />
        <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></label></td>
  </tr>
  <tr>
    <td height="30" colspan="33" >&nbsp;สารเคมีที่ใช้ (Chemical substancs) :
      <label><span id="sprytextfield11">
        <input  name="permit_sheet_chemical"  type="text"  size="95" maxlength="200" />
      </span></label></td>
  </tr>
  <tr>
    <td height="30" colspan="33" >&nbsp;ของเสียจากการปฏิบัติงาน (Waste from work ) :
      <label><span id="sprytextfield12">
        <input  name="permit_sheet_waste_form_work" type="text" size="81" maxlength="200" />
      </span> </label></td>
  </tr>
  <tr>
    <td height="30" colspan="33"   &nbsp;>เจ้าหน้าที่บริษัทฯ/ผู้รับผิดชอบผู้รับเหมา In chargr/Responsibility person</td>
  </tr>
  <tr>
    <td height="30" colspan="18" >&nbsp;ชื่อ (Name)<span id="sprytextfield13">
      <label>
        <input name="permit_sheet_incharge_name"  type="text" value="<?php echo $objResult["Name"];?>"  size="48" maxlength="30" readonly="readonly" />
      </label>
    </span></td>
    <td height="30" colspan="15" > ฝ่าย (Dept.)<span id="spryselect3">
      <select name="permit_sheet_inchange_dept" >
        <option value=""><-- Please Select Item --></option>
        <option value="Sales ">Sales </option>
        <option value="Finance &amp; Accounting">Finance &amp; Accounting</option>
        <option value="Human Resource &amp; Administration">Human Resource &amp; Administration</option>
        <option value="Products Planning &amp; Development">Products Planning &amp; Development</option>
        <option value="Purchasing">Purchasing</option>
        <option value="Monozukuri">Monozukuri</option>
        <option value="Production">Production</option>
        <option value="Quality Assurance">Quality Assurance</option>
        <option value="Risk Management">Risk Management</option>
        <option value="Supplier Quality Development">Supplier Quality Development</option>
        <option value="Factory Manager">Factory Manager</option>
        <option value="Reserch &amp; Development">Reserch &amp; Development</option>
      </select>
    </span></td>
  </tr>
  <tr>
    <td height="30" colspan="18" >&nbsp;หน่วยงาน/แผนก (Section/Div.) <span id="spryselect2">
      <select name="permit_sheet_incharge_section">
        <option value=""><-- Please Select Item --></option>
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
    </span></td>
    <td height="30" colspan="15" >E-mail : <span id="sprytextfield14">
      <label>
        <input name="permit_sheet_incharge_email" type="text" value="<?php echo $objResult["member_email"];?>" size="50" maxlength="50" readonly="readonly"   />
      </label>
    </span></td>
  </tr>
  <tr>
    <td height="30" colspan="6" align="right" >หมายเหตุ : &nbsp;&nbsp;</td>
    <td height="30" colspan="27" >กรณีตรวจพบว่า ผู้รับเหมาไม่ปฏิบัติงานตามกฏความปลอดภัย หรือไม่ได้มีการเตรียมการป้องกันการเกิดอัคคีภัยอุบัติเหตุ หรืออันตราย </td>
  </tr>
  <tr>
    <td colspan="6" rowspan="4">&nbsp;</td>
    <td height="30" colspan="27" >ที่อาจเกิดขึ้นจากการปฏิบัติงาน บริษัทฯ จะไม่อนุญาตให้ปฏิบัติงานดังกล่าวจนกว่าจะมีการแก้ไขให้ปลอดภัย</td>
  </tr>
  <tr>
    <td height="30" colspan="10" align="center" >เอกสารเพิ่มเติม( Additional documents)</td>
    <td colspan="17" rowspan="3"><label>
      <input type="text" name="permit_sheet_ordinal" value="<?php echo date("dmy") , workpermit_ordinal_number(5); ?> "  style="display: none"   />
    </label></td>
  </tr>
  <tr>
    <td height="30" colspan="10" align="center"><span id="sprytextfield15">
      <label>
        <input type="file" name="filUpload[]" />
      </label>
      <span class="textfieldRequiredMsg">JSA required</span></span>
      <div id="div"></div></td>
  </tr>
  <tr>
    <td height="30" colspan="10" align="center"><input type="button" value="Add" onclick="generateRow()"/></td>
  </tr>
  <tr>
    <td width="31"></td>
    <td width="31"></td>
    <td width="31"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="36" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="1" height="21"></td>
    <td width="61" height="21"></td>
    <td width="31" height="21"></td>
    <td width="34" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="33" height="21"></td>
    <td width="31" height="21"></td>
    <td width="38" height="21"></td>
    <td width="30" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="31" height="21"></td>
    <td width="85" height="21"></td>
  </tr>
  </table>
  <div id="pmstaff" style="display: none" >
  <table width="1022" height="36" align="center" cellpadding="0" cellspacing="0" >
    <tr>
      <th  width="160" height="30" bgcolor="#808080" scope="row">PM Staff</th>
      <td width="358" height="30"   >
        <select name="pm_staff" onchange="pm_staffName(this.value);">
          <option value=""><-- Please Select Item --></option>
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
      <td width="160" height="30"   ><input name="permit_sheet_pm_staff_name" type="text" value="" size="25" maxlength="50" readonly="readonly" style="display: none"  /><input name="permit_sheet_pm_staff_section" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
      <td width="160" height="30"   ><input name="permit_sheet_pm_staff_dept" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
      <td width="160" height="30"   ><input name="permit_sheet_pm_staff_email" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
      </tr>
    </table>
</div>
 <table width="1022" height="132" align="center" cellpadding="0" cellspacing="0" >
   <tr>
     <th width="160" height="30" bgcolor="#808080" scope="row" >Area onwer </th>
     <td width="358" height="30"   ><span id="spryselect4">
       <select name="area_owner" OnChange="area_ownerName(this.value);">
       <option value=""><-- Please Select Item --></option>
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
        </span> 
       <input name="permit_sheet_area_owner_status" type="text"  size="14" maxlength="14" readonly="readonly"  style="display: none" /></td>
     <td width="160" height="30"   > <input name="permit_sheet_area_owner_name" type="text" value="" size="25" maxlength="50" readonly="readonly" style="display: none"  />
      <input name="permit_sheet_area_owner_section" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
     <td width="160" height="30"   ><input name="permit_sheet_area_owner_dept" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
     <td width="160" height="30"   ><input name="permit_sheet_area_owner_email" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
   </tr>
   <tr>
     <th width="160" height="30" bgcolor="#808080" scope="row">Approved </th>
   <td width="358" height="30"   ><span id="spryselect5">
     <select name="manager_approved" OnChange="manager_approvedName(this.value);">
            <option value=""><-- Please Select Item --></option>
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
      </span>
     <input name="permit_sheet_manager_approved_status" type="text"   size="14" maxlength="14" readonly="readonly" style="display: none" /></td>
   <td width="160" height="30"   ><input name="permit_sheet_manager_approved__name" type="text" value="" size="25" maxlength="50" readonly="readonly" style="display: none"  /> <input name="permit_sheet_manager_approved_section" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
     <td width="160" height="30"   ><input name="permit_sheet_manager_approved__dept" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
     <td width="160" height="30"   ><input name="permit_sheet_manager_approved_email" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
   </tr>
   <tr>
     <th height="30" bgcolor="#808080" scope="row" >SOH Div.</th>
     <td height="30"   ><span id="spryselect6">
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
      </span></td>
     <td height="30"   ><input name="permit_sheet_soh_div_name" type="text" value="" size="25" maxlength="50" readonly="readonly" style="display: none"  /> <input name="permit_sheet_soh_div_section" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
     <td height="30"   ><input name="permit_sheet_soh_div_dept" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
     <td height="30"   ><input name="permit_sheet_soh_div_email" type="text" value="" size="25" maxlength="50" readonly="readonly" /></td>
   </tr>
   <tr>
     <th width="160" height="30"   scope="row" >&nbsp;</th>
     <td width="358" height="30"   >&nbsp;</td>
     <td width="160" height="30"  align="center"  ><input type="submit" value="Send Workpermit" /></td>
     <td width="160" height="30"   ><input type="hidden" name="MM_insert" value="frmMain" /></td>
     <td width="160" height="30"   >&nbsp;</td>
   </tr>
 </table>
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
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "integer");
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12");
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5");
var spryselect6 = new Spry.Widget.ValidationSelect("spryselect6");

var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14");
var sprycheckbox2 = new Spry.Widget.ValidationCheckbox("sprycheckbox2");
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15");
//-->
</script>
</body>
</html>
