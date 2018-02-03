<?php

require_once('PaisFeedsController.php');
require_once('MundoFeedsController.php');
require_once('DataBaseFeedsController.php');


  //main controller for index
  class IndexController
  {
      // properties for the different types of feeds

      private $paisFeeds;
      private $mundoFeeds;
      private $dataBaseFeeds;

      // properties for the controllers
      private $paisFeedsController;
      private $mundoFeedsController;
      private $dataBaseFeedsController;

      public function __construct($numberOfScrapingFeeds)
      {
        $this->paisFeedsController     = new PaisFeedsController($numberOfScrapingFeeds);
        $this->mundoFeedsController    = new MundoFeedsController($numberOfScrapingFeeds);
        $this->dataBaseFeedsController = new DataBaseFeedsController();

        $this->paisFeeds      =  array();
        $this->mundoFeeds     =  array();
        $this->dataBaseFeeds  =  array();


        $this->setDataBaseFeeds();
        $this->setPaisFeeds();
        $this->setMundoFeeds();

      }

      // public methods for pass the data to the view

      public function getDataBaseFeeds()
      {
        return $this->dataBaseFeeds;
      }

      public function getNumDataBaseFeeds()
      {
        return $this->numDataBaseFeeds;
      }

      // public function getPaisFeeds()
      // {
      //   return $this->paisFeeds;
      // }

      public function getPaisFeeds()
      {
        return $this->paisFeeds;
      }


      public function getMundoFeeds()
      {
        return $this->mundoFeeds;
      }

      public function loadView($dataPais, $dataMundo, $dataDataBase, $view)
      {
        require_once('views/'.$view);
      }

      // method for save a new feed

      public function postFeed($feed, $image)
      {
        return $this->dataBaseFeedsController->postNewFeed($feed, $image);

      }

      //method for delete a feed
      public function deleteFeed($id)
      {
        $name = $this->dataBaseFeedsController->getFeed($id)['image'];
        if ($this->dataBaseFeedsController->deleteFeed($id))
        {
          return $this->deleteImageFile($name);
        }
        return;
      }


      // method for save the file image from the server
      public function saveImageFile($file, $name){
        $path = 'assets/images/'.$name;

        //aqui movemos el archivo desde la ruta temporal a nuestra ruta
        //usamos la variable $resultado para almacenar el resultado del
        // proceso de mover el archivo almacenara true o false
        $result = move_uploaded_file($file, $path);
        return $result;
      }

      //method for remove a file image from the server
      private function deleteImageFile($name){
        $path = 'assets/images/'.$name;
        return unlink($path);

      }



      //private methods for get the data from the controllers

      private function setDataBaseFeeds()
      {
        $this->dataBaseFeeds = $this->dataBaseFeedsController->getFeeds();
      }

      private function setPaisFeeds() {
        $this->paisFeeds = $this->paisFeedsController->setFeeds();
      }

      private function setMundoFeeds()
      {
        $this->mundoFeeds = $this->mundoFeedsController->setFeeds();
      }


  }



?>
