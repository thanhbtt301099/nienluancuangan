<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
</head>
<title>TRA CỨU THÔNG TIN CÂY TRỒNG</title>
<style>
    #link{text-align:center;}
    </style>
<!-- <link href="css/ds_trees.css" rel="stylesheet" type="text/css" /> -->
<link rel="stylesheet" href="chitietcay_full.css">
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

  function signup(){
    var key= document.getElementById("search").value;
    var ok=true;
    if (key ==""  ){
        alert("Vui lòng điền từ khóa !");
    ok=false;
	    }else if(key == null){
            alert("Vui lòng điền từ khóa !");
             ok=false; 
                           }
	return ok;
}	

</script>
<!-- QUANG CAO -->
<script type="text/javascript" src="js/BannerFloat.js"></script>

<!-- -->
<body>

<div id="wrapper">
        <div id="header"></div>
        <div id="menu">
            <div class="topnav">
            <a class="active" href="index.php">Trang chủ</a>
                <a href="chitietcayanqua.php">Cây ăn quả</a>
                <a href="chitietcaykieng.php">Cây kiểng</a>
                <a href="chitietcaydayleo.php">Cây dây leo</a>
                <a href="chitietcaythango.php">Cây thân gỗ</a>
                <a href="chitietcaythaoduoc.php">Cây thảo dược</a>
                <div class="search-container">
                <form action="search_page.php" method ="GET" onsubmit="return signup()">
                    <input type="text" placeholder="Tìm kiếm.." id="search" name="search" onkeyup="showResult(this.value)">
                    <button type="submit"><i class="fa fa-search"></i></i></button>
                     
                     </form>
                     <div id="show" onclick="showss(this.value)"></div> 
                </div>
            </div>

    </div>
    <div id="ten-content">
        <h2><center>DANH SÁCH CÂY ĂN QUẢ</center></h2>
    </div>
    <div id="content">
    <?php
include "connect.php";  

echo "<table >" ;
foreach ($sql = $con->query("SELECT * FROM db_cay WHERE Loaicay='Kiểng' ") as $value){
    echo "<tr id='tr'>
    <td id='link' ><img src='".$value['Hinh']."'></td>
    <td style='width:700px'><h3>".$value['Tencay']."</h3></br> ".$value['Dacdiem']."...<a href =chitietcay.php?id=".$value['Mact']."> [Xem chi tiết]</a></td>
    </tr>";
    echo '</br>';
    // echo '</br>';
    }
  echo "</table>";
 
  
$con->close();
 ?>
</div>
<div id="footer">
    </div>
</body>
</html>