<form id="form1" name="form1" method="post" action="kami_add.php?action=sc">
  <p>生成数量：
    <label for="sl"></label>
    <input type="text" name="sl" id="sl" />
  </p>
  <p>每张卡密金额：
    <label for="value"></label>
    <input type="text" name="value" id="value" />
  </p>
  <p>用户名：
    <label for="username"></label>
    <input type="text" name="username" id="username" />
  </p>
  <p>密码：
    <label for="password"></label>
    <input type="text" name="password" id="password" />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="生成" />
  </p>
</form>
<?php
//mysql config
$address="100.98.146.94";  //mysql host
$database="whmcs";  //mysql database

$username=$_POST["username"];
$password=$_POST["password"];
mysql_connect($address,$username,$password);
mysql_select_db($database);
if ($_GET["action"]=="sc"){
echo "Get Card Successful.<br>";
$sl=$_POST["sl"];
$value=$_POST["value"];
for ($i=1;$i<=$sl;$i++){
	for ($j=1;$j<=32;$j++){
		$kami=$kami.chr(rand(65,90));
	}
	echo $kami;
	$control=mysql_query("INSERT INTO kami (card,credit) VALUE ('$kami',$value)");
    if(!$control) echo " FAIL";
    else echo " SUCCESS";
    echo "</br>";
	$kami="";
	}
}
?>
