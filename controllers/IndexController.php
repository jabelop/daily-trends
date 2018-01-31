<?php

require_once('PaisFeedsController.php');
require_once('MundoFeedsController.php');
require_once('DataBaseFeedsController.php');
  //main controller for index
  class IndexController
  {
      // properties for the different types of  feeds

      private $paisFeeds, $mundoFeeds, $dataBaseFeeds, $numDataBaseFeeds;

      // properties for the controllers
      private $paisFeedsController;
      private $mundoFeedsController;
      private $dataBaseFeedsController;

      public function __construct()
      {
        $this->paisFeedsController           = new PaisFeedsController();
        $this->mundoFeedsController          = new MundoFeedsController();
        $this->dataBaseFeedsController       = new DataBaseFeedsController();

        $this->paisFeeds      =  array();
        $this->mundoFeeds     =  array();
        $this->dataBaseFeeds =  array();

        $this->numDataBaseFeeds = 0;

        // $this->setDataBaseFeeds();
        // $this->setPaisFeeds();
        // $this->setMundoFeeds();

        $this->loadView();
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

      public function getPaisFeeds()
      {
        return $this->paisFeeds;
      }

      public function getMundoFeeds()
      {
        return $this->mundoFeeds;
      }

      public function loadView()
      {
         require_once('views/index.phtml');
      }



      //private methods for get the data from the controllers

      private function setDataBaseFeeds()
      {
        $this->dataBaseFeeds    = $this->dataBaseFeedsController->getFeeds();
        $this->numDataBaseFeeds = $this->dataBaseFeedsController->getNumFeeds();
      }

      private function setPaisFeeds() {
        $this->paisFeeds = $this->paisFeedsController->getFeeds();
      }

      private function setMundoFeeds()
      {
        $this->mundoFeeds = $this->mundoController->getFeeds();
      }


  }


?>
