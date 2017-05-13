<?php
header('Content-Type:text/html;charset=utf-8');
require './check.php';
require './init.php';
require './page.class.php';
$page=isset($_GET['page'])?(int)$_GET['page']: 1;
$sql="select count(*) as total from `news`";
$total = $pdo->query($sql)->fetchColumn();
$Page= new Page($total,3,$page);
$limit=$Page->getLimit();
$page_html=$Page->showPage();
$sql = "select `id`, `title`, `addtime` from `news` order by `addtime` desc limit $limit";
$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
require './news.html';
?>