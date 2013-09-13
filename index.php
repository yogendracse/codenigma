<?php
session_start();
if(isset($_SESSION['username']))
header('Location: q1.php');
if(isset($_POST['submit']))
{
	unset($_POST['submit']);
	$u=$_POST['userid'];
	$p=$_POST['pass'];
	include("connect.php");
	$sql_connect=mysql_connect($host,$user,$pass) or die("cannot connect to database.please try after sometime");
		mysql_select_db($db,$sql_connect) or die("cannot find database");
		$select_user_query="SELECT * FROM `users` WHERE `username`='$u' AND `password`='$p'";
						$select_user=mysql_query($select_user_query);
						if(mysql_num_rows($select_user)==1)
						{
							session_start();
							$_SESSION['username']=$u;
							header('Location: q1.php');
						}
						else
						{
							$error_login=1;
						}
}
?>
<!DOCTYPE php PUBLIC "-//W3C//DTD Xphp 1.0 Transitional//EN" "http://www.w3.org/TR/xphp1/DTD/xphp1-transitional.dtd">
<php xmlns="http://www.w3.org/1999/xphp">
<head>
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<title>Encash Your Code !</title>

<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/ChunkFive_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('h1',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h2',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h3',{ textShadow: '1px 1px #000'});
			Cufon.replace('.back');
		</script>

</head>
<body>
<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
        <div id="site_title" style="padding-left:280px;margin-top:-30px;">
            <a href="index.php"><img src="images/logo.png" alt="logo" /></a>
			<div style="align:right;"><a><span>Welcome to Microsoft's coding event ...</span></a></div>
        </div> <!-- end of site_title -->
        <div id="templatemo_menu">
            <div class="cleaner"></div>    	
        </div>
        <div class="cleaner"></div>
    </div> <!-- end of header -->
    <div class="cleaner"></div>
</div>
    
<div id="templatemo_wrapper">

 <div class="wrapper" style="margin-bottom:-200px;">
			
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form class="login active" action="index.php" method="post">
						<h3>Login</h3>
						<div>
							<label>Username:</label>
							<input type="text" name="userid" />
						</div>
						<div>
							<label>Password: <a href="forgot_password.php" rel="forgot_password" class="forgot linkform">Forgot your password?</a></label>
							<input type="password" name="pass" />
							<?php if(isset($error_login)) echo '<p style="color:red;font-weight:bold;"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INCORRECT USERNAME OR PASSWORD</p><BR />';?>
						</div>
						<div class="bottom">
							<input type="submit" name="submit" value="Login" />
							<div class="clear"></div>
						</div>
					</form>
					<form class="forgot_password">
						<h3>Forgot Password</h3>
						<div>
							<label>Username or Email:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<input type="submit" value="Send reminder"></input>
							<a href="index.php" rel="login" class="linkform">Suddenly remebered? Log in here</a>
							<a href="register.php" rel="register" class="linkform">You don't have an account? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
    <div id="templatemo_content_bottom"></div>
    
    <div id="templatemo_footer">

        Copyright © 2012 <a href="http://microsoftclubnitr.in/">Microsoft Campus Club, NIT Rourkela</a> | All rights reserved
    
    </div> <!-- end of templatemo_footer -->
     
</div> <!-- end of wrapper -->
</body>
</php>

