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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE permit_sheet SET permit_sheet_date=%s, check_sheet_q_result=%s, check_sheet_q_detail=%s, check_sheet_e_1_result=%s, check_sheet_e_2_result=%s, check_sheet_e_3_result=%s, check_sheet_e_4_result=%s, check_sheet_e_5_result=%s, check_sheet_e_1_detail=%s, check_sheet_e_2_detail=%s, check_sheet_e_3_detail=%s, check_sheet_e_4_detail=%s, check_sheet_e_5_detail=%s, check_sheet_s_1_1_result=%s, check_sheet_s_1_2_result=%s, check_sheet_s_1_3_result=%s, check_sheet_s_1_4_result=%s, check_sheet_s_1_5_result=%s, check_sheet_s_1_1_detail=%s, check_sheet_s_1_2_detail=%s, check_sheet_s_1_3_detail=%s, check_sheet_s_1_4_detail=%s, check_sheet_s_1_5_detail=%s, check_sheet_s_2_1_result=%s, check_sheet_s_2_2_result=%s, check_sheet_s_2_3_result=%s, check_sheet_s_2_4_result=%s, check_sheet_s_2_5_result=%s, check_sheet_s_2_1_detail=%s, check_sheet_s_2_2_detail=%s, check_sheet_s_2_3_detail=%s, check_sheet_s_2_4_detail=%s, check_sheet_s_2_5_detail=%s, check_sheet_s_3_result=%s, check_sheet_s_3_detail=%s, check_sheet_s_4_result=%s, check_sheet_s_4_detail=%s, check_sheet_s_5_1_result=%s, check_sheet_s_5_2_result=%s, check_sheet_s_5_1_detail=%s, check_sheet_s_5_2_detail=%s, check_sheet_hot_work=%s, check_sheet_high_work=%s, check_sheet_space_work=%s, check_sheet_electrical_work=%s, check_sheet_chemical_work=%s, check_sheet_inspector_name=%s, check_sheet_inspector_surname=%s, check_sheet_inspector_company=%s WHERE permit_sheet_no_id=%s",
                       GetSQLValueString($_POST['permit_sheet_date'], "text"),
                       GetSQLValueString($_POST['check_sheet_q_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_q_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_1_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_2_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_3_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_4_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_5_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_1_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_2_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_3_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_4_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_e_5_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_1_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_2_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_3_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_4_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_5_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_1_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_2_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_3_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_4_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_1_5_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_1_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_2_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_3_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_4_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_5_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_1_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_2_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_3_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_4_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_2_5_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_3_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_3_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_4_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_4_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_5_1_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_5_2_result'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_5_1_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_s_5_2_detail'], "text"),
                       GetSQLValueString($_POST['check_sheet_hot_work'], "text"),
                       GetSQLValueString($_POST['check_sheet_high_work'], "text"),
                       GetSQLValueString($_POST['check_sheet_space_work'], "text"),
                       GetSQLValueString($_POST['check_sheet_electrical_work'], "text"),
                       GetSQLValueString($_POST['check_sheet_chemical_work'], "text"),
                       GetSQLValueString($_POST['check_sheet_inspector_name'], "text"),
                       GetSQLValueString($_POST['check_sheet_inspector_surname'], "text"),
                       GetSQLValueString($_POST['check_sheet_inspector_company'], "text"),
                       GetSQLValueString($_POST['permit_sheet_no_id'], "int"));

  mysql_select_db($database_workpermit, $workpermit);
  $Result1 = mysql_query($updateSQL, $workpermit) or die(mysql_error());
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
<title>Check sheet</title>
</head>

<body style="width: 100%">

<p><br>
  
</p>
<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hitachi chemical Automotive Products (Thailand) Co.,Ltd.</h3>
<span style="text-align: center"></span>
<br /><p align="right"> Permit No. <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_no_id']; ?> </font></u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p align="center">แบบตรวจความพร้อมการปฏิบัติงานของผู้รับเหมา</p>

<form action="<?php echo $editFormAction; ?>" method="POST" name="form1"  ><table width="1016" height="1183" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td colspan="2" rowspan="2" bgcolor="#808080" align="center">Check Points</td>
    <td width="371" rowspan="2" bgcolor="#808080" align="center">List</td>
    <td height="38" colspan="3" align="center" bgcolor="#808080">Result</td>
    <td width="209" rowspan="2" bgcolor="#808080" align="center">Detail</td>
  </tr>
  <tr>
    <td width="50" height="33" align="center" bgcolor="#808080">OK</td>
    <td width="50" bgcolor="#808080" align="center">NG</td>
    <td width="55" bgcolor="#808080" align="center">N/A</td>
    </tr>
  <tr>
    <td width="32" align="center">Q</td>
    <td width="235">การอบรมพนักงาน</td>
    <td>พนักงานผ่านการทดสอบความเข้าใจด้าน SOH&amp;E</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_q_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_q_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_q_result" value="N/A"   />
      N/A</label></td>
    <td><label>
      <input name="check_sheet_q_detail" type="text"  size="34" />
    </label></td>
  </tr>
  <tr>
    <td rowspan="5" align="center">E</td>
    <td rowspan="2"><p>น้ำเสีย<br />
      (Waste water management)</p></td>
    <td height="38">มีการจัดการกับน้ำเสียได้อย่างเหมาะสม</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_e_1_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_e_1_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_e_1_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_e_1_detail"  type="text" size="34" /></td>
  </tr>
  <tr>
    <td height="35">มีการปิดกั้นรางน้ำฝน (หากจำเป็น)</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_e_2_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_e_2_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_e_2_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_e_2_detail" type="text" size="34" /></td>
  </tr>
  <tr>
    <td><p>ขยะ/ของเสีย<br />
      (Waste management)</p></td>
    <td>มีการตรียมภาชนะจัดเก็บขยะอย่างเหมาะสมตามที่บริษัทฯ กำหนด</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_e_3_result"  value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_e_3_result"  value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_e_3_result"  value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_e_3_detail" type="text"   size="34" /></td>
  </tr>
  <tr>
    <td>สารเคมี (Chemical)</td>
    <td>มีการจัดเก็บสารเคมีอย่างเหมาะสม</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_e_4_result"value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_e_4_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_e_4_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_e_4_detail" type="text"  size="34" /></td>
  </tr>
  <tr>
    <td>อากาศ (Air)</td>
    <td>มีการระบายอากาศที่ดี</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_e_5_result" value="OK"  />
      OK</label>
      <input type="radio" name="check_sheet_e_5_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_e_5_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_e_5_detail"  type="text"  size="34" /></td>
  </tr>
  <tr>
    <td rowspan="14" align="center">S</td>
    <td rowspan="5"><p>ระเบียบบริษัทฯ <br />
      (Company's regulations)</p></td>
    <td>พนักงานเเต่งกายเรียบร้อยและติดบัตรประจำตัว</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_1_1_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_s_1_1_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio"  name="check_sheet_s_1_1_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_s_1_1_detail" type="text"   size="34" /></td>
  </tr>
  <tr>
    <td>ไม่มีเด็กอายุต่ำกว่า 18 ปี อยู่ในพื้นที่ปฏิบัติงาน</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_1_2_result"value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_s_1_2_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_1_2_result"value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_s_1_2_detail" type="text"   size="34" /></td>
  </tr>
  <tr>
    <td>มีป้ายเตือนความปลอดภัยอยู่พื้นที่ปฏิบัติงาน</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_1_3_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_s_1_3_result"value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_1_3_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_s_1_3_detail" type="text"   size="34" /></td>
  </tr>
  <tr>
    <td>ไม่วางของ/วัสดุ กีดขวางอุปกรณ์ดับเพลิง</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_1_4_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_s_1_4_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_1_4_result" value="N/A"   />
      N/A</label></td>
    <td><input  name="check_sheet_s_1_4_detail"  type="text"  size="34" /></td>
  </tr>
  <tr>
    <td>มีหัวหน้าควบคุมการปฏิบัติงาน</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_1_5_result" value="OK" />
      OK</label>
      <input type="radio" name="check_sheet_s_1_5_result" value="NG"  />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_1_5_result" value="N/A" />
      N/A</label></td>
    <td><input name="check_sheet_s_1_5_detail" type="text"   size="34" /></td>
  </tr>
  <tr>
    <td rowspan="5"><p>อุปกรณ์/เครื่องมือ/เครื่องจักร<br />
      (Fire extinghuisment equipments)</p></td>
    <td>อุปกรณ์ เครื่องมือ เครื่องจักร อยู่ในสภาพที่สมบูรณ์</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_2_1_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_s_2_1_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_2_1_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_s_2_1_detail" type="text"  size="34" /></td>
  </tr>
  <tr>
    <td>มีฝาครอบ/ป้องกันในส่วนที่อันตรายอย่างเหมาะสม</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_2_2_result" value="OK"  />
      OK</label>
      <input type="radio" name="check_sheet_s_2_2_result" value="NG"  />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_2_2_result" value="N/A" />
      N/A</label></td>
    <td><input name="check_sheet_s_2_2_detail" type="text"  size="34" /></td>
  </tr>
  <tr>
    <td>เต้ารับ/เต้าเสียบอยู่ในสภาพไม่แตกหรือชำรุด</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_2_3_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_s_2_3_result" value="NG" />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_2_3_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_s_2_3_detail" type="text"   size="34" /></td>
  </tr>
  <tr>
    <td>สายไฟฟ้าที่ต่อกับเครื่องไม่ขาดหรือชำรุด</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_2_4_result" value="OK" />
      OK</label>
      <input type="radio" name="check_sheet_s_2_4_result" value="NG"  />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_2_4_result" value="N/A" />
      N/A</label></td>
    <td><input name="check_sheet_s_2_4_detail" type="text"   size="34" /></td>
  </tr>
  <tr>
    <td>มีการติดตั้งสายดินป้องกันไฟฟ้าช็อต</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_2_5_result"value="OK"  />
      OK</label>
      <input type="radio" name="check_sheet_s_2_5_result" value="NG"  />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_2_5_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_s_2_5_detail" type="text"  size="34" /></td>
  </tr>
  <tr>
    <td>นั่งร้าน/บันได (Scaffold/ladder)</td>
    <td>นั่งร้านมีสภาพมั่นคงเเข็งเเรง</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_3_result" value="OK"  />
      OK</label>
      <input type="radio" name="check_sheet_s_3_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_3_result" value="N/A"  />
      N/A</label></td>
    <td><input name="check_sheet_s_3_detail" type="text"  size="34" /></td>
  </tr>
  <tr>
    <td><p>อุปกรณ์ (PEE<br />
      Personal Protective Equipment)</p></td>
    <td><p>มีการจัดเตรียมอุปกรณ์คุ้มครองความปลอดภัย<br />
      ให้กับพนักงานอย่างเพียงพอและเหมาะสม<br />
      (หมวกนิรภัย เเว่นนิรภัย หน้ากาก กระบังหน้า/เเว่นตาเชื่อม <br />
      ที่ครอบหู ถุงมือ เข็มขัดนิรภัย รองเท้านิรภัย) </p></td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_4_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_s_4_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_4_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_s_4_detail" type="text"   size="34" /></td>
  </tr>
  <tr>
    <td rowspan="2"><p>พื้นที่ปฏิบัติงาน<br />
      (Working conditions)</p></td>
    <td><p>ไม่มีสารไวไฟในพื้นที่/หรือมีการเตรียมอุปกรณ์ดับเพลิง<br />
      ประจำพื้นที่ปฏิบัติงานอย่างน้อย 1 ชุด</p></td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_5_1_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_s_5_1_result" value="NG"  />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_5_1_result" value="N/A"  />
      N/A</label></td>
    <td><input name="check_sheet_s_5_1_detail" type="text"  size="34" /></td>
  </tr>
  <tr>
    <td>มีการปิดกั้นพื้นที่อย่างเหมาะสม</td>
    <td colspan="3"><label>
      <input type="radio" name="check_sheet_s_5_2_result" value="OK"   />
      OK</label>
      <input type="radio" name="check_sheet_s_5_2_result" value="NG"   />
      <label>NG</label>
      <label>
        <input type="radio" name="check_sheet_s_5_2_result" value="N/A"   />
      N/A</label></td>
    <td><input name="check_sheet_s_5_2_detail"  type="text"   size="34" /></td>
  </tr>
  <tr>
    <td height="272" colspan="7"><p>หมายเหตุ : ผู้รับเหมา เจ้าของ หรือเจ้าหน้าที่ความปลอดภัยในการทำงาน รับผิดชอบในการตรวจสอบ</p>
    <table width="1014" height="232" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="209" rowspan="5" align="center"><p>ประเภทงาน (Type of work)</p>
          <p></p></td>
        <td width="461"><label>งานก่อเกิดประกายไฟ/ความร้อน</label>
(Hot work)</td>
        <td width="222">การตรวจสอบตาม GA-ESSF-011<br />
inspection by risk </td>
        <td width="122"><label>
          <input type="radio" name="check_sheet_hot_work" value="01"   />
          OK</label>
          <br />
          <label>
            <input type="radio" name="check_sheet_hot_work" value="02"   />
            NG</label></td>
      </tr>
      <tr>
        <td>งานที่สูงจากพื้นดิน/พื้นระดับตั้งแต่ 1.5 ม.ขึ้นไป (High level work) </td>
        <td>การตรวจสอบตาม GA-ESSF-012<br />
inspection by risk </td>
        <td><label>
          <input type="radio" name="check_sheet_high_work" value="01"  />
          OK</label>
          <br />
          <label>
            <input type="radio" name="check_sheet_high_work" value="02"   />
            NG</label></td>
      </tr>
      <tr>
        <td>งานในพื้นที่อับอากาศ
      (Confined space work)</td>
        <td>การตรวจสอบตาม GA-ESSF-013<br />
inspection by risk </td>
        <td><label>
          <input type="radio" name="check_sheet_space_work" value="01"   />
          OK</label>
          <br />
          <label>
            <input type="radio" name="check_sheet_space_work" value="02"   />
            NG</label></td>
      </tr>
      <tr>
        <td>งานที่เกี่ยวข้องกับกระเเสไฟฟ้ามากกว่า 220 V. (Electrical work) </td>
        <td>การตรวจสอบตาม GA-ESSF-014<br />
inspection by risk </td>
        <td><label>
          <input type="radio" name="check_sheet_electrical_work" value="01"   />
          OK</label>
          <br />
          <label>
            <input type="radio" name="check_sheet_electrical_work" value="02"   />
            NG</label></td>
      </tr>
      <tr>
        <td height="46">งานที่เกี่ยวข้องกับสารเคมีอันตราย (Hazardous chemical substanes work) </td>
        <td>การตรวจสอบตาม GA-ESSF-015<br />
inspection by risk </td>
        <td><label>
          <input type="radio" name="check_sheet_chemical_work" value="01"  />
          OK</label>
          <br />
          <label>
            <input type="radio" name="check_sheet_chemical_work" value="02"  />
            NG</label></td>
      </tr>
    </table>
    
  <tr>
    <td colspan="6" rowspan="3">
      <table width="100%" height="152" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2"><h3 align="center"> Inspector </h3> </td>
          </tr>
        <tr>
          <td width="49%">ชื่อ (Name) :
            <input name="check_sheet_inspector_name" type="text" size="45" maxlength="100"   /></td>
          <td width="51%">นามสกุล (Surname) :
            <input name="check_sheet_inspector_surname" type="text" size="45" maxlength="100" /></td>
        </tr>
        <tr>
          <td colspan="2">บริษัท (Company) :
            <input name="check_sheet_inspector_company" type="text" size="80" maxlength="100"   /></td>
          </tr>
      </table>
      <p>
        <label><br />
        </label>
        <input name="permit_sheet_date" type="text" value="<?php echo date("d-m-Y");   ?> " readonly="readonly"/>
      </p></td>
    <td height="37" align="center" bgcolor="#808080"><h3 align="center"> Inspector </h3> </td>
  </tr>
  <tr>
    <td height="165">&nbsp;</td>
  </tr>
  <tr>
    <td height="45" align="center"><input type="hidden" name="permit_sheet_no_id" />      <input type="submit" value="Add Checksheet"   align="right"/></td>
  </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
