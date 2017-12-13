<?php

//组装SQL语句
$sql = "select * from t_order where status != '-1'";

//链接数据库服务器、链接数据库，执行sql语句
$conn = @mysql_connect('127.0.0.1','root','');
@mysql_select_db('stu',$conn);
//设置编码
@mysql_query("set names 'utf8'");//读库 

//update、delete、insert返回的是影响行数，成功：1
//select不管存在否都返回是记录集（判断记录集有没有数据）
$rs = @mysql_query($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
 <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
  <link rel="stylesheet" href="assets/css/weui.css"/>
  <link rel="stylesheet" href="assets/css/weui2.css"/>
  <link rel="stylesheet" href="assets/css/weui3.css"/>
      <script src="assets/js/zepto.min.js"></script>
      <script src="assets/js/iscroll.js"></script>
	  <script src="assets/js/swipe.js"></script>

</head>

<body ontouchstart style="background-color: #f8f8f8;">
<div class="weui_cells weui_cells_access" style="margin:0">

            <a class="weui_cell" href="javascript:;">
                <div class="weui_cell_hd">
				<img src="assets/images/my.png" alt="" style="width:60px;margin-right:5px;display:block"></div>
                <div class="weui_cell_bd weui_cell_primary">
                    <p id="name">姓名</p>
                </div>
                <div class="weui_cell_ft">个人资料</div>
            </a>
</div> 


        <div class="weui_cells_title">我的订单</div>
        <div class="weui_cells weui_cells_access">

		<?php
		while($row = @mysql_fetch_assoc($rs)){//将结果集下移一行，判断是否存在数据
		$status = "未付款";
		if($row["status"] == "4") $status = "订单已取消";
		if($row["status"] == "2") $status = "订单已付款";
		if($row["status"] == "-1") $status = "订单已删除";
		?>
		<a class="weui_cell" href="javascript:;">
			<div class="weui_cell_hd"><img src="<?php echo $row["pic"] ?>" alt="" 
			style="width:50px;margin-right:5px;display:block"></div>
			<div class="weui_cell_bd weui_cell_primary"> 
			<p><?php echo $row["name"] ?></p>
			<p><?php echo $status ?></p>
			</div>
			<div class="weui_cell_ft"></div> 
		</a>
		<div class="weui-form-preview-ft">
		<?php if($row["status"] == "1"){
		?>
                <a class="weui-form-preview-btn weui-form-preview-btn-default" href="javascript:onCancle(<?php echo $row["id"] ?>);" style="color:red">取消</a>
                <button class="weui-form-preview-btn weui-form-preview-btn-primary" onclick="javascript:onPay(<?php echo $row["id"] ?>);">付款</button>
        <?php
		}else if($row["status"] == "4"){
		?>
				<a class="weui-form-preview-btn weui-form-preview-btn-default" href="javascript:onDelete(<?php echo $row["id"] ?>);">删除</a>
		<?php
		}else if($row["status"] == "2"){
		?>
				<a class="weui-form-preview-btn weui-form-preview-btn-default" href="javascript:" style="color:red">收货</a>
                <button class="weui-form-preview-btn weui-form-preview-btn-primary" onclick="javascript:">退货/退款</button>
		<?php
		}
		?>
		</div>
		<hr />
		<?php
		}
		?>

        </div>   
<a href="javascript:onSignOut();" class="weui_btn weui_btn_warn">退出</a>	
<a href="index.html" class="weui_btn weui_btn_default">返回</a>		

<script>
function onDelete(id){

	$.confirm("您确定要删除订单吗?", "确认删除?", function() {
		//请求后台删除订单
		$.post(
		"editOrderStatus.php",
		{id:id, status:'-1'},
		function(data){
			var obj = $.parseJSON(data);
			//刷新页面
			if(obj.success){
				window.location.reload();
			}else{
				alert("订单删除失败，请检查是否网络问题！");
			}	
		}
		);
		$.toast("删除成功!");
	});
}

function onPay(id){
	//模拟付款成功（实际应用调用第三方接口，支付宝、微信）
	//付款成功，无非就是修改状态（2）
	//get:获取数据；post：提交数据
	$.confirm("您确定要付款吗?", "确认付款?", function() {
		$.post(
		"editOrderStatus.php",
		{id:id, status:'2'},
		function(data){
			var obj = $.parseJSON(data);
			//刷新页面
			if(obj.success){
				window.location.reload();
			}else{
				alert("订单付款失败，请检查是否网络问题！");
			}	
		}
		);
	});

}

function onCancle(id){
	$.confirm("您确定要取消订单吗?", "确认取消?", function() {
		//到底是取消那个ID的订单
		$.post(
		"editOrderStatus.php",
		{id:id, status:'4'},
		function(data){
			var obj = $.parseJSON(data);
			//刷新页面
			if(obj.success){
				window.location.reload();
			}else{
				alert("取消订单失败，请检查是否网络问题！");
			}	
		}
		);
	});
}

function onSignOut(){
	localStorage.no = undefined;
	localStorage.password = undefined;
	window.location.href="index.html";
}
$(function(){
	//判断本地是否保存用户名和密码
	var no = localStorage.no;
	var password = localStorage.password;
	//alert(no == "undefined");
	
	//将本地存储的用户名和密码提交给后台验证
	$.post(
	"login.php",
	{no:no, password:password},
	function(data){
		var obj = $.parseJSON(data);
		if(obj.success){
			//跳转后台页面
			//模拟记住密码和用户名
			//localStorage.no = no;
			//localStorage.password = password;
			//window.location.href="my.html";
						//如果登录成功，显示订单信息
			//远程获取数据填充姓名等信息
			$.post(
			"getUserInfo.php",
			{no:no},
			function(data){
				var obj = $.parseJSON(data);
				if(obj.success){
					//获取姓名填充
					$("#name").html(obj.user.name);	
				}
			}
			);	
			
		}else{
			//打印错误信息
			//alert("用户名或密码错误");
			window.location.href="login.html";
		}
	}
	);
	
	/*
	if(no == "undefined" || password == "undefined"){
		//跳转登录
		window.location.href="login.html";
	}
	*/

});
</script>		
</body>
</html>
