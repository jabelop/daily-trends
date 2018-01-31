<?php

require_once('PaisFeedsController.php');
require_once('MundoFeedsController.php');
require_once('DataBaseFeedsController.php');
  //main controller for index
  class IndexController
  {
      // properties for the different types of  feeds

      private $paisFeeds, $mundoFeeds, $dataBaseFeeds;

      // properties for the controllers
      private $paisFeedsController;
      private $mundoFeedsController;
      private $dataBaseFeedsController;

      public function __construct(){
        $this->paisFeedsController      = new PaisFeedsController();
        $this->mundoController          = new MundoFeedsController();
        $this->$dataBaseFeedsController = new DataBaseFeedsController();

        $this->paisFeeds      =  array();
        $this->mundoFeeds     =  array();
        $this->$dataBaseFeeds =  array();
      }
  }


?>
