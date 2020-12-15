<?php
require 'vendor/autoload.php';
require 'DB.php';
print_r(DB:: getInstance()->getTableDataPart(DB::TABLE_GOODS, 2, 3));
print_r(DB:: getInstance()->getTableDataCount(DB::TABLE_GOODS));

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
echo $twig->render('index.twig');
if(
    isset($_GET['from'])){
   $goods = DB::getInstance()->getTableDataPart(DB::TABLE_GOODS,$_GET['from']);
   echo $twig->render('goods.twig',[
       'items'=>$goods,]);
   exit;
}
echo $twig->render('index.twig');
//else{
//    $mode = 'all';
//    $data = DB::getInstance()->getTableData(DB::TABLE_IMAGES);
//}
//echo $twig->render('index.twig', [
//    'mode' => 'one',
//    'data' => 'data']);

