<?php
require_once("controllers/IndexController.php");
$controller = new IndexController();
if(isset($_GET['new']))
{
  $controller->loadView(null, "form.phtml");
}else {
  $feedsFromDB  = $controller->getDataBaseFeeds();
  $numFeedsDB   = $controller->getNumDataBaseFeeds();
  // print_r($feedsFromDB);
  // echo "cant: ".$numFeedsDB;

  $controller->loadView($feedsFromDB, "index.phtml");

}
?>
