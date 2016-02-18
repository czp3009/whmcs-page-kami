#whmcs-kami
whmcs适用的简易线下卡密充值页面

关键词：whmcs | page | kami | credit | 卡密 | 充值

##测试环境
Centos7 X86_64 | Apache 2.4.6 | MySQL 5.6 | PHP 5.4.16 | WHMCS 6.2.0

##主要功能
预先设定一个或若干个卡密及其对应面额。在其他销售平台上出售卡密，用户在whmcs相关页面输入线下购买的卡密后获得对应whmcs余额。完成卡密充值后即可与其他whmcs余额充值方式一样使用余额进行产品的购买和续费。

效果演示

![kami](http://dl.hiczp.com/github/kami.jpg)

ps：以下是原作者QQ 550014614 。我已经忘了是从哪里下载到的这个卡密充值，由于代码不是很完善所以自己修改了一下顺便发到github。

##文件下载
下载请直接至 [RELEASE](https://github.com/czp3009/whmcs-page-kami/releases) 页面

##文件结构
/kami.sql&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mysql数据库备份文件

/whmcs/kami.php&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卡密充值主页面

/whmcs/kami_add.php&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;管理员快速添加卡密页

/whmcs/kami_pay.php&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卡密充值结果返回页

/whmcs/templates/six/kami.tpl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卡密充值主tpl

/whmcs/templates/six/kami_fail.tpl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卡密充值失败tpl

/whmcs/templates/six/kami_success.tpl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卡密充值成功tpl

/whmcs/templates/six/kami_withoutlogin.tpl&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;卡密充值未登录tpl

##文件部署注意事项
/kami.sql 用source指令还原至你的whmcs数据库，仅有一个表，表名为kami。

/whmcs/* 部署至你的whmcs根目录，注意给予正确权限。

/whmcs/templates/six/* 放入你正在使用的模板目录内，这里的目录以whmcs6.X的默认模板”six“为例。


##使用方法
管理员首先修改文件 /whmcs/kami_add.php 中的数据库设置。位于第24行和25行，包括数据库地址和database名。

管理员通过浏览器访问 http://yourwhmcs/kami_add.php 输入生成数量、金额、数据库用户名、数据库密码进行卡密生成（这份文件仅在生成卡密时用到，平时可以删除或改为000权限来保证安全性）。

用户通过浏览器访问 http://yourwhmcs/kami.php 输入卡密进行充值，根据各种情况（未登录、已登录、充值失败、充值成功）会返回各种提示。充值成功后将会增加用户余额。

##继续开发注意事项
以下是whmcs页面和模板开发帮助文档，继续开发前请务必阅读

[http://docs.whmcs.com/Creating_Pages](http://docs.whmcs.com/Creating_Pages)

[http://docs.whmcs.com/Template_Syntax](http://docs.whmcs.com/Template_Syntax)

LICENSE

[https://github.com/czp3009/whmcs-page-kami/blob/master/LICENSE](https://github.com/czp3009/whmcs-page-kami/blob/master/LICENSE)
