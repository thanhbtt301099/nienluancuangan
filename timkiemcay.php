<!-- Chưa hiểu -->

<!DOCTYPE html>
<html>
<head>
	<title>SEARCH PAGE</title>
    <meta charset="utf8">
	<link rel="stylesheet" href="timkiemcay.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
       <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
</head>
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
                     <div id="show" onclick="showss(this.value)"></div> 
                     </form>
                    
                   
                  
                   
                </div>
            </div>

	</div>
	<div id="content">
	<?php 
	include "connect.php";
	$a[]="";
	$b[]="";
	function convert_vi_to_en($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
		$str = preg_replace("/(đ)/", "d", $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
		$str = preg_replace("/(Đ)/", "D", $str);
		//$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
		return $str;
	}
	foreach ($sql = $con->query("SELECT * FROM db_cay") as $value){

		array_push($a,$value['Mact']);
	   
		  }
		  foreach ($sql = $con->query("SELECT * FROM db_cay") as $value1){
			  
		array_push($b,strtolower(convert_vi_to_en($value1['Tencay'])));
		  }
		$c=array_combine($a,$b);
$search=$_GET['search'];
$key=convert_vi_to_en($search);
echo "</br>";
		   $hint = "";
if ($key !== "") {
  //$q = strtolower($q);
  $len=strlen($key);
  $dem=0;
  foreach($c as $key1=>$name) {
    if (stristr($name,$key )) {
      // echo $key1;
      if ($hint === "") {
		$sql = $con->query("SELECT * FROM db_cay WHERE Mact ='$key1'");
		$sql = $sql->fetch_assoc();
		//  "<a href=detail_trees.php?id=".$sql['Mact']."> ".$sql['Tencay']." </a></br>";
	$hint =	
				"<h3>".$sql['Tencay']."</h3> ".$sql['Dacdiem']."...<a href =chitietcay.php?id=".$sql['Mact']."> [Xem chi tiết]</a></td>
				</br>
				</br>";
				
      }
       else {
        $sql = $con->query("SELECT * FROM db_cay WHERE Mact ='$key1'");
		$sql = $sql->fetch_assoc();
       
		$hint .="<h3>".$sql['Tencay']."</h3> ".$sql['Dacdiem']."...<a href =chitietcay.php?id=".$sql['Mact']."> [Xem chi tiết]</a></td>
		</br>
		</br>";
      }
     
      $dem++;
    }
   
  }


}
echo " Khoảng $dem kết quả tìm kiếm cho với từ khóa '$search' :";
	echo "</br>";
	echo "</br>";
	echo "</br>";
echo $hint === "" ? "Không tìm thấy" : $hint;
$con->close();

?>
</div>  
</body>
<div id="footer">
    </div>
</html>