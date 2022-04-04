<?php 
	mysql_connect("localhost","root","P@88w0rd") or die(mysql_error());
	mysql_select_db("workpermit");
	
	session_start();
	if($_SESSION['UserID'] == "")
	{
		header("location:../loginfailed.php");
		exit();
	}

	if($_SESSION['Status'] != "ADMIN")
	{
		echo "This page for Admin only!";
		exit();
	}	
	

	$strSQL = "SELECT * FROM member WHERE UserID = '".$_SESSION['UserID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
 

 
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>WorkpermitSystem</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<link href="../css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="../css/index.css" rel="stylesheet" type="text/css">
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="../css/respond.min.js"></script>
</head>
<body bgcolor="#9FD9FF">
<div id="header">
 <div id="braner"> <img src="../images/braner4.jpg" alt="braner">
 

 <form action="check_login.php" method="POST" style="position:absolute;top:20px;right:5px; ">
      <table width="200" border="0" cellpadding="5" cellspacing="0">
  <tr>
    <td width="80" height="20" bgcolor="#FFFFFF"> <strong> Welcome :</strong></td>
    <td width="198" bgcolor="#FFFFFF" align="left"><?php echo $objResult["Name"];?> </td>
  </tr>
   
  
  <tr>
    <td height="15" bgcolor="#FFFFFF" align="left"></td>
    <td bgcolor="#FFFFFF"> <button type="button" onClick="MM_goToURL('parent','logout.php');return document.MM_returnValue"   >Log out </button></td>
  </tr>
</table>
        </form>
 
 
 </div>

  

  

</div>

<div id="navbar">
  <div id="navbarIn">  
  <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="page_admin.php" title="Home"> HOME</a>
      <li><a href="addworkpermit.php" title="AddWorkpermit">AddWorkpermit</a></li>
      <li><a href="myworkpermit.php?permit_sheet_incharge_name=<?php echo $objResult["Name"];?>" title="MyWorkpermit">MyWorkpermit</a></li>
      <li><a href="myapproved_admin.php?permit_sheet_soh_div_name=<?php echo $objResult["Name"];?>">MyApproved</a></li>
      <li><a href="allcontractadmin.php" title="ContactAdmin">AllContactAdmin</a></li>
      <li><a href="#" title="Procedure" class="MenuBarItemSubmenu"> Documents</a>
        <ul>
          <li><a href="document_procedure.php">Work Procedure</a></li>
          <li><a href="document_jsa.php">Job Safety Analysis</a></li>
        </ul>
      </li>
      <li><a href="allworkpermit.php">All Workpermit</a></li>
      <li><a href="#" class="MenuBarItemSubmenu">Member</a>
        <ul>
          <li><a href="add_member.php">Add member</a></li>
          <li><a href="all_member.php">All member</a></li>
        </ul>
      </li>
      <li><a href="change_pass.php">ChangePassword</a></li>
    </ul>
  </div>
</div>

<div id="main">
  <div id="mainin"> <center> <?php include("../all_system/change_pass.php"); ?> </center> </div></div>

<div id="footer">
  <div id="footerin"><center>
    <strong><p>Work permit System Version 2.0.39  Coppyright @ 2016 Created by IT Officer</p>
    </strong>  
  </center>
  </div>
</div>

<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
