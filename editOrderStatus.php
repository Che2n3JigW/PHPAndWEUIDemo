<?php

$id = $_POST["id"];
$status = $_POST["status"];

//组装SQL语句
$sql = "update t_order set status = $status where id = $id";

//链接数据库服务器、链接数据库，执行sql语句
$conn = @mysql_connect('127.0.0.1','root','');
@mysql_select_db('stu',$conn);
//设置编码
@mysql_query("set names 'utf8'");//读库 

//update、delete、insert返回的是影响行数，成功：1
//select不管存在否都返回是记录集（判断记录集有没有数据）
$rs = @mysql_query($sql);

$array = array();

if($rs == 1){
	$array["success"] = true;
}else{
	$array["success"] = false;
}

echo(json_encode($array));
?>