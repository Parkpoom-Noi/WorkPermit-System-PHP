<?php
	session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		exit();
	}
	mysql_connect("localhost","root","P@88w0rd");
	mysql_select_db("workpermit");
	
	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
		"<script>
			alert('Password not Match!);
			
		  </script>";	
		exit();
	}
	$strSQL = "UPDATE member SET Password = '".trim($_POST['txtPassword'])."' WHERE UserID = '".$_SESSION["UserID"]."' ";
	$objQuery = mysql_query($strSQL);
	
	echo "<script>
			alert('Update Password');
			window.location='changed_pass.php';
		  </script>";	
	
	
	
	 
	
	
	mysql_close();
?>