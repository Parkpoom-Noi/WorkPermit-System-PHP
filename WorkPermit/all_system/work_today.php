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

mysql_select_db($database_workpermit, $workpermit);
$query_Recordset1 = "SELECT * FROM permit_sheet WHERE permit_sheet_end_date >= curdate() AND permit_sheet_start_date <= curdate()";
$Recordset1 = mysql_query($query_Recordset1, $workpermit) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
	<body >
  <br>

       	<h3 align = 'center'>การเข้ามาปฏิบัติงานของผู้รับเหมาภายนอกวันนี้ </h3>
        

       


<table width="1058" border="0" align="center"  class="table table-hover"  style="width: auto; height:auto;" >
   	       <tr height="40" bgcolor="#A0A0A4" border="50" bordercolor="#000000" align="center">
   	         <th width="50" scope="col"> <center> ที่ </center></th>
   	         <th width="100" scope="col"><center> Permit No.</center></th>
   	         <th width="120" scope="col"><center> เริ่ม-ปิดงาน</center></th>
   	         <th width="150" scope="col"><center> ผู้รับเหมา</center></th>
   	         <th width="100" scope="col"><center> ช่วงเวลา</center></th>
   	         <th width="200" scope="col"><center> รายละเอียด</center></th>
   	         <th width="60" scope="col"><center> จำนวน</center></th>
   	         <th width="150" scope="col"><center> พื้นที่</center></th>
   	         <th width="140" scope="col"><center> หัวหน้างาน</center></th>
  </tr>
      
      	<?php  $c=1; for ($i = 1; $i <= $row_Recordset1; $i++) { ?>
        <?php do { ?>
          <tr align="center" bgcolor="#FFFFFF" height="80">
            <td align="center"><?php echo $c;  ?></td>
            <td align="center"><?php echo $row_Recordset1['permit_sheet_no_id']; ?></td>
            <td align="center"><?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_start_date'])); ?><br>
            ถึง <br><?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_end_date'])); ?></td>
            <td align="center"><?php echo $row_Recordset1['permit_sheet_company']; ?></td>
            <td  align="center"><p><?php echo $row_Recordset1['permit_sheet_start_time']; ?><br>
              ถึง<br><?php echo $row_Recordset1['permit_sheet__end_time']; ?>
            </p></td>
            <td align="center"><?php echo $row_Recordset1['permit_sheet_detail']; ?></td>
            <td align="center"><?php echo $row_Recordset1['permit_sheet_no_of_work']; ?></td>
            <td align="center"><?php echo $row_Recordset1['permit_sheet_area_of']; ?></td>
            <td align="center"><?php echo $row_Recordset1['permit_sheet_chief']; ?></td>
        </tr>
		  <?php count($c++)  ?>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>

		  <?php } ?>
  
    </table></form>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br> <br>
    <br>
    <br>
    <br> <br>
    <br>
    <br>
     

</body>
</html>
<?php
mysql_free_result($Recordset1);

?>
