<!DOCTYPE html>
<?php
	session_start();
?>
<?php 
	if(isset($_SESSION['tendangnhap'])){
			$tendangnhap = $_SESSION['tendangnhap'];
		}
	else{
		header("location:loginadmin.html");
    }
?>
<html>
<head>

<meta charset="utf8">
</head>
<style>
    #link{text-align:center;}
    </style>
<link rel="stylesheet" href="chitietcay.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
       <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
       <script>
    const showResult=(value)=>{
   // document.getElementById("keyup").innerHTML = value;
                if (value.length==0) {
                  document.getElementById("show").innerHTML="";
                  document.getElementById("show").style.border="0px";
                  
                  return;
                }
                document.getElementById("show").style.color="white";
                let xmlhttp;
                
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }
                else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                
                xmlhttp.onreadystatechange=()=>{
                    if(xmlhttp.readyState==4 && xmlhttp.status==200){
                       document.getElementById("show").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", `show.php?id=`+value ,true);
                xmlhttp.send();
  }


</script>
<body>
    <div class="btn">
    <button class="input1" onclick="window.location.href='ds_cay.php'" style="width:120px;height:50px;position: absolute;">Danh sách cây</button>
        </div>
        
<div id="wrapper">
        <div id="header"></div>
        <div id="menu">
            <div class="topnav">
                <a class="active" href="pageadmin.php">Admin page</a>
                <a href="ds_trees_l1.php">Cây ăn quả</a>
                <a href="ds_trees_l2.php">Cây kiểng</a>
                <a href="ds_trees_l3.php">Cây dây leo</a>
                <a href="ds_trees_l4.php">Cây thân gỗ</a>
                <a href="ds_trees_l5.php">Cây thảo dược</a>
                <div class="search-container">
                <form action="search_page_admin.php" method ="GET" onsubmit="return signup()">
                    <input type="text" placeholder="Tìm kiếm.." name="search" >
                    <button type="submit"><i class="fa fa-search"></i></i></button>
                     <div id="show" onclick="showss(this.value)"></div> 
                     </form>
                </div>
            </div>

    </div>
    </br>
    </br>
<div id="hienthi-caytrong">
<?php 
$mact=$_GET['id'];
//  echo $mact;
include "connect.php";

$data = $con->query("SELECT Tencay,Dacdiem,Loaicay,Cachchamsoc,Hinh,Motacay FROM db_cay WHERE Mact='$mact'");
$data = $data->fetch_assoc();
	echo '<center>'.'<table frame="border" border=4 >'.'</center>';
    $data = $con->query("SELECT * FROM db_cay WHERE Mact='$mact'");
    $data = $data->fetch_assoc();
 echo "<form action= method=GET>";
	echo '<table frame="border" border=4  >';

	echo "<tr id='h1'> <td><h1>".$data['Tencay']."</h1></td></tr>";
    echo "<tr id='tr'>
       <td> <h2>Đặc điểm</h2></td>
        </tr>";
    echo "<tr id='tr'>
        <td id='td'>".$data['Dacdiem']."</td>
        </tr>";
    echo "<tr id='tr'>
        <td id='td'><center><img src='".$data['Hinh']."'></center></td>
        </tr>";	
    echo "<tr id='tr'>
        <td> <h2>Cách chăm sóc</h2></td>
         </tr>";   
    echo "<tr id='tr'>
        <td id='td'>".$data['Cachchamsoc']."</td>
        </tr>";	
    echo "<tr id='tr'>
        <td> <h2>Tổng kết</h2></td>
         </tr>";
    echo "<tr id='tr'>
        <td id='td'>".$data['Motacay']."</td>
        </tr>";
          
    
    
	echo "</table>";
    echo "</form>";


    // $data = $con->query("SELECT * FROM db_trees WHERE Mact='$mact'");
    // $data = $data->fetch_assoc();
    // echo "<form action= method=GET>";
	//     echo '<table frame="border" border=4  >';
	//     echo "</table>";
    //     echo "</form>";
    $luot=$data['Luottruycap'];
    $luot=$luot+1;
    $sql = $con->query("UPDATE db_trees SET Luottruycap='$luot' WHERE Mact ='$mact'");
$con->close();

?>
<div id="footer">
    </div>
</div>
</body>
</html>