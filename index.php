<?php
require_once("controllers/IndexController.php");
$controller = new IndexController();
$feedsFromDB  = $controller->getDataBaseFeeds();
$numFeedsDB   = $controller->getNumDataBaseFeeds();
// print_r($feedsFromDB);
// echo "cant: ".$numFeedsDB;
$controller->loadView($feedsFromDB);
?>
