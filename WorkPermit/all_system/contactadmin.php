<?php 
function contract_admin_number($length=5) {
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
<title>Contract Admin</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>

<body  >
<br />
<h2 align="center"> Contact Admin</h2>

<form id="form1" name="form1" method="post" action="phpSendMailContactForm.php">
  <table width="631" height="418" border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td colspan="2">ชื่อ (Name)<span id="sprytextfield1">
        <label>
          <input name="contract_admin_name" type="text" value="<?php echo $objResult["Name"];?>"  size="30" maxlength="30" class="form-control" style="width: auto;" />
        </label>
      </span></td>
    </tr>
    <tr>
      <td colspan="2">E-mail address<span id="sprytextfield2">
      <label>
        <input name="contract_admin_e_mail"  type="text" value="<?php echo $objResult["member_email"];?>"  size="40" maxlength="40" class="form-control" style="width: auto;" />
      </label>
      <span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
    </tr>
    <tr>
      <td height="43" colspan="2"><p>ฝ่าย (Dept.)
          <span id="sprytextfield3">
          <label>
            <select  name="contract_admin_dept"  class="form-control" style="width: auto;" />
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
          </label>
      </span></p></td>
    </tr>
    <tr>
      <td height="44" colspan="2">หน่วยงาน/แผนก (Section/Div)<span id="sprytextfield4">
      <label>
         <select  name="contract_admin_section"  class="form-control" style="width: auto;" />
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
      </label>
      </span></td>
    </tr>
    <tr>
      <td height="39" colspan="2">เลขที่ใบเวิร์กเพอมิทที่ต้องการแก้ไข (Permit No.)<span id="sprytextfield5">
        <label>
          <input type="text" name="contract_admin_permit_no" value="" class="form-control" style="width: auto;" />
        </label>
      </span></td>
    </tr>
    <tr>
      <td height="41" colspan="2"><p>รายละเอียด (Detail)</p></td>
    </tr>
    <tr>
      <td height="93" colspan="2"><span id="sprytextfield6">
        <label>
          <textarea name="contract_admin_detail" cols="100" rows="5" class="form-control" style="width: auto; height:auto;" ></textarea>
        </label>
      </span></td>
    </tr>
    <tr>
      <td width="217" height="71">
        <div style="display: none" >
          <label>
            <input type="text" name="contract_admin_ordinal" id="contract_admin_ordinal" value="<?php echo date("dmy") , contract_admin_number(5); ?> "    />
          </label>
        </div>
        <label>
          <center>
      </center></label><input type="hidden" name="MM_insert" value="form1" /></td>
      <td width="414"><input type="submit" value="Send submit" class="btn" /></td>
    </tr>
  </table>
</form>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
//-->
</script>
<br>
    <br> <br>
    <br>
    <br>
    <br> <br>
    <br>
    <br>
</body>
</html>