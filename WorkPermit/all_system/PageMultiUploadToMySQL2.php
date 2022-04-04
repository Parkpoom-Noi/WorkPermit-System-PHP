<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
	 require_once('Connections/workpermit.php'); 
	
	for($i=0;$i<count($_FILES["filUpload"]["name"]);$i++)
	{
		if($_FILES["filUpload"]["name"][$i] != "")
		{
			if(move_uploaded_file($_FILES["filUpload"]["tmp_name"][$i],"files_upload/".$_POST['permit_sheet_ordinal'].$_FILES["filUpload"]["name"][$i]))
			{
 
				$strSQL = "INSERT INTO files ";
				$strSQL .="(Filesordinal,FilesName) VALUES ('" .$_POST['permit_sheet_ordinal']."','".$_POST['permit_sheet_ordinal'].$_FILES["filUpload"]["name"][$i]."')";
				$objQuery = mysql_query($strSQL);
			}
		}
	}

	 
?>
<a href="PageMultiUploadToMySQL3.php">View files</a>
</body>
</html>