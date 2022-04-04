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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";

mysql_select_db($database_workpermit, $workpermit);
if (isset($_POST['word'])) 
{
  $searchword = $_POST['word'];
$query_Recordset1 =  "SELECT * FROM permit_sheet WHERE permit_sheet_no_id LIKE '%".$searchword."%' OR permit_sheet_incharge_name LIKE '%".$searchword."%' OR permit_sheet_start_date  LIKE '%".$searchword."%' OR permit_sheet_end_date LIKE '%".$searchword."%' OR permit_sheet_company LIKE '%".$searchword."%' OR permit_sheet_start_time LIKE '%".$searchword."%' OR permit_sheet__end_time LIKE '%".$searchword."%' OR permit_sheet_area_of LIKE '%".$searchword."%' OR permit_sheet_hot_work LIKE '%".$searchword."%' OR permit_sheet_space_work LIKE '%".$searchword."%' OR permit_sheet_high_work LIKE '%".$searchword."%' OR permit_sheet_elec_work LIKE '%".$searchword."%' OR permit_sheet_chemical_work LIKE '%".$searchword."%' OR permit_sheet_anouther_work LIKE '%".$searchword."%' OR permit_sheet_support_work LIKE '%".$searchword."%'" ;
}
else 
{
	$query_Recordset1 =  "SELECT * FROM permit_sheet ";
}

$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $workpermit) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Workpermit Search</title>
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

<body>

<h2 align="center"> Workpermit Search<u> <font color="#0000FF"></font> </u> </h2> 
<table width="986" border="0" align="center"   class="table table-hover"  style="width: auto; height:auto;">
  <tr height="40" bgcolor="#A0A0A4" border="50" bordercolor="#000000" align="center">
    <th width="90" scope="col"><center>Permit No.</center></th>
    <th width="120" scope="col"><center>Work Date</center></th>
    <th width="120" scope="col"><center>Company</center></th>
    <th width="120" scope="col"><center>Time</center></th>
    <th width="150" scope="col"><center>Area</center></th>
    <th width="140" scope="col"><center>In charge</center></th>
    <th width="100" scope="col"><center>Checksheet</center></th>
    <th width="120" scope="col"><center>Menu</center></th>
  </tr>
  <?php do { ?>
    <tr height="80" align="center">
      <td><a href="report_workpermit.php?permit_sheet_no_id=<?php echo $row_Recordset1['permit_sheet_no_id']; ?>"><?php echo $row_Recordset1['permit_sheet_no_id']; ?></a></td>
      <td><?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_start_date'])); ?><br />
        To <br />
        <?php echo date("d-m-Y", strtotime ($row_Recordset1['permit_sheet_end_date'])); ?></td>
      <td><?php echo $row_Recordset1['permit_sheet_company']; ?></td>
      <td><?php echo $row_Recordset1['permit_sheet_start_time']; ?><br />
        To<br />
        <?php echo $row_Recordset1['permit_sheet__end_time']; ?></td>
      <td><?php echo $row_Recordset1['permit_sheet_area_of']; ?></td>
      <td><?php echo $row_Recordset1['permit_sheet_incharge_name']; ?></td>
      <td><a href="report_checksheet.php?permit_sheet_no_id=<?php echo $row_Recordset1['permit_sheet_no_id']; ?>"> Checksheet</a></td>
      <td><a href="edit_workpermit.php?permit_sheet_no_id=<?php echo $row_Recordset1['permit_sheet_no_id']; ?>">Edit </a> &nbsp;&nbsp;<a onclick="return confirm ('Sure To Delete This Workpermit ?');"  href="delete_record_inc.php?permit_sheet_no_id=<?php echo $row_Recordset1['permit_sheet_no_id']; ?>">Delete</a></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<br />
<div align="center"><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">First</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">Previous</a>
&nbsp;&nbsp;&nbsp;หน้าที่
  <?php
for($dw_i=0;$dw_i<=$totalPages_Recordset1;$dw_i ++) {
echo '<a href="?pageNum_Recordset1=',$dw_i,'">',($dw_i+1),'</a>&nbsp;&nbsp;';	
}
?>
&nbsp;&nbsp;&nbsp;
<a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">Next</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">Last</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>


<div align="center">
  <input name="back" type="button" onclick="MM_goToURL('parent','allworkpermit.php');return document.MM_returnValue" value="Show allwork" class="btn" />
</div>

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
