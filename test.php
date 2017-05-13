<?php
require './page.class.php';
$Page= new Page($total,3,$page);
$page_html=$Page->showPage();
exit($url);