<?php
header('Content-Type:text/html;charset=utf-8');
$dsn = 'mysql:host=localhost;dbname=project5;charset=utf8';
try{
	$pdo = new PDO($dsn,'root','123');
}catch(PDOException $e){
	exit('pdo连接数据库失败：'.$e->getMessage());
}
// echo 'pdo连接数据库成功';
?>