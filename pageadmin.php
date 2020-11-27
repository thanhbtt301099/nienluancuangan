<!DOCTYPE HTML>
<?php
	session_start();
?>
<html>
<head>
<title>ADMIN</title>
<style>
</style>
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header start here-->
<div class="header">
		<div class="header-main">
		       <h1>ADMIN PAGE </h1>
               <?php 
	if(isset($_SESSION['tendangnhap'])){
			$tendangnhap = $_SESSION['tendangnhap'];
		}
	else{
		header("location:loginadmin.html");
    }
    ?>
    <div class="btn">
    <button style="height:50px;width:200px" onclick="window.location.href='themcay.php'">THÊM CÂY</button><p></br></p> <button style="height:50px;width:200px"  onclick="window.location.href='ds_cay.php'">DANH SÁCH CÂY</button>
    </div>

    
    
</div>
<!--header end here-->
<div class="copyright">
	<p>© 2020 Admin Login Form.</p>
</div>
<!--footer end here-->
</body>
</html>