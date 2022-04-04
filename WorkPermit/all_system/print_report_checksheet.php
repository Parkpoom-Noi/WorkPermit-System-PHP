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
<style type="text/css">
<!--
.italic {
	font-size: 36px;
	font-style: italic;
}
-->
</style></head>
<script>
function myFunction() {
    window.print();
	window.location.href = 'report_checksheet.php?permit_sheet_no_id=<?php echo $row_Recordset1['permit_sheet_no_id']; ?>';
}
 
</script>
<body Onload="myFunction();" >

<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hitachi chemical Automotive Products (Thailand) Co.,Ltd.</h3>
<span style="text-align: center"></span>
<p align="right"> Permit No. <u><font color="#0000FF"> <?php echo $row_Recordset1['permit_sheet_no_id']; ?> </font></u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p align="center">แบบตรวจความพร้อมการปฏิบัติงานของผู้รับเหมา</p>

<form method="POST" name="form1"  ><table width="1016" height="1178" border="1" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td colspan="2" bgcolor="#808080" align="center" height="30"><strong>Check Points</strong></td>
    <td width="423" bgcolor="#808080" align="center"><strong>List</strong></td>
    <td width="37" align="center" bgcolor="#808080"><strong>&nbsp;Result&nbsp;</strong></td>
    <td width="244" bgcolor="#808080" align="center"><strong>Detail</strong></td>
  </tr>
  <tr>
    <td width="35" height="31" align="center">Q</td>
    <td width="267">การอบรมพนักงาน</td>
    <td>พนักงานผ่านการทดสอบความเข้าใจด้าน SOH&amp;E</td>
    <td><?php echo $row_Recordset1['check_sheet_q_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_q_detail']; ?></td>
  </tr>
  <tr>
    <td rowspan="5" align="center">E</td>
    <td rowspan="2">น้ำเสีย (Waste water management)</td>
    <td height="33">มีการจัดการกับน้ำเสียได้อย่างเหมาะสม</td>
    <td><?php echo $row_Recordset1['check_sheet_e_1_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_e_1_detail']; ?></td>
  </tr>
  <tr>
    <td height="31">มีการปิดกั้นรางน้ำฝน (หากจำเป็น)</td>
    <td><?php echo $row_Recordset1['check_sheet_e_2_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_e_2_detail']; ?></td>
  </tr>
  <tr>
    <td height="32"><p>ขยะ/ของเสีย (Waste management)</p></td>
    <td>มีการตรียมภาชนะจัดเก็บขยะอย่างเหมาะสมตามที่บริษัทฯ กำหนด</td>
    <td><?php echo $row_Recordset1['check_sheet_e_3_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_e_3_detail']; ?></td>
  </tr>
  <tr>
    <td height="29">สารเคมี (Chemical)</td>
    <td>มีการจัดเก็บสารเคมีอย่างเหมาะสม</td>
    <td><?php echo $row_Recordset1['check_sheet_e_4_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_e_4_detail']; ?></td>
  </tr>
  <tr>
    <td height="28">อากาศ (Air)</td>
    <td>มีการระบายอากาศที่ดี</td>
    <td><?php echo $row_Recordset1['check_sheet_e_5_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_e_5_detail']; ?></td>
  </tr>
  <tr>
    <td rowspan="14" align="center">S</td>
    <td rowspan="5"><p>ระเบียบบริษัทฯ (Company's regulations)</p></td>
    <td height="31">พนักงานเเต่งกายเรียบร้อยและติดบัตรประจำตัว</td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_1_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_1_detail']; ?></td>
  </tr>
  <tr>
    <td height="29">ไม่มีเด็กอายุต่ำกว่า 18 ปี อยู่ในพื้นที่ปฏิบัติงาน</td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_2_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_2_detail']; ?></td>
  </tr>
  <tr>
    <td height="33">มีป้ายเตือนความปลอดภัยอยู่พื้นที่ปฏิบัติงาน</td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_3_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_3_detail']; ?></td>
  </tr>
  <tr>
    <td height="30">ไม่วางของ/วัสดุ กีดขวางอุปกรณ์ดับเพลิง</td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_4_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_4_detail']; ?></td>
  </tr>
  <tr>
    <td height="28">มีหัวหน้าควบคุมการปฏิบัติงาน</td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_5_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_1_5_detail']; ?></td>
  </tr>
  <tr>
    <td rowspan="5"><p>อุปกรณ์/เครื่องมือ/เครื่องจักร<br />
      (Fire extinghuisment equipments)</p></td>
    <td height="29">อุปกรณ์ เครื่องมือ เครื่องจักร อยู่ในสภาพที่สมบูรณ์</td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_1_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_1_detail']; ?></td>
  </tr>
  <tr>
    <td height="31">มีฝาครอบ/ป้องกันในส่วนที่อันตรายอย่างเหมาะสม</td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_2_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_2_detail']; ?></td>
  </tr>
  <tr>
    <td height="32">เต้ารับ/เต้าเสียบอยู่ในสภาพไม่แตกหรือชำรุด</td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_3_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_3_detail']; ?></td>
  </tr>
  <tr>
    <td height="27">สายไฟฟ้าที่ต่อกับเครื่องไม่ขาดหรือชำรุด</td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_4_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_4_detail']; ?></td>
  </tr>
  <tr>
    <td height="34">มีการติดตั้งสายดินป้องกันไฟฟ้าช็อต</td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_5_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_2_5_detail']; ?></td>
  </tr>
  <tr>
    <td height="28">นั่งร้าน/บันได (Scaffold/ladder)</td>
    <td>นั่งร้านมีสภาพมั่นคงเเข็งเเรง</td>
    <td><?php echo $row_Recordset1['check_sheet_s_3_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_3_detail']; ?></td>
  </tr>
  <tr>
    <td height="86"><p>อุปกรณ์<br />
(PEEPersonal Protective Equipment)</p></td>
    <td><p>มีการจัดเตรียมอุปกรณ์คุ้มครองความปลอดภัย<br />
      ให้กับพนักงานอย่างเพียงพอและเหมาะสม<br />
      (หมวกนิรภัย เเว่นนิรภัย หน้ากาก กระบังหน้า/เเว่นตาเชื่อม <br />
      ที่ครอบหู ถุงมือ เข็มขัดนิรภัย รองเท้านิรภัย) </p></td>
    <td><?php echo $row_Recordset1['check_sheet_s_4_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_4_detail']; ?></td>
  </tr>
  <tr>
    <td rowspan="2"><p>พื้นที่ปฏิบัติงาน<br />
      (Working conditions)</p></td>
    <td height="51"><p>ไม่มีสารไวไฟในพื้นที่/หรือมีการเตรียมอุปกรณ์ดับเพลิง<br />
      ประจำพื้นที่ปฏิบัติงานอย่างน้อย 1 ชุด</p></td>
    <td><?php echo $row_Recordset1['check_sheet_s_5_1_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_5_1_detail']; ?></td>
  </tr>
  <tr>
    <td height="28">มีการปิดกั้นพื้นที่อย่างเหมาะสม</td>
    <td><?php echo $row_Recordset1['check_sheet_s_5_2_result']; ?></td>
    <td><?php echo $row_Recordset1['check_sheet_s_5_2_detail']; ?></td>
  </tr>
  <tr>
    <td height="269" colspan="5">หมายเหตุ : ผู้รับเหมา เจ้าของ หรือเจ้าหน้าที่ความปลอดภัยในการทำงาน รับผิดชอบในการตรวจสอบ
    <table width="1020" height="232" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="206" rowspan="5" align="center"><p>ประเภทงาน (Type of work)</p>
          <p></p></td>
        <td width="457"><label>งานก่อเกิดประกายไฟ/ความร้อน</label>
(Hot work)</td>
        <td width="220">การตรวจสอบตาม GA-ESSF-011<br />
inspection by risk </td>
        <td width="127"><?php echo $row_Recordset1['check_sheet_hot_work']; ?></td>
      </tr>
      <tr>
        <td>งานที่สูงจากพื้นดิน/พื้นระดับตั้งแต่ 1.5 ม.ขึ้นไป (High level work) </td>
        <td>การตรวจสอบตาม GA-ESSF-012<br />
inspection by risk </td>
        <td><?php echo $row_Recordset1['check_sheet_high_work']; ?></td>
      </tr>
      <tr>
        <td>งานในพื้นที่อับอากาศ
      (Confined space work)</td>
        <td>การตรวจสอบตาม GA-ESSF-013<br />
inspection by risk </td>
        <td><?php echo $row_Recordset1['check_sheet_space_work']; ?></td>
      </tr>
      <tr>
        <td>งานที่เกี่ยวข้องกับกระเเสไฟฟ้ามากกว่า 220 V. (Electrical work) </td>
        <td>การตรวจสอบตาม GA-ESSF-014<br />
inspection by risk </td>
        <td><?php echo $row_Recordset1['check_sheet_electrical_work']; ?></td>
      </tr>
      <tr>
        <td height="46">งานที่เกี่ยวข้องกับสารเคมีอันตราย (Hazardous chemical substanes work) </td>
        <td>การตรวจสอบตาม GA-ESSF-015<br />
inspection by risk </td>
        <td><?php echo $row_Recordset1['check_sheet_chemical_work']; ?></td>
      </tr>
    </table>
    
  <tr>
    <td height="196" colspan="5">
    <table width="1021" height="197" border="1" cellpadding="0" cellspacing="0" >
        <tr>
          <th width="778" height="37" scope="col" align="left"><u><strong>ผู้รับเหมา (Contractor chief) </strong></u></th>
          <th width="237" bgcolor="#808080" scope="col">Inspector</th>
        </tr>
        <tr>
          <td height="30" align="left">ชื่อ (Name) : <?php echo $row_Recordset1['check_sheet_inspector_name']; ?> &nbsp;&nbsp; <?php echo $row_Recordset1['check_sheet_inspector_surname']; ?></td>
          <td rowspan="3" align="center" class="italic"><?php echo $row_Recordset1['check_sheet_inspector_name']; ?></td>
        </tr>
        <tr>
          <td height="30">บริษัท (Company) : <?php echo $row_Recordset1['check_sheet_inspector_company']; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
