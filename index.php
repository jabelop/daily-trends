<?php
require_once("controllers/IndexController.php");
$controller = new IndexController();
if(isset($_GET['new']))
{
  $controller->loadView(null, "form.phtml");
}else if (isset($_POST['title']))
{
  $imageName = md5($_FILES['image']['tmp_name']);
  if($controller->postFeed($_POST,$imageName)){
    if (!$controller->saveImageFile($_FILES['image']['tmp_name'], $imageName))
    {
      $error = 'upload file error';
      $controller->loadView($error, "form.phtml");
    }
  }else
  {
    $error = 'data base file save error';
    $controller->loadView($error, "form.phtml");
  }
}else {
  $feedsFromDB  = $controller->getDataBaseFeeds();
  $numFeedsDB   = $controller->getNumDataBaseFeeds();
  $controller->loadView($feedsFromDB, "index.phtml");

}
?>
