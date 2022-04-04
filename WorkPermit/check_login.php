<?php
	
	
	session_start();
	mysql_connect("localhost","root","P@88w0rd");
	mysql_select_db("workpermit");
	
	$strSQL = "SELECT * FROM member WHERE Username = '".mysql_real_escape_string($_POST['txtUsername'])."' 
	and Password = '".mysql_real_escape_string($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			header("location:loginfailed.php");
	}
	else
	{
		
		if ($_POST['chk'] == "on") {
			
			
			
				setcookie("Username",$_POST['txtUsername'],time()+3600*24*356);
				setcookie("Password",$_POST['txtPassword'],time()+3600*24*356);
				
				$_SESSION["UserID"] = $objResult["UserID"];
			    $_SESSION["Status"] = $objResult["Status"];    


			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:member_admin/page_admin.php");
				
			}
			else if ($objResult["Status"] == "APPROVED")
			{
				header("location:member_manager/page_manager.php");
				
			}
			else if ($objResult["Status"] == "AREA")
			{
				header("location:member_area/page_areaowner.php");
				
			}
			else if ($objResult["Status"] == "PM")
			{
				header("location:member_pm/page_pm.php");
				
			}
			else if ($objResult["Status"] == "M&AREA")
			{
				header("location:member_m&area/page_m&area.php");
				
			} 
			else
			{
				header("location:member_user/page_user.php");
			}
			
		}
		
		else {
			$_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];    


			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:member_admin/page_admin.php");
				
			}
			else if ($objResult["Status"] == "APPROVED")
			{
				header("location:member_manager/page_manager.php");
				
			}
			else if ($objResult["Status"] == "AREA")
			{
				header("location:member_area/page_areaowner.php");
				
			}
			else if ($objResult["Status"] == "PM")
			{
				header("location:member_pm/page_pm.php");
				
			}
			else if ($objResult["Status"] == "M&AREA")
			{
				header("location:member_m&area/page_m&area.php");
				
			} 
			else
			{
				header("location:member_user/page_user.php");
			}
			
		}
	}
	mysql_close();
?>