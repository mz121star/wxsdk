<?php
 include_once('base/class.MySQL.php');
define(AppId, "wx1234567890abcdef");//定义AppId，需要在微信公众平台申请自定义菜单后会得到
 
define(AppSecret, "1234567890abcdefghijklmnopqrstuv");//定义AppSecret，需要在微信公众平台申请自定义菜单后会得到
 
include("wechat.class.php");//引入微信类
 
$wechatObj = new Wechat();//实例化微信类
 $menuPostString = '{ 
"button":[
{
"name":"常用",
"sub_button":[
{
"type":"click",
"name":"每日考勤",
"key":"1100"
},
{
"type":"click",
"name":"领卡申请",
"key":"3100"
},
{
"type":"click",
"name":"短信申请",
"key":"3200"
},
{
"type":"click",
"name":"商户曝光",
"key":"2100"
},
{
"type":"click",
"name":"商户质检",
"key":"2200"
}
]
},
{
"name":"我的",
"sub_button":[
{
"type":"click",
"name":"我的考勤",
"key":"1101"
},
{
"type":"click",
"name":"我的曝光",
"key":"2101"
},
{
"type":"click",
"name":"我的质检",
"key":"2201"
},
{
"type":"click",
"name":"我的锁定",
"key":"2001"
}
]
},
{
"name":"数据",
"sub_button":[
{
"type":"click",
"name":"消费数据",
"key":"6101"
},
{
"type":"click",
"name":"激活数据",
"key":"6102"
},
{
"type":"click",
"name":"POS手册",
"key":"4100"
},
{
"type":"click",
"name":"微信指令",
"key":"0009"
}
]
}]
}';
$creatMenu = $wechatObj->creatMenu($menuPostString);//创建菜单

?>