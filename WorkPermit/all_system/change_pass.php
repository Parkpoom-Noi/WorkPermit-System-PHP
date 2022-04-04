
<?php

	
	mysql_connect("localhost","root","P@88w0rd");
	mysql_select_db("workpermit");
	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
?>
<html>
<head>
<title>Change Password</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<body>
<script language="javascript">
function fncSubmit()
{

	

	if(document.form1.txtPassword.value == "")
	{
		alert('Please input Password');
		document.form1.txtPassword.focus();		
		return false;
	}	

	if(document.form1.txtConPassword.value == "")
	{
		alert('Please input Confirm Password');
		document.form1.txtConPassword.focus();		
		return false;
	}	

	if(document.form1.txtPassword.value != document.form1.txtConPassword.value)
	{
		alert('Confirm Password Not Match');
		document.form1.txtConPassword.focus();		
		return false;
	}	

	

	document.form1.submit();
}
</script>

<form name="form1" method="post" action="save_profile.php" OnSubmit="return fncSubmit();">

 <h2 align="center">Change Password</h2>
  <table width="400" height="205" border="0"  align="center" class="table table-hover"  style="width: auto; height:auto;"   >
    <tbody>
      <tr>
        <td width="200" bgcolor="#808080"> <strong>&nbsp;UserID</strong></td>
        <td width="200">
          <?php echo $objResult["UserID"];?>
        </td>
      </tr>
      <tr>
        <td bgcolor="#808080"> &nbsp;<strong>Username</strong></td>
        <td>
          <?php echo $objResult["Username"];?>
        </td>
      </tr>
      <tr>
        <td bgcolor="#808080"> <strong>&nbsp;Password</strong></td>
        <td><input name="txtPassword" type="password" id="txtPassword" value="<?php echo $objResult["Password"];?>" class="form-control" style="width: auto;"  >
        </td>
      </tr>
      <tr>
        <td bgcolor="#808080"> <strong>&nbsp;Confirm Password</strong></td>
        <td><input name="txtConPassword" type="password" id="txtConPassword" value="<?php echo $objResult["Password"];?>" class="form-control" style="width: auto;"  >
        </td>
      </tr>
      <tr>
        <td bgcolor="#808080"><strong>&nbsp;Name</strong></td>
        <td><?php echo $objResult["Name"];?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Save"  class="btn"  > </td>
      </tr>
    </tbody>
  </table>
  <br>
</form>
<br>
    <br> <br>
    <br>
    <br>
    <br> <br>
    <br>
    <br>
</body>
</html>