<?php

use WHMCS\Database\Capsule;

define("CLIENTAREA",true);
//define("FORCESSL",true); // Uncomment to force the page to use https://

require("init.php");

$ca = new WHMCS_ClientArea();

$ca->setPageTitle("卡密充值系统");  //top-up card recharge system

$ca->addToBreadCrumb('index.php', Lang::trans('globalsystemname'));
$ca->addToBreadCrumb('mypage.php','卡密充值'); //top-up card recharge

$ca->initPage();

//$ca->requireLogin(); // Uncomment this line to require a login to access this page

# To assign variables to the template system use the following syntax.
# These can then be referenced using {$variablename} in the template.

# Check login status
if ($ca->isLoggedIn()) {
    
    # User is logged in - put any code you like here
    $ca->setTemplate('kami');

} else {
    
    # User is not logged in
    $ca->setTemplate('kami_withoutlogin');

}
    $ca->output();
    
# Define the template filename to be used without the .tpl extension

 ?>
