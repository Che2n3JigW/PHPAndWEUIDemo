<?php
//获取提交的参数
$no = $_POST["no"];
$password = $_POST["password"];


//组装SQL语句
$sql = "select * from t_user where no = '$no' and password = '$password'";

//链接数据库服务器、链接数据库，执行sql语句
$conn = @mysql_connect('127.0.0.1','root','');
@mysql_select_db('stu',$conn);
//设置编码
@mysql_query("set names 'utf8'");//读库 

//update、delete、insert返回的是影响行数，成功：1
//select不管存在否都返回是记录集（判断记录集有没有数据）
$rs = @mysql_query($sql);

$array = array();

//判断增加是否成功，如果成功返回前台true，否则false
if($row = mysql_fetch_assoc($rs)){//将结果集下移一行，判断是否存在数据
	$array["success"] = true;
}else{
	$array["success"] = false;
}
echo(json_encode($array));
?>