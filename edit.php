<?php
require './check.php';
require './init.php';
$id=isset($_GET['id'])?(int)$_GET['id']:0;
$data=array('id'=>$id);
if($_POST){
	$fileds=array('title','content');
	foreach($fileds as $v){
	$data[$v]=isset($_POST[$v])?trim(htmlspecialchars($_POST[$v])):'';
    }
    $sql='update news set title=:title, content=:content where id =:id';
    $stmt = $pdo->prepare($sql);
    if(!$stmt->execute($data)){
    	exit('执行失败：'.implode('-',$stmt->errorInfo()));
    }
    header('Location:index.php');
    exit;
}
$sql = 'select title, content, addtime from news where id = :id';
$stmt = $pdo->prepare($sql);
if(!$stmt->execute($data)){
	exit('执行失败：'.implode('-',$stmt->errorInfo()));
}
$data=$stmt->fetch(PDO::FETCH_ASSOC);
if(empty($data)){
	exit('新闻ID不存在');
}
require './edit.html';
?>
