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
<title>Log In</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css">
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
<script src="css/respond.min.js"></script>
</head>
<body bgcolor="#9FD9FF">
<div id="header">
 <div id="braner"> <img src="images/braner4.jpg" alt="braner">
 

 
 
 
 </div>

  

  

</div>

<div id="navbar">
  <div id="navbarIn"><center><strong><p><h2 style="color:#FFF"> Welcome To Work Permit System.</h2></p>
    </strong>  
  </center></div>
</div>

<div id="main">
  <div id="mainin"> <center>
  <br><br>
  <h2> Username or Password is incorrect.   Please try again. </h2>
   <form action="check_login.php" method="POST"  >
      <table width="298" border="0" cellpadding="5" cellspacing="0"   class="table table-hover"  style="width: auto; height:auto;">
  <tr>
    <td width="80" height="20" bgcolor="#FFFFFF"> <strong>Username: </strong></td>
    <td width="198" bgcolor="#FFFFFF"><input name="txtUsername" type="text" id="txtUsername"  class="form-control" style="width: auto;"  /></td>
  </tr>
  <tr>
    <td height="20" bgcolor="#FFFFFF" ><strong>Password:</strong></td>
    <td bgcolor="#FFFFFF"><input name="txtPassword" type="password" id="txtPassword"  class="form-control" style="width: auto;"  /></td>
  </tr>
  <tr>
    <td height="15" bgcolor="#FFFFFF"></td>
    <td bgcolor="#FFFFFF"><input name="chk" type="checkbox" id="chk" value="on" />
      <label> จดจำการลงชื่อเข้าใช้</label></td>
  </tr>
  <tr>
    <td height="15" bgcolor="#FFFFFF"></td>
    <td bgcolor="#FFFFFF"><input type="submit" name="button" id="button" value="Log in" class="btn" /></td>
  </tr>
</table>
        </form><br><br><br><br><br> </center> </div></div>

<div id="footer">
  <div id="footerin"><center>
    <strong><p>Work permit System Version 2.0.39  Coppyright @ 2016 Created by IT Officer</p>
    </strong>  
  </center>
  </div>
</div>
</body>
</html>
