<!--Đây là trang chủ-->
<!DOCTYPE html>
<html>
<head>
    <title>TRA CỨU THÔNG TIN CÂY TRỒNG</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<script>
const showResult=(value)=>{ //Gợi ý trong thanh tìm kiếm
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

<body>

    <div id="wrapper" >
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
                    <form action="timkiemcay.php" method ="GET" onsubmit="return signup()">
                    <input type="text" placeholder="Tìm kiếm.." id="search" name="search" onkeyup="showResult(this.value)">
                    <button type="submit"><i class="fa fa-search"></i></i></button>
                     
                     </form>
                    
                   <div id="show" onclick="showss(this.value)"></div> 
                  
                   
                </div>
            </div>

    </div>

    <div class="content">
            <div id = "left">
                <br><a>CHÀO MỪNG BẠN ĐẾN VỚI TREES DICTIONARY </a><br>
                <h3>Trang web hỗ trợ tìm kiếm, tra cứu cây trồng.</h3>
                <h3>Trees Dictionary là nơi mà kiến thức của chuyên gia đồng hành cùng những bài nghiên cứu về cây trồng đáng tin cậy.</h3>
                <p>Từ năm 2020, Trees Dictionary được sinh ra để giải quyết vấn đề về tìm kiếm phương pháp trông cây hiệu quả. Chúng tôi hợp tác với 
                    những chuyên gia uy tín, một đội ngũ những nhà nghiên cứu đã qua đào tạo và một cộng đồng tận tâm nhằm tạo ra những 
                    nội dung hướng dẫn đáng tin cậy, dễ hiểu và thân thiện trên mạng.</p>
            </div>
            
            <div id="right">
                <img src="./hinhanh/treebook.jpg" alt="treebook" width="50%" height = "50%">
            </div>
            <div class ="clear"></div>
    </div>
    <div id="hienthi" >
        <div class="col-12">
            <div class="row" >
                <?php
                include "connect.php";
                //Phần hiển thị theo lượt truy cập -- START -- //
                $Tencay=[];
                $Luottruycap=[];
                $Luottruycap_dxx=[];
                foreach ($sql = $con->query("SELECT * FROM db_cay") as $value){
                    array_push($Luottruycap,$value['Luottruycap']);
                    }
                rsort($Luottruycap); 
                $i=0;
                while($i<8){ //8 là số cây hiển thị ra trang index
                        array_push($Luottruycap_dxx,$Luottruycap[$i]);
                    $i++;
                }
                
                foreach($Luottruycap_dxx as $value){
                    $sql = $con->query("SELECT Mact FROM db_cay WHERE Luottruycap='$value'");
                    $sql = $sql->fetch_assoc();
                    $tree1= $sql['Mact'];
                    $sqlx = $con->query("SELECT * FROM db_cay WHERE Mact='$tree1'");
                    $sqlx = $sqlx->fetch_assoc();
                    
                       echo " <div class='col-3 mt-3' >
                                <img style='width: 100%; height: 250px' src='".$sqlx['Hinh']."'>
                                <br><center><a href =chitietcay.php?id=".$sqlx['Mact'].">  ".$sqlx['Tencay']." </a></center>
                        </div>";

                }
                
                //Phần hiển thị theo lượt truy cập -- END -- //
                ?>
    </div>
    <div id="footer">
    </div>
</body>
</html>