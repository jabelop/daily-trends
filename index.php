<?php
require_once("controllers/IndexController.php");
$controller = new IndexController(5);
if(isset($_GET['new']))
{
  $controller->loadView(null, "form.phtml");
}
else if (isset($_POST['title']))
{
  if (isset($_FILES['image']))
  {
    $imageName = md5($_FILES['image']['tmp_name']) . '.' .
    array_pop(explode('.', $_FILES['image']['name']));
    if($controller->postFeed($_POST,$imageName)){
      if (!$controller->saveImageFile($_FILES['image']['tmp_name'], $imageName))
      {
        $error = 'upload file error';
        $controller->loadView($error, "form.phtml");
      }
    }
    else
    {
      $error = 'data base file save error';
      $controller->loadView($error,null,null, "form.phtml");
    }
  }else
  {
    $controller->postFeed($_POST,null);
  }
  header("Location: ./");

}
else if (isset($_POST['delete']))
{
  $controller->deleteFeed($_POST['delete']);
  header("Location: ./");
}else if(isset($_GET['pais']))
{
  // El Pais feeds AJAX request
  $feedsPais   = array();
  $feedsPais   = $controller->getPaisFeeds();
  print_r(json_encode($feedsPais));

}else if(isset($_GET['mundo']))
{
  // El Mundo feeds AJAX request
  $mundoFeeds  = array();
  $mundoFeeds  = $controller->getMundoFeeds();
  print_r(json_encode($mundoFeeds));

}
else {
  $feedsFromDB = $controller->getDataBaseFeeds();
  $controller->loadView($feedsFromDB, "index.phtml");

}
?>
