<?php
//mysql config
$address="100.98.146.94";  //mysql host
$database="whmcs";  //mysql database
$username="czp";  //mysql username
$password="123456789";  //mysql password
$separator=" ";  //choose a separator
$column=array(  //set to true for display the column
    0=>true,  //id
    1=>true,  //card
    2=>false  //credit
);

mysql_connect($address,$username,$password);
mysql_select_db($database);
$result=mysql_query("SELECT * FROM kami");
if($result)
{
    while($row=mysql_fetch_row($result))
    {
        for($i=0;$i<mysql_num_fields($result);$i++)
        {
            if($column[$i])
            {
                if($i!=0) echo $separator;
                echo $row[$i];
            }
        }
        echo "</br>";
    }
} 
else
{
    echo "数据库连接失败</br>";
}

?>
