<?php

use WHMCS\Database\Capsule;

define("CLIENTAREA",true);
//define("FORCESSL",true); // Uncomment to force the page to use https://

require("init.php");

$ca = new WHMCS_ClientArea();

$ca->setPageTitle("卡密充值系统");  //top-up card recharge system

$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('mypage.php','卡密充值');  //top-up card recharge

$ca->initPage();

//$ca->requireLogin(); // Uncomment this line to require a login to access this page

# To assign variables to the template system use the following syntax.
# These can then be referenced using {$variablename} in the template.

# Check login status
if (!$ca->isLoggedIn()) {
 
    # User is logged in - put any code you like here
 
    # Here's an example to get the currently logged in clients first name
    $ca->setTemplate('kami_withoutlogin');
    $ca->output();
    exit;

}

# Define the template filename to be used without the .tpl extension
$uid=$_SESSION["uid"];
if (!$uid){
    $ca->setTemplate('kami_withoutlogin');
    $ca->output();
    exit;
}
$card=$_POST["card"];
$get_credit=mysql_query("SELECT credit FROM kami WHERE card='$card'");
$_get_credit=mysql_fetch_array($get_credit);
if (!$_get_credit){
    $ca->setTemplate('kami_fail');
    $ca->output();
    exit;
}
$delete_mysql=mysql_query("DELETE FROM kami WHERE card='$card'");
$date=date("Y-m-d");
$insert_credit_info=mysql_query("INSERT INTO tblcredit (clientid,date,description,amount,relid) VALUES($uid,'$date','卡密充值',$_get_credit[0],0)");
$insert_credit=mysql_query("UPDATE tblclients SET credit=credit+$_get_credit[0] WHERE id=$uid");
if ($insert_credit_info && $insert_credit){
    $ca->assign('uid', $uid);
    $ca->assign('date', $date);
    $ca->assign('credit', $_get_credit[0]);
    $ca->setTemplate('kami_success');
} else {
    $ca->setTemplate('kami_fail');
}
$ca->output();
 ?>
